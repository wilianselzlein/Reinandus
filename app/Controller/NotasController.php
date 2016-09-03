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
		array_shift($cursos);
		$disciplinas = $this->Nota->Disciplina->findAsCombo();
		array_shift($disciplinas);
		$professores = $this->Nota->Professor->findAsCombo();
		array_shift($professores);
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
		//$professor = $data['professor_id'];
		$cursos = $data['Curso'];
		$disciplinas = $data['Disciplina'];

		$ativos_id = 8;

		$notas = $this->Nota->AlunoDisciplina->find('all', array('recursive' => false, 'conditions' =>
			array(/*'AlunoDisciplina.professor_id' => $professor,*/ 'Aluno.curso_id' => $cursos, 'AlunoDisciplina.disciplina_id' => $disciplinas, 'Aluno.situacao_id' => $ativos_id),
			'fields' => array('AlunoDisciplina.id', 'AlunoDisciplina.aluno_id', 'AlunoDisciplina.disciplina_id', 'AlunoDisciplina.professor_id', 'AlunoDisciplina.frequencia', 
				'AlunoDisciplina.nota', 'AlunoDisciplina.horas_aula', 'AlunoDisciplina.data', 'Aluno.id', 'Aluno.nome', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'),
				'order' => array('Aluno.Nome')));

		$professores = $this->Nota->Professor->findAsCombo();
		$this->set(compact('notas', 'professores', 'cursos', 'disciplinas')); //'professor',
	}

/**
 * gravar method
 *
 * @return void
 */
	public function gravar() {
		if ($this->request->is('post') || $this->request->is('put')) {

			$data = $this->request->data;
			//debug($data); die;
			foreach ($data as $item) {
				//debug($item['AlunoDisciplina']); die;
				$this->Nota->AlunoDisciplina->create();
				$this->Nota->AlunoDisciplina->save($item['AlunoDisciplina']);

				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
			}
		} 
		$this->redirect(array('action' => 'index'));
	}

}

