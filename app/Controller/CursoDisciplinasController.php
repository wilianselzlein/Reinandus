<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CursoDisciplinasController extends AppController {

    //public $uses = array('Curso', 'CursoDisciplina');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


/**
 * add method
 *
 * @return void
 */
	public function add($curso_id = null) {
		if ($this->request->is('post')) {
			$this->CursoDisciplina->create();
			$this->request->data['CursoDisciplina']['curso_id'] = $curso_id;
			if ($this->CursoDisciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('controller' => 'cursos', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$disciplinas = $this->CursoDisciplina->Disciplina->find('list');
		$professores = $this->CursoDisciplina->Professor->find('list');
		$this->set(compact('disciplinas', 'professores'));
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
		$this->CursoDisciplina->id = $id;
		if (!$this->CursoDisciplina->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->CursoDisciplina->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'cursos','action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'cursos', 'action' => 'index'));
	}

}
