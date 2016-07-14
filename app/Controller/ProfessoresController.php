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
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index($tipo = null) {

		$filtros = array();
		$filtros['OR'] = $this->AdicionarFiltrosLike($this->Professor);
		if ($tipo == 'Aniver')
			$filtros['AND'] = array('Professor.data_nascimento' => array('value' => date('Y-m-d')));

		$filtro = array();
		$filtro['filter1'] = $filtros;
		$this->Filter->addFilters($filtro);

		$this->Filter->setPaginate('order', array('Professor.id' => 'desc')); 
		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);

		$this->Filter->setPaginate('fields', array('Professor.id', 'Professor.nome', 'Professor.endereco', 'Cidade.id', 'Cidade.nome', 
			'Professor.fone', 'Professor.email', 'Professor.numero', 'Professor.bairro', 'Professor.cep'));

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
		$options = array('recursive' => 0, 'conditions' => array('Professor.' . $this->Professor->primaryKey => $id));
		$this->set('professor', $this->Professor->find('first', $options));

		$options = array('recursive' => 0, 'conditions' => array('Curso.professor_id' => $id), 'limit' => 200,
		 'fields' => array('Curso.id', 'Curso.nome', 'Curso.turma', 'Curso.carga', 'Curso.sigla', 'Curso.num_turma', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Professor.id', 'Professor.nome', 'Periodo.id', 'Periodo.valor'));
		$this->Professor->Curso->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$cursos = $this->Professor->Curso->find('all', $options);
		$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
		$this->set(compact('cursos'));

		$options = array('conditions' => array('Aluno.professor_id' => $id), 'limit' => 200,
		  'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor'));
		$this->Professor->Aluno->unbindModel(array(
			'hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade'),
			'belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
		$alunos = $this->Professor->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));

		$options = array('recursive' => 0, 'conditions' => array('DisciplinaProfessor.professor_id' => $id), 'limit' => 200,
			'fields' => array('DisciplinaProfessor.id', 'DisciplinaProfessor.disciplina_id', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Professor->DisciplinaProfessor->bindModel(array('belongsTo' => array('Disciplina', 'Professor')));
		$disciplinas = $this->Professor->DisciplinaProfessor->find('all', $options);
		$disciplinas = $this->TransformarArray->FindInContainable('DisciplinaProfessor', $disciplinas);
		$this->set(compact('disciplinas'));

		$options = array('recursive' => 0, 'conditions' => array('CursoDisciplina.professor_id' => $id), 'limit' => 200,
			'fields' => array('DISTINCT Curso.id', 'Curso.nome', 'CursoDisciplina.id', 'CursoDisciplina.disciplina_id', 'CursoDisciplina.horas_aula', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Professor->Curso->CursoDisciplina->bindModel(array('belongsTo' => array('Disciplina', 'Professor')));
		$relacionadas = $this->Professor->Curso->CursoDisciplina->find('all', $options);
		$relacionadas = $this->TransformarArray->FindInContainable('CursoDisciplina', $relacionadas);
		$this->set(compact('relacionadas'));

		$options = array('recursive' => 0, 'conditions' => array('AlunoDisciplina.professor_id' => $id), 'limit' => 200,
			'fields' => array('DISTINCT Aluno.id', 'Aluno.nome', 'AlunoDisciplina.id', 'AlunoDisciplina.disciplina_id', 'AlunoDisciplina.horas_aula', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Professor->Aluno->AlunoDisciplina->bindModel(array('belongsTo' => array('Disciplina', 'Professor')));
		$ministradas = $this->Professor->Aluno->AlunoDisciplina->find('all', $options);
		$ministradas = $this->TransformarArray->FindInContainable('AlunoDisciplina', $ministradas);

		$this->set(compact('ministradas'));
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
		$cidades = $this->Professor->Cidade->findAsCombo();
		$disciplinas = $this->Professor->Disciplina->findAsCombo('asc', array('Disciplina.nome <> ""'));
		$titulacoes = $this->Professor->Titulacao->find('list', array('conditions' => array('Titulacao.referencia' => 'resumo_titulacao_id', 'Titulacao.nome' => 'professor')));
		$this->set(compact('cidades', 'disciplinas', 'titulacoes'));
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
			$options = array('recursive' => false, 'conditions' => array('Professor.' . $this->Professor->primaryKey => $id));
			$this->request->data = $this->Professor->find('first', $options);
		}
		$cidades = $this->Professor->Cidade->findAsCombo();
		$disciplinas = $this->Professor->Disciplina->findAsCombo('asc', array('Disciplina.nome <> ""'));
		$titulacoes = $this->Professor->Titulacao->find('list', array('conditions' => array('Titulacao.referencia' => 'resumo_titulacao_id', 'Titulacao.nome' => 'professor')));
		$this->set(compact('cidades', 'disciplinas', 'titulacoes'));
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

/**
 * email method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function emails() {
		$options = array('recursive' => 0, 'fields' => array('Professor.email'), 
			'conditions' => array('Professor.email <> ""'), 'order' => array('Professor.email'));

	    $emails = $this->Professor->find('list', $options);
		$this->set('emails', $emails);
	}

}
