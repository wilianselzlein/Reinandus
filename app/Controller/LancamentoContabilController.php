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
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->LancamentoContabil))));
		$this->Filter->setPaginate('order', array('LancamentoContabil.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->LancamentoContabil->recursive = 1;
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
		$options = array('conditions' => array('LancamentoContabil.' . $this->LancamentoContabil->primaryKey => $id),
				'fields' => array(
					'LancamentoContabil.id', 'LancamentoContabil.data', 'LancamentoContabil.debito_id', 'LancamentoContabil.credito_id', 'LancamentoContabil.historico_padrao_id', 
					'LancamentoContabil.identificador', 'LancamentoContabil.documento', 'LancamentoContabil.valor', 'LancamentoContabil.complemento', 'LancamentoContabil.numero', 
					'LancamentoContabil.created', 'LancamentoContabil.modified', 
					'Debito.id', 'Debito.reduzido', 'Debito.analitico', 'Debito.descricao',
					'Credito.id', 'Credito.reduzido', 'Credito.analitico', 'Credito.descricao',
					'HistoricoPadrao.id', 'HistoricoPadrao.nome')
		);
		$lancamentocontabil = $this->LancamentoContabil->find('first', $options);
		$this->set('lancamentocontabil', $lancamentocontabil);

		$options = array('recursive' => 0, 'conditions' =>  array('OR' => array(
			'Mensalidade.lancamento_valor_id' => $lancamentocontabil['LancamentoContabil']['id'], 
			'Mensalidade.lancamento_desconto_id' => $lancamentocontabil['LancamentoContabil']['id'], 
			'Mensalidade.lancamento_juro_id' => $lancamentocontabil['LancamentoContabil']['id'])),
		'fields' => array('Mensalidade.id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Aluno.id', 'Aluno.nome', 'Situacao.id', 'Situacao.valor'));

		$mensalidade = ClassRegistry::init('Mensalidade');
		$mensalidade->unbindModel(array('belongsTo' => array('User', 'Conta', 'Formapgto')));
		$mensalidades = $mensalidade->find('all', $options);
		$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
		$this->set(compact('mensalidades'));

		$options = array('recursive' => 0, 'conditions' =>  array('OR' => array(
			'ContaPagar.lancamento_valor_id' => $lancamentocontabil['LancamentoContabil']['id'], 
			'ContaPagar.lancamento_desconto_id' => $lancamentocontabil['LancamentoContabil']['id'], 
			'ContaPagar.lancamento_juro_id' => $lancamentocontabil['LancamentoContabil']['id'])),
		'fields' => array('ContaPagar.id', 'ContaPagar.documento', 'ContaPagar.vencimento', 'ContaPagar.valor', 'ContaPagar.pagamento', 'Professor.id', 'Professor.nome', 'Pessoa.id', 'Pessoa.razaosocial'));

		$contapagar = ClassRegistry::init('ContaPagar');
		$contapagar->unbindModel(array('belongsTo' => array('User', 'Conta', 'Formapgto')));
		$contas = $contapagar->find('all', $options);
		$contas = $this->TransformarArray->FindInContainable('ContaPagar', $contas);
		$this->set(compact('contas'));
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
		$nivel = $this->PegarMaiorNivel();
		$debitos = $this->LancamentoContabil->Debito->findAsCombo('asc', 'Nivel = ' . $nivel);
		$creditos = $this->LancamentoContabil->Credito->findAsCombo('asc', 'Nivel = ' . $nivel);
		$historico_padrao = $this->LancamentoContabil->HistoricoPadrao->findAsCombo();
		$parametro = ClassRegistry::init('Parametro');
		$historico_padrao_id = $parametro->valor(15);
		$credito_id = $parametro->valor(14);
		$this->set(compact('debitos', 'creditos', 'historico_padrao', 'historico_padrao_id', 'credito_id'));
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
			$options = array('recursive' => false, 'conditions' => array('LancamentoContabil.' . $this->LancamentoContabil->primaryKey => $id));
			$this->LancamentoContabil->unbindModel(array('belongsTo' => array('Debito', 'Credito', 'HistoricoPadrao')));
			$this->request->data = $this->LancamentoContabil->find('first', $options);
		}
		$nivel = $this->PegarMaiorNivel();
		$debitos = $this->LancamentoContabil->Debito->findAsCombo('asc', 'Nivel = ' . $nivel);
		$creditos = $this->LancamentoContabil->Credito->findAsCombo('asc', 'Nivel = ' . $nivel);
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

/**
 * PegarMaiorNivel method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string
 * @return integer
 */
	public function PegarMaiorNivel() {
		$options = array('recursive' => false, 'fields' => array('Max(Debito.Nivel) as Nivel'));
		$nivel = $this->LancamentoContabil->Debito->find('first', $options);
		return $nivel[0]['Nivel'];
	}
	
}
