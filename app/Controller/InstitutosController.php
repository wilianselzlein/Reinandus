<?php
App::uses('AppController', 'Controller');
/**
 * Institutos Controller
 *
 * @property Instituto $Instituto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InstitutosController extends AppController {

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
		$this->Instituto->recursive = 0;
		$this->set('institutos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Instituto->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Instituto.' . $this->Instituto->primaryKey => $id));
		$this->set('instituto', $this->Instituto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instituto->create();
			if ($this->Instituto->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$empresas = $this->Instituto->Empresa->find('list');
		$diretors = $this->Instituto->Diretor->find('list');
		$tipos = $this->Instituto->Tipo->find('list');
		$this->set(compact('empresas', 'diretors', 'tipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Instituto->id = $id;
		if (!$this->Instituto->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instituto->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Instituto.' . $this->Instituto->primaryKey => $id));
			$this->request->data = $this->Instituto->find('first', $options);
		}
		$empresas = $this->Instituto->Empresa->find('list');
		$diretors = $this->Instituto->Diretor->find('list');
		$tipos = $this->Instituto->Tipo->find('list');
		$this->set(compact('empresas', 'diretors', 'tipos'));
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
		$this->Instituto->id = $id;
		if (!$this->Instituto->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Instituto->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
