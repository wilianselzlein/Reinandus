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
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Contum))));
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
		$options = array('recursive' => false, 'conditions' => array('Contum.' . $this->Contum->primaryKey => $id));
		$this->set('contum', $this->Contum->find('first', $options));
		
		$options = array('recursive' => 0, 'conditions' => array('Mensalidade.conta_id' => $id), 'limit' => 200, 
		'fields' => array('Mensalidade.id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Aluno.id', 'Aluno.nome'));
		$this->Contum->Mensalidade->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$mensalidades = $this->Contum->Mensalidade->find('all', $options);
		$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
		$this->set(compact('mensalidades'));
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
		$formapgtos = $this->Contum->Formapgto->findAsCombo();
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
			$options = array('recursive' => false, 'conditions' => array('Contum.' . $this->Contum->primaryKey => $id));
			$this->request->data = $this->Contum->find('first', $options);
		}
		$formapgtos = $this->Contum->Formapgto->findAsCombo();
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
