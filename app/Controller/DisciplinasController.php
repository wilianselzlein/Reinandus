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
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Disciplina))));
		$this->Filter->setPaginate('order', array('Disciplina.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

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
		$options = array('recursive' => false, 'conditions' => array('Disciplina.' . $this->Disciplina->primaryKey => $id));
		$this->set('disciplina', $this->Disciplina->find('first', $options));


		$options = array('fields' => array('aluno_id'), 'conditions' => array('disciplina_id = ' => $id), 'limit' => 200);
		$alunos = $this->Disciplina->AlunoDisciplina->find('list', $options);
		sort($alunos);

		$options = array('recursive' => false, 'conditions' => array('Aluno.id >= ' => min($alunos), 'Aluno.id <= ' => max($alunos), 'AND' => array('Aluno.id' => $alunos)));
		$this->Disciplina->Aluno->unbindModel(
			array('belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Responsavel', 'Cidade')),
			array('hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade')));
		$alunos = $this->Disciplina->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));


		$options = array('fields' => array('curso_id'), 'conditions' => array('disciplina_id = ' => $id), 'limit' => 200);
		$cursos = $this->Disciplina->CursoDisciplina->find('list', $options);
		sort($cursos);
		
		$options = array('recursive' => false, 'conditions' => array('Curso.id >= ' => min($cursos), 'Curso.id <= ' => max($cursos),'AND' => array('Curso.id' => $cursos)));
		$this->Disciplina->Curso->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$cursos = $this->Disciplina->Curso->find('all', $options);
		$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
		$this->set(compact('cursos'));


		$options = array('fields' => array('professor_id'), 'conditions' => array('disciplina_id = ' => $id), 'limit' => 200);
		$professores = $this->Disciplina->DisciplinaProfessor->find('list', $options);
		sort($professores);
		
		$options = array('recursive' => false, 'conditions' => array('Professor.id >= ' => min($professores), 'Professor.id <= ' => max($professores), 'AND' => array('Professor.id' => $professores)));
		$professores = $this->Disciplina->Professor->find('all', $options);
		$professores = $this->TransformarArray->FindInContainable('Professor', $professores);
		$this->set(compact('professores'));
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
			$options = array('recursive' => false, 'conditions' => array('Disciplina.' . $this->Disciplina->primaryKey => $id));
			$this->request->data = $this->Disciplina->find('first', $options);
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
