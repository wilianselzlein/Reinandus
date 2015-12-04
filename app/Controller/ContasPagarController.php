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
        $this->Filter->setPaginate('fields', array('ContaPagar.id', 'ContaPagar.documento', 'ContaPagar.serie', 'Pessoa.id', 'Pessoa.fantasia', 'ContaPagar.vencimento', 'ContaPagar.valor', 'ContaPagar.pagamento',
           'Formapgto.id', 'Formapgto.nome'));

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
		$options = array('conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id), 
		  'fields' => array(
/*'ContaPagar.id', 'ContaPagar.pessoa_id', 'ContaPagar.tipo_id', 'ContaPagar.cadastro', 'ContaPagar.emissao', 'ContaPagar.vencimento', 'ContaPagar.pagamento', 'ContaPagar.documento', 'ContaPagar.serie', 
'ContaPagar.conta_id', 'ContaPagar.valor', 'ContaPagar.saldo', 'ContaPagar.juro', 'ContaPagar.multa', 'ContaPagar.situacao_id', 'ContaPagar.observacao', 'ContaPagar.cheque', 'ContaPagar.agencia', 
'ContaPagar.user_id', 'ContaPagar.banco_deposito', 'ContaPagar.conta_corrente', 'ContaPagar.liberado', 'ContaPagar.formapgto_id', 'ContaPagar.portador', */
'ContaPagar.*', 'Conta.id', 'Conta.conta', 'Tipo.id', 'Tipo.valor', 'User.id', 'User.username', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Situacao.id', 'Situacao.valor', 'Formapgto.id', 'Formapgto.nome'));
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
			$options = array('recursive' => 'false', 'conditions' => array('ContaPagar.' . $this->ContaPagar->primaryKey => $id));
			$this->ContaPagar->unbindModel(array('belongsTo' => array('Conta', 'Tipo', 'User', 'Pessoa', 'Situacao')));
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
