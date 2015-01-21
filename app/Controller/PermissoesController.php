<?php
App::uses('AppController', 'Controller');
/**
 * Permissaos Controller
 *
 * @property Permissao $Permissao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PermissoesController extends AppController {
   public $uses = array('Permissao');
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
		$this->Permissao->recursive = 0;
		$this->set('permissoes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Permissao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Permissao.' . $this->Permissao->primaryKey => $id));
		$this->set('permissao', $this->Permissao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Permissao->create();
			if ($this->Permissao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Permissao->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Permissao->User->find('list');
		$programas = $this->Permissao->Programa->find('list');
		$this->set(compact('users', 'programas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Permissao->id = $id;
		if (!$this->Permissao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Permissao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Permissao->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Permissao.' . $this->Permissao->primaryKey => $id));
			$this->request->data = $this->Permissao->find('first', $options);
		}
		$users = $this->Permissao->User->find('list');
		$programas = $this->Permissao->Programa->find('list');
		$this->set(compact('users', 'programas'));
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
		$this->Permissao->id = $id;
		if (!$this->Permissao->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Permissao->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
