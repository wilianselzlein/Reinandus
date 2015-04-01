<?php
App::uses('AppController', 'Controller');
/**
 * Conta Controller
 *
 * @property Contum $Contum
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContasController extends AppController {
   public $uses = array('Contum');
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
      $this->Filter->addFilters(
         array(
            'filter1' => array('OR' => array(
               'Contum.id' => array('operator' => 'LIKE'),
               'Contum.banco' => array('operator' => 'LIKE'),
               'Contum.agencia' => array('operator' => 'LIKE'),
               'Contum.conta' => array('operator' => 'LIKE'),
               'Contum.contato' => array('operator' => 'LIKE'),
               'Contum.fone' => array('operator' => 'LIKE'),
               'Formapgto.nome' => array('operator' => 'LIKE'),
            )),
         ));
      
            
      $this->Filter->setPaginate('order', array('Contum.id' => 'desc')); 
      $this->Filter->setPaginate('conditions', $this->Filter->getConditions());

      
		$this->Contum->recursive = 0;
		$this->set('conta', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contum->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Contum.' . $this->Contum->primaryKey => $id));
		$this->set('contum', $this->Contum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contum->create();
			if ($this->Contum->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Contum->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$formapgtos = $this->Contum->Formapgto->find('list');
		$this->set(compact('formapgtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Contum->id = $id;
		if (!$this->Contum->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contum->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Contum->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Contum.' . $this->Contum->primaryKey => $id));
			$this->request->data = $this->Contum->find('first', $options);
		}
		$formapgtos = $this->Contum->Formapgto->find('list');
		$this->set(compact('formapgtos'));
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
		$this->Contum->id = $id;
		if (!$this->Contum->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Contum->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
