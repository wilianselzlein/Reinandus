<?php
App::uses('AppController', 'Controller');
/**
 * Alunos Controller
 *
 * @property Aluno $Aluno
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlunosController extends AppController {

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
		$this->Aluno->recursive = 0;
		$this->set('alunos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aluno->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
		$this->set('aluno', $this->Aluno->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aluno->create();
			if ($this->Aluno->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$estadoCivils = $this->Aluno->EstadoCivil->find('list');
		$indicacaos = $this->Aluno->Indicacao->find('list');
		$cursos = $this->Aluno->Curso->find('list');
		$professors = $this->Aluno->Professor->find('list');
		$cidades = $this->Aluno->Cidade->find('list');
		$responsavels = $this->Aluno->Responsavel->find('list');
		$disciplinas = $this->Aluno->Disciplina->find('list');
		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professors', 'cidades', 'responsavels', 'disciplinas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Aluno->id = $id;
		if (!$this->Aluno->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aluno->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
			$this->request->data = $this->Aluno->find('first', $options);
		}
		$estadoCivils = $this->Aluno->EstadoCivil->find('list');
		$indicacaos = $this->Aluno->Indicacao->find('list');
		$cursos = $this->Aluno->Curso->find('list');
		$professors = $this->Aluno->Professor->find('list');
		$cidades = $this->Aluno->Cidade->find('list');
		$responsavels = $this->Aluno->Responsavel->find('list');
		$disciplinas = $this->Aluno->Disciplina->find('list');
		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professors', 'cidades', 'responsavels', 'disciplinas'));
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
		$this->Aluno->id = $id;
		if (!$this->Aluno->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Aluno->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
