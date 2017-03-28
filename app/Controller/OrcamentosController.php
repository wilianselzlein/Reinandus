<?php
App::uses('AppController', 'Controller');
/**
 * Orcamento Controller
 *
 * @property Orcamento $Orcamento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrcamentosController extends AppController {

	public $uses = array('Orcamento');

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Orcamento))));
		$this->Filter->setPaginate('order', array('Orcamento.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Orcamento->recursive = 1;
		$this->set('Orcamentos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Orcamento->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Orcamento.' . $this->Orcamento->primaryKey => $id),
				'fields' => array(
					'Orcamento.id', 'Orcamento.data', 'Orcamento.plano_conta_id', 'Orcamento.historico_padrao_id', 
					'Orcamento.valor', 'Orcamento.complemento', 'Orcamento.created', 'Orcamento.modified', 
					'PlanoConta.id', 'PlanoConta.reduzido', 'PlanoConta.analitico', 'PlanoConta.descricao',
					'HistoricoPadrao.id', 'HistoricoPadrao.nome')
		);
		$orcamento = $this->Orcamento->find('first', $options);
		$this->set('orcamento', $orcamento);

		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');
		$options = array('recursive' => 1, 'conditions' => array('LancamentoContabil.debito_id' => $orcamento['Orcamento']['plano_conta_id']), 'limit' => Self::$LIMITE_VIEW);
		$LancamentosContabeis = $LancamentoContabil->find('all', $options);
		$LancamentosContabeis = $this->TransformarArray->FindInContainable('LancamentoContabil', $LancamentosContabeis);
		$this->set(compact('LancamentosContabeis'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Orcamento->create();
			if ($this->Orcamento->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$nivel = $this->PegarMaiorNivel();
		$plano_conta = $this->Orcamento->PlanoConta->findAsCombo('asc', 'Nivel = ' . $nivel);
		$historico_padrao = $this->Orcamento->HistoricoPadrao->findAsCombo();
		$this->set(compact('plano_conta', 'historico_padrao'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Orcamento->id = $id;
		if (!$this->Orcamento->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Orcamento->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Orcamento.' . $this->Orcamento->primaryKey => $id));
			$this->Orcamento->unbindModel(array('belongsTo' => array('PlanoConta', 'HistoricoPadrao')));
			$this->request->data = $this->Orcamento->find('first', $options);
		}
		$nivel = $this->PegarMaiorNivel();
		$plano_conta = $this->Orcamento->PlanoConta->findAsCombo('asc', 'Nivel = ' . $nivel);
		$historico_padrao = $this->Orcamento->HistoricoPadrao->findAsCombo();
		$this->set(compact('plano_conta', 'historico_padrao'));
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
		$this->Orcamento->id = $id;
		if (!$this->Orcamento->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Orcamento->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * PegarMaiorNivel method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string
 * @return integer
 */
	public function PegarMaiorNivel() {
		$options = array('recursive' => false, 'fields' => array('Max(PlanoConta.Nivel) as Nivel'));
		$nivel = $this->Orcamento->PlanoConta->find('first', $options);
		return $nivel[0]['Nivel'];
	}
	
}
