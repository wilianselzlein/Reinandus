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
  public $components = array('Session', 'Boletos.BoletoHsbc', 'Boletos.BoletoBb', 'Boletos.BoletoBradesco', 'Boletos.BoletoItau');

   public function aluno_index() {
      $dados = $this->Session->read('Auth');
      $id = $dados['Aluno']['id'];

      $Acesso = new AcessosController;
      $Acesso->AdicionarHistoricoDeAcesso($id);

      $alunos = $this->Portal->query('select * from valuno where aluno_id = ' . $id); 
      $alunos = $alunos[0];
      $vagas = $this->Portal->query('select * from vvagas');
      $videos = $this->Portal->query('select * from vvideos');
      $convenios = $this->Portal->query('select * from vconvenios');
      $notas = $this->Portal->query('select * from vdisciplinas where aluno_disciplina_aluno_id = ' . $id);
      $mensalidades = $this->Portal->query('select * from vmensalidades where mensalidade_aluno_id = ' . $id . ' order by mensalidade_vencimento');
      $anos = $this->PegarOsAnosDasMensalidades($mensalidades);
      $grupos = $this->Portal->query('select * from vgrupos');
      $grupos = Set::combine($grupos, '{n}.vgrupos.grupo_id', '{n}.vgrupos.grupo_nome');

      $manual = $this->PegarLinkManualDoAlunoNoParametro();
      $pesquisa_ativa = $this->VerificarSePesquisaEstaAtiva();

      $this->set(compact('alunos', 'grupos', 'materiais', 'notas', 'vagas', 'videos', 'convenios', 'mensalidades', 'anos', 'manual', 'pesquisa_ativa'));
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
        $this->Session->setFlash(__('Protocolo enviado.'), 'flash/success');
        $this->redirect($this->referer());
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
      $avisos = $this->Portal->query('select * from vavisos where grupo_id = ' . $grupo . 
        ' and aviso_tipo_id = ' . $tipo . ' order by aviso_data desc');

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

    public function aluno_Boleto($id = null) {
      if (is_null($id)) {
        $this->redirect(array('action' => 'index'));
        return;
      }
      $Mensalidade = new MensalidadesController;
      $dados = $Mensalidade->DadosBoleto($id);
      $this->autoRender = false;
      
		$banco = $dados["num_banco"];
		if ($banco == 237)
			$this->BoletoBradesco->render($dados);
		else if ($banco == 341)
			$this->BoletoItau->render($dados);
		else
			throw new NotFoundException(__('Número do banco não configurado no arquivo de retorno.'));
    }

    public function aluno_comprovante() {
      $dados = $this->DadosComprovantes();
      $mensalidades = $this->request->data['Portal']['mensalidades'];
      $mensalidades = unserialize($mensalidades);
      $filtro = $this->request->data['Portal']['ano'];
      $resultado = [];
      foreach($mensalidades as $mensalidade){
         if (($mensalidade['vmensalidades']['mensalidade_ano'] == $filtro) && (! is_null($mensalidade['vmensalidades']['mensalidade_pagamento'])))
            $resultado[] = $mensalidade;
      }
      $mensalidades = $resultado;
      $this->set(compact('dados', 'mensalidades'));
    }


  /**
     * Allow a user to request a password reset.
     * @return
     */
    function aluno_forgot_password() {

        if (!empty($this->data)) {
            $this->Portal->Aluno->recursive = -1;
            $aluno = $this->Portal->Aluno->findById($this->data['Aluno']['id']);

            if (empty($aluno)) {
                $this->Session->setflash('Registro não localizado.');
                $this->redirect('/aluno/portal/forgot_password');
                
            } else {
                $aluno = $this->__generatePasswordToken($aluno);

                if ($this->Portal->Aluno->save($aluno) && $this->__sendForgotPasswordEmail($aluno['Aluno']['id'])) {
                    $this->Session->setflash('Foi enviado para seu email as instruções para troca da senha.');
                    $this->redirect('/aluno/portal/logout');
                }
            }
        }
    }

    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    function aluno_reset_password_token($reset_password_token = null) {
        $redirect = '/aluno/portal/login';
        $this->Portal->Aluno->recursive = -1;
        if (empty($this->request->data)) {

            $this->request->data = $this->Portal->Aluno->findByResetPasswordToken($reset_password_token);
            
            if (!empty($this->request->data['Aluno']['reset_password_token']) && 
                !empty($this->request->data['Aluno']['token_created_at']) &&
                $this->__validToken($this->request->data['Aluno']['token_created_at'])) {
                    
                $this->request->data['Aluno']['id'] = null;
                $_SESSION['token'] = $reset_password_token;
                
            } else {
                $this->Session->setflash('Token para trocar de senha inválido ou expirado.');
                $this->redirect($redirect);
                
            }

        } else {

            if ($this->request->data['Aluno']['reset_password_token'] != $_SESSION['token']) {
                $this->Session->setflash('Token para trocar de senha inválido ou expirado. Dados não vazios.');
                $this->redirect($redirect);
            }
            $this->request->data['Aluno']['senha'] = $this->request->data['Aluno']['new_passwd'];
            $aluno = $this->Portal->Aluno->findByResetPasswordToken($this->request->data['Aluno']['reset_password_token']);
            $this->Portal->Aluno->id = $aluno['Aluno']['id'];

            if ($this->Portal->Aluno->save($this->request->data, array('validate' => 'only'))) {
                
                $this->request->data['Aluno']['reset_password_token'] = $this->request->data['Aluno']['token_created_at'] = null;

                if ($this->Portal->Aluno->save($this->request->data) && $this->__sendPasswordChangedEmail($aluno['Aluno']['id'])) {

                    unset($_SESSION['token']);
                    $this->Session->setflash('Senha alterada! Faça o login para voltar ao sistema.');
                    $this->redirect($redirect);

                }
            }
        }
    }

    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }

        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33,79)) : $token .= chr(rand(80,126));
        }

        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;

        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $user['Aluno']['reset_password_token'] = $hash;
        $user['Aluno']['token_created_at'] = date('Y-m-d H:i:s');

        return $user;
    }

    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $this->Portal->Aluno->id = $id;
            $this->Portal->Aluno->recursive = -1;
            $dados = $this->Portal->Aluno->read();
            $emails = array($dados['Aluno']['email'], 'wilianselzlein@gmail.com');

            $Email = new CakeEmail('smtp');
            $Email->emailFormat('html');
            $Email->to($emails);
            $Email->subject('Resetar senha');

            $link = 'http://' . env('SERVER_NAME') . '/Reinandus/aluno/portal/reset_password_token/' . 
                $dados['Aluno']['reset_password_token'];

            $Email->send(
              'Protocolo do Portal:<br>' .
              'Data: ' . Date('Y/m/d H:i') . '<br>' .
              'Aluno: ' . $dados['Aluno']['nome'] . '<br>' .
              'Matricula: ' . $dados['Aluno']['id'] . '<br>' .
              'Email: ' . $dados['Aluno']['email'] . '<br>' .
              '<br>'.
              $link .
              '<br>');

            $this->set('Aluno', $dados);

            return true;
        }
        return false;
    }

    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */
    function __sendPasswordChangedEmail($id = null) {
        if (!empty($id)) {
            $this->Portal->Aluno->id = $id;
            $this->Portal->Aluno->recursive = -1;
            $dados = $this->Portal->Aluno->read();
            $emails = array($dados['Aluno']['email'], 'wilianselzlein@gmail.com');

            $Email = new CakeEmail('smtp');
            $Email->emailFormat('html');
            $Email->to($emails);
            $Email->subject('Senha Alterada');

            $Email->send(
              'Sua senha foi alterada no sistema.<br>' .
              'Data: ' . Date('Y/m/d H:i') . '<br>' .
              'Aluno: ' . $dados['Aluno']['nome'] . '<br>' .
              'Matricula: ' . $dados['Aluno']['id'] . '<br>' .
              'Email: ' . $dados['Aluno']['email'] . '<br>' .
              '<br>'.
              'Email automático, apenas leitura, favor não responder no mesmo.<br>');

            return true;
        }
        return false;
    }

}
  