<?php
App::uses('AppController', 'Controller');
/**
 * Avisos Controller
 *
 * @property Aviso $Aviso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AvisosController extends AppController {

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
		$this->Aviso->recursive = 0;
		$this->set('avisos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aviso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Aviso.' . $this->Aviso->primaryKey => $id));
		$this->set('aviso', $this->Aviso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aviso->create();
			if ($this->Aviso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Aviso->User->find('list');
		$tipos = $this->Aviso->Tipo->find('list');
		$cursos = $this->Aviso->Curso->find('list');
		$grupos = $this->Aviso->Grupo->find('list');
		$this->set(compact('users', 'tipos', 'cursos', 'grupos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Aviso->id = $id;
		if (!$this->Aviso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aviso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Aviso.' . $this->Aviso->primaryKey => $id));
			$this->request->data = $this->Aviso->find('first', $options);
		}
		$users = $this->Aviso->User->find('list');
		$tipos = $this->Aviso->Tipo->find('list');
		$cursos = $this->Aviso->Curso->find('list');
		$grupos = $this->Aviso->Grupo->find('list');
		$this->set(compact('users', 'tipos', 'cursos', 'grupos'));
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
		$this->Aviso->id = $id;
		if (!$this->Aviso->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Aviso->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
