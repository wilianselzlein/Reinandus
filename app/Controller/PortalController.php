<?php
/**
 * Document   : app/Controller/PortalController.php
 * Created on : 2015-06-29 12:30 AM
 *
 * @author Pedro Escobar
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PortalController extends AppController {

   public function index() {
      $dados = $this->Session->read('Auth');
      $id = $dados['Aluno']['id'];
      
      $Aluno = ClassRegistry::init('Aluno');
      $options = array('recursive' => 0, 'conditions' => array('Aluno.id' => $id));
      $alunos = $Aluno->find('all', $options);
      $alunos = $alunos[0];
      //debug($alunos); die;
      
      $Aviso = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 21), 'order' => array('Aviso.Data DESC'));
      $avisos = $Aviso->find('all', $options);

      $Material = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 22), 'order' => array('Aviso.Data DESC'));
      $materiais = $Material->find('all', $options);

      $Vaga = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 24), 'order' => array('Aviso.Data DESC'));
      $vagas = $Vaga->find('all', $options);

      $Convenio = ClassRegistry::init('Pessoa');
      $options = array('recursive' => -1, 'conditions' => array('Pessoa.desconto >= ' => 0), 'order' => array('Pessoa.fantasia'));
      $convenios = $Convenio->find('all', $options);

      $Nota = ClassRegistry::init('AlunoDisciplina');
      $options = array('conditions' => array('AlunoDisciplina.aluno_id' => $id));
      $notas = $Nota->find('all', $options);

      $Grupo = ClassRegistry::init('Grupo');
      $grupos = $Grupo->findAsCombo();

      $this->set(compact('alunos', 'avisos', 'grupos', 'materiais', 'notas', 'vagas', 'convenios'));
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

}