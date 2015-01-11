<?php
App::uses('AppController', 'Controller');
/**
 * Alunos Controller
 *
 * @property Aluno $Aluno
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlunoDisciplinasController extends AppController {

    public $uses = array('Aluno', 'AlunoDisciplina');

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
	public function add($aluno_id = null, $layout = 'default') {
      $this->layout = $layout;
      if ($this->request->is('post')) {
			$this->AlunoDisciplina->create();
			$this->request->data['AlunoDisciplina']['aluno_id'] = $aluno_id;
			if ($this->AlunoDisciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('controller' => 'alunos', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$disciplinas = $this->AlunoDisciplina->Disciplina->find('list');
		$professors = $this->AlunoDisciplina->Professor->find('list');
		$this->set(compact('disciplinas', 'professors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $layout = 'default') {
		$this->layout = $layout;
        $this->AlunoDisciplina->id = $id;
		if (!$this->AlunoDisciplina->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AlunoDisciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('controller' => 'alunos', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('AlunoDisciplina.' . $this->AlunoDisciplina->primaryKey => $id));
			$this->request->data = $this->AlunoDisciplina->find('first', $options);
		}
		$professors = $this->AlunoDisciplina->Professor->find('list');
		$disciplinas = $this->AlunoDisciplina->Disciplina->find('list');
		$this->set(compact('professors', 'disciplinas'));
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
		$this->AlunoDisciplina->id = $id;
		if (!$this->AlunoDisciplina->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->AlunoDisciplina->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'alunos','action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'alunos', 'action' => 'index'));
	}

}
