<?php
App::uses('AppController', 'Controller');
/**
 * Calendarios Controller
 *
 * @property Calendario $Calendario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CalendariosController extends AppController {

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

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Calendario))));
		$this->Filter->setPaginate('order', array('Calendario.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
      
		$this->Calendario->recursive = 0;
		$this->set('calendarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Calendario->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Calendario.' . $this->Calendario->primaryKey => $id));
		$this->set('calendario', $this->Calendario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Calendario->create();
			if ($this->Calendario->save($this->request->data)) {
			$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Calendario->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$disciplinas = $this->Calendario->Disciplina->findAsCombo();
		$cursos = $this->Calendario->Curso->findAsCombo();
		$this->set(compact('disciplinas', 'cursos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Calendario->id = $id;
		if (!$this->Calendario->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Calendario->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Calendario->id
               )
            ));
            
			$this->redirect(array('action' => 'index'));

			} else {
				if (isset($this->Calendario->validationErrors['JA_ALTERADO']))
					$this->Session->setFlash(__('JA_ALTERADO'), 'flash/error');
				else
					$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Calendario.' . $this->Calendario->primaryKey => $id));
			$this->request->data = $this->Calendario->find('first', $options);
		}
		$disciplinas = $this->Calendario->Disciplina->findAsCombo();
		$cursos = $this->Calendario->Curso->findAsCombo();
		$this->set(compact('disciplinas', 'cursos'));
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
		$this->Calendario->id = $id;
		if (!$this->Calendario->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Calendario->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

}
