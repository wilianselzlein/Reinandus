<?php
App::uses('AppController', 'Controller');
/**
 * Disciplinas Controller
 *
 * @property Disciplina $Disciplina
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DisciplinasController extends AppController {

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
		$this->Disciplina->recursive = 0;
		$this->set('disciplinas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Disciplina->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 2, 'conditions' => array('Disciplina.' . $this->Disciplina->primaryKey => $id));
		$this->set('disciplina', $this->Disciplina->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Disciplina->create();
			if ($this->Disciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Disciplina->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$alunos = $this->Disciplina->Aluno->find('list');
		$cursos = $this->Disciplina->Curso->find('list');
		$professors = $this->Disciplina->Professor->find('list');
		$this->set(compact('alunos', 'cursos', 'professors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Disciplina->id = $id;
		if (!$this->Disciplina->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Disciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Disciplina->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Disciplina.' . $this->Disciplina->primaryKey => $id));
			$this->request->data = $this->Disciplina->find('first', $options);
		}
		$alunos = $this->Disciplina->Aluno->find('list');
		$cursos = $this->Disciplina->Curso->find('list');
		$professors = $this->Disciplina->Professor->find('list');
		$this->set(compact('alunos', 'cursos', 'professors'));
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
		$this->Disciplina->id = $id;
		if (!$this->Disciplina->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Disciplina->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
