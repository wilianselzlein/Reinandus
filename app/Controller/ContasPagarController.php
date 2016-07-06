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
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index($tipo = null) {
		//$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->ContaPagar))));
		//$this->Filter->setPaginate('order', array('ContaPagar.id' => 'desc')); 
		//$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$filtros = array();
		$filtros['OR'] = $this->AdicionarFiltrosLike($this->ContaPagar);
		if ($tipo == 'Pagas')
			$filtros['AND'] = array('ContaPagar.pagamento' => array('value' => date('Y-m-d')));
		if ($tipo == 'Pagar')
			$filtros['AND'] = array('ContaPagar.vencimento' => array('value' => date('Y-m-d')));

		$filtro = array();
		$filtro['filter1'] = $filtros;	
	$this->Filter->addFilters($filtro);

		$this->Filter->setPaginate('order', array('ContaPagar.id' => 'desc')); 
		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);
        $this->Filter->setPaginate('fields', array('ContaPagar.id', 'ContaPagar.documento', 'ContaPagar.serie', 'Pessoa.id', 'Pessoa.razaosocial', 'ContaPagar.vencimento', 'ContaPagar.valor', 'ContaPagar.pagamento',
           'ContaPagar.liberado', 'Formapgto.id', 'Formapgto.nome'));

		$this->ContaPagar->recursive = 0;
		$this->ContaPagar->unbindModel(array('belongsTo' => array('Conta', 'Tipo', 'User', 'Situacao')));
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
		$options = array('conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id), 
		  'fields' => array(
/*'ContaPagar.id', 'ContaPagar.pessoa_id', 'ContaPagar.tipo_id', 'ContaPagar.cadastro', 'ContaPagar.emissao', 'ContaPagar.vencimento', 'ContaPagar.pagamento', 'ContaPagar.documento', 'ContaPagar.serie', 
'ContaPagar.conta_id', 'ContaPagar.valor', 'ContaPagar.saldo', 'ContaPagar.juro', 'ContaPagar.multa', 'ContaPagar.situacao_id', 'ContaPagar.observacao', 'ContaPagar.cheque', 'ContaPagar.agencia', 
'ContaPagar.user_id', 'ContaPagar.banco_deposito', 'ContaPagar.conta_corrente', 'ContaPagar.liberado', 'ContaPagar.formapgto_id', 'ContaPagar.portador', */
'ContaPagar.*', 'Conta.id', 'Conta.conta', 'Tipo.id', 'Tipo.valor', 'User.id', 'User.username', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Situacao.id', 'Situacao.valor', 'Formapgto.id', 'Formapgto.nome'));
		$contapagar = $this->ContaPagar->find('first', $options);
		$this->set('contapagar', $contapagar);

		$options = array('recursive' => 1, 'conditions' => array('LancamentoContabilValor.id' => 
			array($contapagar['ContaPagar']['lancamento_valor_id'], 
				$contapagar['ContaPagar']['lancamento_desconto_id'], 
				$contapagar['ContaPagar']['lancamento_juro_id'])));
		$lancamentos = $this->ContaPagar->LancamentoContabilValor->find('all', $options);
		$lancamentos = $this->TransformarArray->FindInContainable('LancamentoContabilValor', $lancamentos);
		if (isset($lancamentos['LancamentoContabilValor'])) {
			$lancamentos['LancamentoContabil'] = $lancamentos['LancamentoContabilValor'];
			unset($lancamentos['LancamentoContabilValor']);
		}
		$this->set(compact('lancamentos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContaPagar->create();
			$data = $this->request->data;	
			if ($data['ContaPagar']['cadastro'] == '')
				$data['ContaPagar']['cadastro'] = date('d/m/y');
			if ($data['ContaPagar']['emissao'] == '')
				$data['ContaPagar']['emissao'] = date('d/m/y');
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
		$formapgtos = $this->ContaPagar->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		$users = $this->ContaPagar->User->findAsCombo();
		$tipos = $this->ContaPagar->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'contapagar')));
		$situacaos = $this->ContaPagar->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id', 'Situacao.nome' => 'contapagar')));

        $this->ContaPagar->Formapgto->recursive = -1;
        $formapgto_id = $this->ContaPagar->Formapgto->findByTipo('P');
        if (isset($formapgto_id['Formapgto']))
        	$formapgto_id = $formapgto_id['Formapgto']['id'];
		$this->set(compact('contas', 'pessoas', 'formapgtos', 'users', 'situacaos', 'tipos', 'formapgto_id'));
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
			throw new NotFoundException(__('The record could not be found.'));
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
			$options = array('recursive' => false, 'conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id));
			$this->ContaPagar->unbindModel(array('belongsTo' => array('Conta', 'Tipo', 'User', 'Pessoa', 'Situacao', 'Formapgto', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
			$this->request->data = $this->ContaPagar->find('first', $options);
		}
		$contas = $this->ContaPagar->Conta->findAsCombo();
		$pessoas = $this->ContaPagar->Pessoa->findAsCombo();
		$formapgtos = $this->ContaPagar->Formapgto->findAsCombo('asc', 'tipo <> "I"');
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
		$this->ExcluirLancamentosContabeis($id);
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
			$contapagar = $this->request->data;
			if ($this->ContaPagar->save($contapagar)) {
				$this->RealizarLancamentosContabeis($contapagar);
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->ContaPagar->id
               )));

				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id), 
			'fields' => array(
/*ContaPagar.id, ContaPagar.pessoa_id, ContaPagar.tipo_id, ContaPagar.cadastro, ContaPagar.emissao, ContaPagar.vencimento, ContaPagar.pagamento, ContaPagar.documento, ContaPagar.serie, ContaPagar.conta_id, 
ContaPagar.valor, ContaPagar.saldo, ContaPagar.juro, ContaPagar.multa, ContaPagar.situacao_id, ContaPagar.observacao, ContaPagar.cheque, ContaPagar.agencia, ContaPagar.user_id, ContaPagar.banco_deposito, 
ContaPagar.conta_corrente, ContaPagar.liberado, ContaPagar.formapgto_id, ContaPagar.portador, */
'ContaPagar.*', 'Conta.id', 'Conta.banco', 'Conta.conta', 'Tipo.id', 'Tipo.valor', 'User.id', 'User.username', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 
'Situacao.id', 'Situacao.valor', 'Formapgto.id', 'Formapgto.nome'));
			$dados = $this->ContaPagar->find('first', $options);
			if (! is_null($dados['ContaPagar']['pagamento'])) {
				$this->Session->setFlash(__('Lançamento já pago!'), 'flash/error');
				/*$this->Session->setFlash(__('Lançamento já pago!'), "flash/linked/success", 
					array("link_text" => __('GO_TO'),"link_url" => array("action" => "view", $id)));
				//throw new Exception(__('Lançamento já pago!'));*/
				$this->redirect(array('action' => 'view', $id));
			}
			if ($dados['ContaPagar']['liberado'] == false) {
				$this->Session->setFlash(__('Lançamento não liberado para pagamento!'), 'flash/error');
				/*$this->Session->setFlash(__('Lançamento não liberado para pagamento!'), "flash/linked/success", 
					array("link_text" => __('GO_TO'),"link_url" => array("action" => "view", $id)));
				//throw new Exception(__('Lançamento não liberado para pagamento!'));*/
				$this->redirect(array('action' => 'view', $id));
			}
			$this->request->data = $dados; 
		}
		//$contas = $this->ContaPagar->Conta->findAsCombo();
		$pessoa_id = $this->request->data['ContaPagar']['pessoa_id'];
		$pessoas = $this->ContaPagar->Pessoa->find('list', array('conditions' => array('Pessoa.id' => $pessoa_id)));
		$formapgtos = $this->ContaPagar->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		//$tipos = $this->ContaPagar->Tipo->findAsCombo();
		$users = $this->ContaPagar->User->findAsCombo();
		$situacaos = $this->ContaPagar->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id', 'Situacao.nome' => 'contapagar')));
		$this->set(compact('contas', 'pessoas', 'formapgtos', 'users', 'situacaos', 'tipos'));
	}

