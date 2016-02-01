<?php
App::uses('AppController', 'Controller');
/**
 * Logos Controller
 *
 * @property Logo $Logo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LogosController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Logo))));
		$this->Filter->setPaginate('order', array('Logo.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Filter->setPaginate('fields', array('Logo.id', 'Logo.pessoa_id', 'Logo.logo', 'Logo.imagem', 'Pessoa.id', 'Pessoa.razaosocial'));
		$this->Logo->recursive = false;
		$this->set('logos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Logo->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Logo.' . $this->Logo->primaryKey => $id), 
			'fields' => array('Logo.id', 'Logo.pessoa_id', 'Logo.logo', 'Logo.imagem', 'Pessoa.id', 'Pessoa.razaosocial'));
		$this->set('logo', $this->Logo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Logo->create();
			if ($this->Logo->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Logo->id
               )
            ));
				$this->redirect(array('action' => 'view', $this->Logo->getLastInsertID()));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$pessoas = $this->Logo->Pessoa->findAsCombo();
		$pessoa_id = $id;
		$this->set(compact('pessoas', 'pessoa_id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Logo->id = $id;
		if (!$this->Logo->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Logo->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Logo->id
               )
            ));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Logo.' . $this->Logo->primaryKey => $id));
			$this->Logo->unbindModel(array('belongsTo' => array('Pessoa')));
			$this->request->data = $this->Logo->find('first', $options);
		}
		$pessoas = $this->Logo->Pessoa->findAsCombo('asc', 'Pessoa.id = ' . $this->request->data['Logo']['pessoa_id']);
		$this->set(compact('pessoas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $pessoa_id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Logo->id = $id;
		if (!$this->Logo->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Logo->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'logos', 'action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'logos', 'action' => 'index'));
	}
}
