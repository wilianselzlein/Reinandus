<?php
/**
 * Document   : app/Controller/PortalController.php
 * Created on : 2015-06-29 12:30 AM
 *
 * @author Pedro Escobar
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Controller', 'Cursos');
App::import('Controller', 'Enumerados');
App::import('Controller', 'Institutos');
App::import('Controller', 'Mensalidades');
App::import('Controller', 'Acessos');

class PortalController extends AppController {

/**
 * Components
 *
 * @var array
 */
  public $components = array('Session', 'Boletos.BoletoHsbc');

   public function aluno_index() {
      $dados = $this->Session->read('Auth');
      $id = $dados['Aluno']['id'];

      $Acesso = new AcessosController;
      $Acesso->AdicionarHistoricoDeAcesso($id);

      $alunos = $this->Portal->query('select * from valuno where aluno_id = ' . $id); 
      $alunos = $alunos[0];
      $vagas = $this->Portal->query('select * from vvagas');
      $convenios = $this->Portal->query('select * from vconvenios');
      $notas = $this->Portal->query('select * from vdisciplinas where aluno_disciplina_aluno_id = ' . $id);
      $mensalidades = $this->Portal->query('select * from vmensalidades where mensalidade_aluno_id = ' . $id);
      $anos = $this->PegarOsAnosDasMensalidades($mensalidades);
      $grupos = $this->Portal->query('select * from vgrupos');
      $grupos = Set::combine($grupos, '{n}.vgrupos.grupo_id', '{n}.vgrupos.grupo_nome');

      $manual = $this->PegarLinkManualDoAlunoNoParametro();
      $pesquisa_ativa = $this->VerificarSePesquisaEstaAtiva();

      $this->set(compact('alunos', 'grupos', 'materiais', 'notas', 'vagas', 'convenios', 'mensalidades', 'anos', 'manual', 'pesquisa_ativa'));
   }

   private function PegarLinkManualDoAlunoNoParametro() {
      $parametro = ClassRegistry::init('Parametro');
      return $parametro->valor(10);
   }
   
   private function VerificarSePesquisaEstaAtiva() {
      $parametro = ClassRegistry::init('Parametro');
      return $parametro->valor(11) == 'S';
   }
  
   public function aluno_login(){
      $this->layout = 'login';
        // Verifica o tipo de requisição, se for POST(form submit) tenta logar.
      if($this->request->is('post')) {
         //debug($this->Auth->authenticate);
         //debug($this->Auth->redirect());
         //die();
          if ($this->Auth->login()) {
              return $this->redirect($this->Auth->redirect());
          } else {
              $this->Session->setFlash(__('Invalid username or password, try again'), 'flash/error');
          }
      }
   }

   public function aluno_logout() {
        $this->redirect($this->Auth->logout());
   }

   public function aluno_protocolo() {
        $this->SendEmail($this->request->data);
   }

  private function SendEmail($dados) {

      $emails = array('secretaria@facet.br', 'wilianselzlein@gmail.com');

      $Email = new CakeEmail('smtp');
      $Email->emailFormat('html');
      $Email->to($emails);
      $Email->subject('Protocolo');

      $Email->send(
        'Protocolo do Portal:<br>' .
        'Data: ' . Date('Y/m/d H:i') . '<br>' .
        'Aluno: ' . $dados['portal']['nome'] . '<br>' .
        'Matricula: ' . $dados['portal']['matricula'] . '<br>' .
        'Email: ' . $dados['portal']['email'] . '<br>' .
        'Telefone: ' . $dados['portal']['telefone'] . '<br>' .
        'Curso: ' . $dados['portal']['curso'] . '<br>' .
        'Turma: ' . $dados['portal']['turma'] . '<br>' .
        '<br>'.
        'Requerimento: ' . $dados['portal']['requerimento'] . '<br>' .
        'Justificativa: ' . $dados['portal']['justificativa'] . '<br>' .
        '<br>'.
        'Email automático, apenas leitura, favor não responder no mesmo.<br>');
    }

    private function CarregarDadosAvisos($tipo) {
      $grupo = $this->request->data;
      $grupo = $grupo['Post']['grupo'];
      $avisos = $this->Portal->query('select * from vavisos where grupo_id = ' . $grupo . ' and aviso_tipo_id = ' . $tipo);

      return $avisos;
    }

    public function aluno_avisos() {
      $avisos = $this->CarregarDadosAvisos(21);
      $this->set(compact('avisos'));
    }

    public function aluno_materiais() {
      $materiais = $this->CarregarDadosAvisos(22);
      $this->set(compact('materiais'));
    }

    private function DadosComprovantes() {
      $dados = $this->request->data;
      if (count($dados) == 0)
        $this->redirect(array('action' => 'index'));

      $consulta = $this->Portal->query('select * from vinstituto');
      $instituto['Instituto'] = $consulta[0]['vinstituto'];
      $instituicao['Instituicao'] = $consulta[1]['vinstituto'];
      $cabecalho = $this->Portal->query('select * from vcabecalho');

      $dados = array_merge($dados, $instituto, $instituicao, $cabecalho[0]);
      return $dados;
    }

    public function aluno_matricula() {
      $dados = $this->DadosComprovantes();
      $this->set(compact('dados'));
    }

    private function PegarOsAnosDasMensalidades($mensalidades) {
      $anos = [];
      foreach ($mensalidades as $mensalidade) {
        $ano = $mensalidade['vmensalidades']['mensalidade_ano'];
        if (! in_array($ano, $anos))
          $anos[$ano] = $ano;
      }
      return $anos;
    }

    public function aluno_Boleto($id) {
      $Mensalidade = new MensalidadesController;
      $dados = $Mensalidade->DadosBoleto($id);
      $this->BoletoHsbc->render($dados);
    }

    public function aluno_comprovante() {
      $dados = $this->DadosComprovantes();
      $mensalidades = $this->request->data['Portal']['mensalidades'];
      $mensalidades = unserialize($mensalidades);
      $filtro = $this->request->data['Portal']['ano'];
      $resultado = [];
      foreach($mensalidades as $mensalidade){
         if (($mensalidade[0]['ano'] == $filtro) && (isset($mensalidade['Mensalidade']['pagamento'])))
            $resultado[] = $mensalidade;
      }
      $mensalidades = $resultado;
      $this->set(compact('dados', 'mensalidades'));
    }

}
  