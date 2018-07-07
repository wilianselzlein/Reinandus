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


		$options = array('fields' => array('AlunoDisciplina.aluno_id'), 'conditions' => array('AlunoDisciplina.disciplina_id = ' => $id));
		$alunos = $this->Disciplina->AlunoDisciplina->find('list', $options);
		sort($alunos);
		if (empty($alunos)) $alunos[] = 0;

		$options = array('recursive' => false, 'conditions' => array('Aluno.id >= ' => min($alunos), 'Aluno.id <= ' => max($alunos), 'AND' => array('Aluno.id' => $alunos)),
			'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor', 'Curso.id', 'Curso.nome'));
		$this->Disciplina->Aluno->unbindModel(
			array('belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Professor', 'Responsavel', 'Cidade')),
			array('hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade')));
		$alunos = $this->Disciplina->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));


		$options = array('fields' => array('CursoDisciplina.curso_id'), 'conditions' => array('CursoDisciplina.disciplina_id = ' => $id));
		$cursos = $this->Disciplina->CursoDisciplina->find('list', $options);
		sort($cursos);
		if (empty($cursos)) $cursos[] = 0;
		
		$options = array('recursive' => false, 'conditions' => array('Curso.id >= ' => min($cursos), 'Curso.id <= ' => max($cursos),'AND' => array('Curso.id' => $cursos)),
			'fields' => array('Curso.id', 'Curso.nome', 'Curso.turma', 'Curso.carga', 'Curso.sigla', 'Curso.num_turma', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Professor.id', 'Professor.nome', 'Periodo.id', 'Periodo.valor'));
		$this->Disciplina->Curso->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$cursos = $this->Disciplina->Curso->find('all', $options);
		$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
		$this->set(compact('cursos'));


		$options = array('fields' => array('professor_id'), 'conditions' => array('DisciplinaProfessor.disciplina_id = ' => $id));
		$professores = $this->Disciplina->DisciplinaProfessor->find('list', $options);
		sort($professores);
		if (empty($professores)) $professores[] = 0;
		
		$options = array('recursive' => false, 'conditions' => array('Professor.id >= ' => min($professores), 'Professor.id <= ' => max($professores), 'AND' => array('Professor.id' => $professores)), 
			'fields' => array('Professor.id', 'Professor.nome', 'Professor.celular', 'Professor.email', 'Cidade.id', 'Cidade.nome'));
		$professores = $this->Disciplina->Professor->find('all', $options);
		$professores = $this->TransformarArray->FindInContainable('Professor', $professores);
		$this->set(compact('professores'));
		
		$options = array('recursive' => false, 'conditions' => array('Calendario.disciplina_id' => $id), 'limit' => self::$LIMITE_VIEW,
		  'fields' => array('Calendario.id', 'Calendario.data', 'Curso.id', 'Curso.nome', 'Disciplina.id', 'Disciplina.nome'));
		$calendarios = $this->Disciplina->Calendario->find('all', $options);
		$calendarios = $this->TransformarArray->FindInContainable('Calendario', $calendarios);
		$this->set(compact('calendarios'));
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
