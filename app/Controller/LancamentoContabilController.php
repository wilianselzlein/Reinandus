<?php
App::uses('AppController', 'Controller');
/**
 * LancamentoContabil Controller
 *
 * @property LancamentoContabil $LancamentoContabil
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LancamentoContabilController extends AppController {

	public $uses = array('LancamentoContabil');

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->LancamentoContabil))));
		$this->Filter->setPaginate('order', array('LancamentoContabil.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->LancamentoContabil->recursive = 0;
		$this->set('LancamentoContabil', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LancamentoContabil->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('LancamentoContabil.' . $this->LancamentoContabil->primaryKey => $id));
		$this->set('lancamentocontabil', $this->LancamentoContabil->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LancamentoContabil->create();
			if ($this->LancamentoContabil->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$debitos = $this->LancamentoContabil->Debito->findAsCombo();
		$creditos = $this->LancamentoContabil->Credito->findAsCombo();
		$historico_padrao = $this->LancamentoContabil->HistoricoPadrao->findAsCombo();
		$this->set(compact('debitos', 'creditos', 'historico_padrao'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->LancamentoContabil->id = $id;
		if (!$this->LancamentoContabil->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LancamentoContabil->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('LancamentoContabil.' . $this->LancamentoContabil->primaryKey => $id));
			$this->request->data = $this->LancamentoContabil->find('first', $options);
		}
		$debitos = $this->LancamentoContabil->Debito->findAsCombo();
		$creditos = $this->LancamentoContabil->Credito->findAsCombo();
		$historico_padrao = $this->LancamentoContabil->HistoricoPadrao->findAsCombo();
		$this->set(compact('debitos', 'creditos', 'historico_padrao'));
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
		$this->LancamentoContabil->id = $id;
		if (!$this->LancamentoContabil->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->LancamentoContabil->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
