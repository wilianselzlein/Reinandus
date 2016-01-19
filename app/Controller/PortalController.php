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

class PortalController extends AppController {

/**
 * Components
 *
 * @var array
 */
  public $components = array('Session', 'Boletos.BoletoHsbc');

   public function index() {
      $dados = $this->Session->read('Auth');
      $id = $dados['Aluno']['id'];
      
      $Aluno = ClassRegistry::init('Aluno');
      $options = array('recursive' => 0, 'conditions' => array('Aluno.id' => $id));
      $alunos = $Aluno->find('all', $options);
      $alunos = $alunos[0];

      $Vaga = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 24), 'order' => array('Aviso.Data DESC'));
      $vagas = $Vaga->find('all', $options);

      $Convenio = ClassRegistry::init('Pessoa');
      $options = array('recursive' => -1, 'conditions' => array('Pessoa.desconto >= ' => 0), 'order' => array('Pessoa.fantasia'));
      $convenios = $Convenio->find('all', $options);

      $Nota = ClassRegistry::init('AlunoDisciplina');
      $options = array('conditions' => array('AlunoDisciplina.aluno_id' => $id));
      $notas = $Nota->find('all', $options);

      $Mensalidade = ClassRegistry::init('Mensalidade');
      $options = array('conditions' => array('Mensalidade.aluno_id' => $id), 'fields' => array('Mensalidade.*', 'year(Mensalidade.vencimento) as ano', 'Aluno.nome', 'Aluno.curso_id'));
      $mensalidades = $Mensalidade->find('all', $options);

      $anos = $this->PegarOsAnosDasMensalidades($mensalidades);

      $Grupo = ClassRegistry::init('Grupo');
      $grupos = $Grupo->findAsCombo();

      $this->set(compact('alunos', 'grupos', 'materiais', 'notas', 'vagas', 'convenios', 'mensalidades', 'anos'));
   }

   public function login(){
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

   public function logout() {
        $this->redirect($this->Auth->logout());
   }

   public function protocolo() {
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

      $Curso = ClassRegistry::init('Curso');
      $options = array('fields' => array('Curso.id'), 'recursive' => -1, 'conditions' => array('Curso.grupo_id' => $grupo));
      $cursos = $Curso->find('list', $options);
      sort($cursos);
      if (empty($cursos)) $cursos[] = 0;

      $AvisoCurso = ClassRegistry::init('AvisoCurso');
      $options = array('fields' => array('AvisoCurso.aviso_id'), 'recursive' => -1, 'conditions' => array('AvisoCurso.curso_id >= ' => min($cursos), 'AvisoCurso.curso_id <= ' => max($cursos), 'AND' => array('AvisoCurso.curso_id' => $cursos)));
      $avisoscurso = $AvisoCurso->find('list', $options);
      sort($avisoscurso);
      if (empty($avisoscurso)) $avisoscurso[] = 0;

      $AvisoGrupo = ClassRegistry::init('AvisoGrupo');
      $options = array('fields' => array('AvisoGrupo.aviso_id'), 'recursive' => -1, 'conditions' => array('AvisoGrupo.grupo_id' => $grupo));
      $avisosgrupo = $AvisoGrupo->find('list', $options);
      sort($avisosgrupo);
      if (empty($avisosgrupo)) $avisosgrupo[] = 0;

      $registros = array_merge($avisoscurso, $avisosgrupo);

      $Aviso = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.id >= ' => min($registros), 'Aviso.id <= ' => max($registros), 'AND' => array('Aviso.id' => $registros), 'Aviso.tipo_id' => $tipo), 'order' => array('Aviso.Data DESC'));
      $avisos = $Aviso->find('all', $options);
      return $avisos;
    }

    public function avisos() {
      $avisos = $this->CarregarDadosAvisos(21);
      $this->set(compact('avisos'));
    }

    public function materiais() {
      $materiais = $this->CarregarDadosAvisos(22);
      $this->set(compact('materiais'));
    }
    
    private function DadosComprovantes() {
      $dados = $this->request->data;
      if (count($dados) == 0) 
        $this->redirect(array('action' => 'index'));

      $Curso = new CursosController;
      $curso = $Curso->PegarDadosParaImpressaoDaMatricula($dados['Portal']['curso']);

      $situacao = [];
      if (isset($dados['Portal']['situacao'])) {
        $Situacao = ClassRegistry::init('Enumerado');
        $Situacao->recursive = -1;
        $situacao = $Situacao->findById($dados['Portal']['situacao'], array('Enumerado.valor'));
      }
      
      $Instit = ClassRegistry::init('Instituto');
      $Instit->recursive = 1;
      $consulta = $Instit->findByTipoId(32, 
        array('Instituto.id', 'Instituto.empresa_id', 'Empresa.razaosocial', 'Empresa.cnpjcpf', 'Empresa.endereco', 'Empresa.numero', 'Empresa.bairro', 'Empresa.cidade_id', 'Empresa.fone', 'Empresa.email', 'Empresa.site', 'Diretor.razaosocial'));
      $instituto['Instituto'] = $consulta;

      $consulta = $Instit->findByTipoId(33,
        array('Instituto.id', 'Instituto.empresa_id', 'Empresa.razaosocial', 'Diretor.razaosocial'));
      $instituicao['Instituicao'] = $consulta;

      $Cidade = ClassRegistry::init('Cidade');
      $Cidade->recursive = 0;
      $cidade = $Cidade->findById($instituto['Instituto']['Empresa']['cidade_id'], array('Cidade.nome', 'Estado.sigla'));
      $instituto['Instituto']['Cidade'] = $cidade;

      $dados = array_merge($dados, $curso, $situacao, $instituto, $instituicao);
      return $dados;
    }

    public function matricula() {
      $dados = $this->DadosComprovantes();
      $this->set(compact('dados'));
    }

    private function PegarOsAnosDasMensalidades($mensalidades) {
      $anos = [];
      foreach ($mensalidades as $mensalidade) {
        $ano = $mensalidade['0']['ano'];
        if (! in_array($ano, $anos))
          $anos[$ano] = $ano;
      }
      return $anos;
    }

    public function Boleto($id) {
      $Mensalidade = new MensalidadesController;
      $dados = $Mensalidade->DadosBoleto($id);
      $this->BoletoHsbc->render($dados);
    }

    public function comprovante() {
      $dados = $this->DadosComprovantes();
      $this->set(compact('dados'));
    }

}
