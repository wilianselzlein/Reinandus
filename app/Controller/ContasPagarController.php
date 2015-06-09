<?php
App::uses('AppController', 'Controller');
/**
 * ContasPagar Controller
 *
 * @property ContaPagar ContaPagar
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContasPagarController extends AppController {

/**
 * Uses
 *
 * @var array
 */
    public $uses = array('ContaPagar');

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->ContaPagar))));
		$this->Filter->setPaginate('order', array('ContaPagar.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->ContaPagar->recursive = 0;
		$this->set('contaspagar', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ContaPagar->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id));
		$this->set('contapagar', $this->ContaPagar->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContaPagar->create();
			if ($this->ContaPagar->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->ContaPagar->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$contas = $this->ContaPagar->Conta->findAsCombo();
		$pessoas = $this->ContaPagar->Pessoa->findAsCombo();
		$formapgtos = $this->ContaPagar->Formapgto->findAsCombo();
		$users = $this->ContaPagar->User->findAsCombo();
		$tipos = $this->ContaPagar->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'contapagar')));
		$situacaos = $this->ContaPagar->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id', 'Situacao.nome' => 'contapagar')));
		$this->set(compact('contas', 'pessoas', 'formapgtos', 'users', 'situacaos', 'tipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->ContaPagar->id = $id;
		if (!$this->ContaPagar->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContaPagar->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->ContaPagar->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id));
			$this->request->data = $this->ContaPagar->find('first', $options);
		}
		$contas = $this->ContaPagar->Conta->findAsCombo();
		$pessoas = $this->ContaPagar->Pessoa->findAsCombo();
		$formapgtos = $this->ContaPagar->Formapgto->findAsCombo();
		$users = $this->ContaPagar->User->findAsCombo();
		$tipos = $this->ContaPagar->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'contapagar')));
		$situacaos = $this->ContaPagar->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id', 'Situacao.nome' => 'contapagar')));
		$this->set(compact('contas', 'pessoas', 'formapgtos', 'users', 'situacaos', 'tipos'));
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
		$this->ContaPagar->id = $id;
		if (!$this->ContaPagar->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->ContaPagar->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * baixar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function baixar($id = null) {
        $this->ContaPagar->id = $id;
		if (!$this->ContaPagar->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ContaPagar->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->ContaPagar->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id));
			$this->request->data = $this->ContaPagar->find('first', $options);
		}
		$contas = $this->ContaPagar->Conta->findAsCombo();
		$pessoas = $this->ContaPagar->Pessoa->findAsCombo();
		$formapgtos = $this->ContaPagar->Formapgto->findAsCombo();
		$users = $this->ContaPagar->User->findAsCombo();
		$situacaos = $this->ContaPagar->Situacao->findAsCombo();
		$tipos = $this->ContaPagar->Tipo->findAsCombo();
		$this->set(compact('contas', 'pessoas', 'formapgtos', 'users', 'situacaos', 'tipos'));
	}

}
