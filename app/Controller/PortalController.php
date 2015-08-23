<?php
/**
 * Document   : app/Controller/PortalController.php
 * Created on : 2015-06-29 12:30 AM
 *
 * @author Pedro Escobar
 */

App::uses('AppController', 'Controller');

class PortalController extends AppController {

   public function index() {
      $dados = $this->Session->read('Auth');
      $id = $dados['Aluno']['id'];

      $Aviso = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 21));
      $avisos = $Aviso->find('all', $options);

      $Material = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 22));
      $materiais = $Material->find('all', $options);

      $Nota = ClassRegistry::init('AlunoDisciplina');
      $options = array('conditions' => array('AlunoDisciplina.aluno_id' => $id));
      $notas = $Nota->find('all', $options);

      $Grupo = ClassRegistry::init('Grupo');
      $grupos = $Grupo->findAsCombo();

      $this->set(compact('avisos', 'grupos', 'materiais', 'notas'));
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

}