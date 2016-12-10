<?php
App::uses('AppController', 'Controller');
/**
 * PlanoConta Controller
 *
 * @property PlanoConta $PlanoConta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlanoContasController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->PlanoConta))));
		$this->Filter->setPaginate('order', array('PlanoConta.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->PlanoConta->recursive = 0;
		$this->set('planocontas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlanoConta->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('PlanoConta.' . $this->PlanoConta->primaryKey => $id));
		$this->set('planoconta', $this->PlanoConta->find('first', $options));

		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');

		$options = array('recursive' => 1, 'conditions' => array('LancamentoContabil.debito_id' => $id), 'limit' => Self::$LIMITE_VIEW);
		$debitos = $LancamentoContabil->find('all', $options);
		$debitos = $this->TransformarArray->FindInContainable('LancamentoContabil', $debitos);
		$this->set(compact('debitos'));

		$options = array('recursive' => 1, 'conditions' => array('LancamentoContabil.credito_id' => $id), 'limit' => Self::$LIMITE_VIEW);
		$creditos = $LancamentoContabil->find('all', $options);
		$creditos = $this->TransformarArray->FindInContainable('LancamentoContabil', $creditos);
		$this->set(compact('creditos'));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlanoConta->create();
			if ($this->PlanoConta->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->PlanoConta->id
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
        $this->PlanoConta->id = $id;
		if (!$this->PlanoConta->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlanoConta->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->PlanoConta->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('PlanoConta.' . $this->PlanoConta->primaryKey => $id));
			$this->request->data = $this->PlanoConta->find('first', $options);
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
		$this->PlanoConta->id = $id;
		if (!$this->PlanoConta->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->PlanoConta->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
