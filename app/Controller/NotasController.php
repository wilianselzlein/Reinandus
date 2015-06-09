<?php
App::uses('AppController', 'Controller');
/**
 * Notas Controller
 *
 * @property Nota $Nota
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NotasController extends AppController {

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
		$cursos = $this->Nota->Curso->findAsCombo();
		$disciplinas = $this->Nota->Disciplina->findAsCombo();
		$professores = $this->Nota->Professor->findAsCombo();
		$this->set(compact('cursos', 'disciplinas', 'professores'));
	}

/**
 * lancar method
 *
 * @return void
 */
	public function lancar() {
		$data = $this->request->data;
		$data = $data['Nota'];
		$professor = $data['professor_id'];
		$cursos = $data['Curso'];
		$disciplinas = $data['Disciplina'];

		$notas = $this->Nota->AlunoDisciplina->find('all', array('recursive' => 0, 'conditions' =>
			array(
				'AlunoDisciplina.professor_id' => $professor, 
				'Aluno.curso_id' => $cursos,
				'AlunoDisciplina.disciplina_id' => $disciplinas)
		));
		$this->set(compact('notas'));
	}

/**
 * gravar method
 *
 * @return void
 */
	public function gravar() {
		if ($this->request->is('post') || $this->request->is('put')) {

			$data = $this->request->data;
			foreach ($data as $item) {
				
				$this->Nota->AlunoDisciplina->create();
				$this->Nota->AlunoDisciplina->save($item['AlunoDisciplina']);

				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
			}
		} 
		$this->redirect(array('action' => 'index'));
	}

}

