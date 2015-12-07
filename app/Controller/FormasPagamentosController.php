<?php
App::uses('AppController', 'Controller');
/**
 * Formapgtos Controller
 *
 * @property Formapgto $Formapgto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FormasPagamentosController extends AppController {
   public $uses = array('Formapgto');
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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Formapgto))));
		$this->Filter->setPaginate('order', array('Formapgto.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Formapgto->recursive = 0;
		$this->set('formapgtos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Formapgto->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Formapgto.' . $this->Formapgto->primaryKey => $id));
		$this->set('formapgto', $this->Formapgto->find('first', $options));

		$options = array('recursive' => 0, 'conditions' => array('Mensalidade.formapgto_id' => $id), 'limit' => 200, 
		'fields' => array('Mensalidade.id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Aluno.id', 'Aluno.nome'));

		$this->Formapgto->Mensalidade->unbindModel(array('belongsTo' => array('User', 'Conta', 'Formapgto')));
		$mensalidades = $this->Formapgto->Mensalidade->find('all', $options);
		$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
		$this->set(compact('mensalidades'));

		$options = array('recursive' => 0, 'conditions' => array('ContaPagar.formapgto_id' => $id), 'limit' => 200, 
    		'fields' => array('ContaPagar.id', 'ContaPagar.documento', 'Pessoa.id', 'Pessoa.razaosocial', 'ContaPagar.valor', 'ContaPagar.vencimento', 'ContaPagar.pagamento'));
		$this->Formapgto->ContaPagar->unbindModel(array('belongsTo' => array('Conta', 'User', 'Formapgto')));
		$pagar = $this->Formapgto->ContaPagar->find('all', $options);
		$pagar = $this->TransformarArray->FindInContainable('ContaPagar', $pagar);
		$this->set(compact('pagar'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Formapgto->create();
			if ($this->Formapgto->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Formapgto->id
               )
            ));
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
        $this->Formapgto->id = $id;
		if (!$this->Formapgto->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Formapgto->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Formapgto->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Formapgto.' . $this->Formapgto->primaryKey => $id));
			$this->request->data = $this->Formapgto->find('first', $options);
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
		$this->Formapgto->id = $id;
		if (!$this->Formapgto->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Formapgto->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