/**
 * RealizarLancamentosContabeis method
 * @param array $contapagar
 * @return void
 */
	private function RealizarLancamentosContabeis($contapagar) {

		$this->LancarContabil($contapagar, 2, 'lancamento_desconto_id', 'PagDesDeb','PagDesCre','PagDesHis', 'desconto');
		$this->LancarContabil($contapagar, 1, 'lancamento_valor_id', 'PagValDeb','PagValCre','PagValHis', 'valor');
		$this->LancarContabil($contapagar, 3, 'lancamento_juro_id', 'PagJurDeb','PagJurCre','PagJurHis', 'juro');
		//die;
	}

/**
 * LancarContabil method
 * @param array $contapagar, string[field] $campo, $debito, $credito, $historico, $valor
 * @return void
 */
	private function LancarContabil($contapagar, $inc, $campo, $debito, $credito, $historico, $valor) {
		if ($contapagar['ContaPagar'][$valor] <= 0) 
			return;

		$this->ContaPagar->Formapgto->recursive = false;
		$forma = $this->ContaPagar->Formapgto->findById($contapagar['ContaPagar']['formapgto_id'], array('id', $debito, $credito, $historico));

		if ((is_null($forma['Formapgto'][$debito])) || (is_null($forma['Formapgto'][$credito])) || (is_null($forma['Formapgto'][$historico])))
			return;

		$id = 0;
		if (isset($contapagar['ContaPagar'][$campo]))
			$id = $contapagar['ContaPagar'][$campo];
        if ($id > 0)
        	$lancamento['id'] = $id;
        $lancamento['data'] = $contapagar['ContaPagar']['pagamento'];
        $lancamento['debito_id'] = $forma['Formapgto'][$debito];
        $lancamento['credito_id'] = $forma['Formapgto'][$credito];
        $lancamento['historico_padrao_id'] = $forma['Formapgto'][$historico];
        $lancamento['documento'] = $contapagar['ContaPagar']['documento'] . ' ' . $contapagar['ContaPagar']['serie'];

		$pessoa_id = $this->request->data['ContaPagar']['pessoa_id'];
		$pessoa = $this->ContaPagar->Pessoa->find('list', array('conditions' => array('Pessoa.id' => $pessoa_id)));
        $lancamento['complemento'] = $contapagar['ContaPagar']['pessoa_id'] . ' ' . $pessoa[$pessoa_id];
		$lancamento['valor'] = $contapagar['ContaPagar'][$valor];

		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');
		$LancamentoContabil->create();
		$LancamentoContabil->save($lancamento);

		if ($id == 0) {
			$relacionamento = [];
			$relacionamento['ContaPagar']['id'] = $contapagar['ContaPagar']['id'];
			$relacionamento['ContaPagar'][$campo] = $LancamentoContabil->getLastInsertID();
			$this->ContaPagar->save($relacionamento);
		}
	}

/**
 * ExcluirLancamentosContabeis method
 * @param int $id
 * @return void
 */
	private function ExcluirLancamentosContabeis($id) {
		$this->ContaPagar->recursive = false;
		$lancamentos = $this->ContaPagar->findById($id, array('lancamento_desconto_id', 'lancamento_valor_id', 'lancamento_juro_id'));
		
		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');
		foreach ($lancamentos['ContaPagar'] as $lancamento => $lancamento_id) {
			if (! is_null($lancamento_id)) {
				$LancamentoContabil->id = $lancamento_id;
				$LancamentoContabil->delete();
			}
		}
	}

}
