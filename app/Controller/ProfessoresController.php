<?php
App::uses('AppController', 'Controller');
/**
 * Professors Controller
 *
 * @property Professor $Professor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProfessoresController extends AppController {
   public $uses = array('Professor');
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

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Professor))));
		$this->Filter->setPaginate('order', array('Professor.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Professor->recursive = 0;
		$this->set('professores', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Professor->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 1, 'conditions' => array('Professor.' . $this->Professor->primaryKey => $id));
		$this->set('professor', $this->Professor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Professor->create();
			if ($this->Professor->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Professor->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$cidades = $this->Professor->Cidade->find('list');
		$disciplinas = $this->Professor->Disciplina->find('list');
		$this->set(compact('cidades', 'disciplinas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Professor->id = $id;
		if (!$this->Professor->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Professor->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Professor->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Professor.' . $this->Professor->primaryKey => $id));
			$this->request->data = $this->Professor->find('first', $options);
		}
		$cidades = $this->Professor->Cidade->find('list');
		$disciplinas = $this->Professor->Disciplina->find('list');
		$this->set(compact('cidades', 'disciplinas'));
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
		$this->Professor->id = $id;
		if (!$this->Professor->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Professor->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
