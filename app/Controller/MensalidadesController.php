<?php
App::uses('AppController', 'Controller');
/**
 * Mensalidades Controller
 *
 * @property Mensalidade $Mensalidade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MensalidadesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mensalidade->recursive = 0;
		$this->set('mensalidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
		$this->set('mensalidade', $this->Mensalidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mensalidade->create();
			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Mensalidade->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$contas = $this->Mensalidade->Conta->find('list');
		$alunos = $this->Mensalidade->Aluno->find('list');
		$formapgtos = $this->Mensalidade->Formapgto->find('list');
		$users = $this->Mensalidade->User->find('list');
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Mensalidade->id = $id;
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Mensalidade->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
			$this->request->data = $this->Mensalidade->find('first', $options);
		}
		$contas = $this->Mensalidade->Conta->find('list');
		$alunos = $this->Mensalidade->Aluno->find('list');
		$formapgtos = $this->Mensalidade->Formapgto->find('list');
		$users = $this->Mensalidade->User->find('list');
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Mensalidade->id = $id;
		if (!$this->Mensalidade->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Mensalidade->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
