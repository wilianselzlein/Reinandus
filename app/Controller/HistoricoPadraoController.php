<?php
App::uses('AppController', 'Controller');
/**
 * HistoricoPadraos Controller
 *
 * @property HistoricoPadrao $HistoricoPadrao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HistoricoPadraoController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->HistoricoPadrao))));
		$this->Filter->setPaginate('order', array('HistoricoPadrao.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->HistoricoPadrao->recursive = 0;
		$this->set('histspadrao', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HistoricoPadrao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 0, 'conditions' => array('HistoricoPadrao.' . $this->HistoricoPadrao->primaryKey => $id));
		$this->set('historicopadrao', $this->HistoricoPadrao->find('first', $options));

		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');
		$options = array('recursive' => 1, 'conditions' => array('LancamentoContabil.historico_padrao_id' => $id), 'limit' => Self::$LIMITE_VIEW);
		$lancamentos = $LancamentoContabil->find('all', $options);
		$lancamentos = $this->TransformarArray->FindInContainable('LancamentoContabil', $lancamentos);

		$this->set(compact('lancamentos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HistoricoPadrao->create();
			if ($this->HistoricoPadrao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->HistoricoPadrao->id = $id;
		if (!$this->HistoricoPadrao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HistoricoPadrao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('HistoricoPadrao.' . $this->HistoricoPadrao->primaryKey => $id));
			$this->request->data = $this->HistoricoPadrao->find('first', $options);
		}
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
		$this->HistoricoPadrao->id = $id;
		if (!$this->HistoricoPadrao->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->HistoricoPadrao->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
