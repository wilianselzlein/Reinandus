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

		$options = array('recursive' => 0, 'conditions' => array('DisciplinaProfessor.professor_id' => $id), 'limit' => 200,
			'fields' => array('DisciplinaProfessor.id', 'DisciplinaProfessor.disciplina_id', /*'DisciplinaProfessor.horas_aula',*/ 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Professor->DisciplinaProfessor->bindModel(array('belongsTo' => array('Disciplina', 'Professor')));
		$disciplinas = $this->Professor->DisciplinaProfessor->find('all', $options);
		$disciplinas = $this->TransformarArray->FindInContainable('DisciplinaProfessor', $disciplinas);
		$this->set(compact('disciplinas'));
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
		$this->set(compact('cidades', 'disciplinas'));
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
		$this->set(compact('cidades', 'disciplinas'));
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
