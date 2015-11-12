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

		$options = array('conditions' => array('AlunoDisciplina.disciplina_id' => $id), 'limit' => 200);
		$this->Disciplina->AlunoDisciplina->bindModel(array('belongsTo' => array('Aluno')));
		$alunos = $this->Disciplina->AlunoDisciplina->find('all', $options);
	    $alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));

		/*$options = array('conditions' => array('Pessoa.cidade_id' => $id), 'limit' => 200);
		$this->Cidade->Pessoa->unbindModel(array('hasMany' => array('Curso', 'Detalhe', 'Usuario')));
		$pessoas = $this->Cidade->Pessoa->find('all', $options);
		$pessoas = $this->TransformarArray->FindInContainable('Pessoa', $pessoas);
		$this->set(compact('pessoas'));

		$options = array('conditions' => array('Professor.cidade_id' => $id), 'limit' => 200);
		$this->Cidade->Professor->unbindModel(array('hasAndBelongsToMany' => array('Disciplina'), 'hasMany' => array('Aluno', 'AlunoDisciplina', 'Curso', 'CursoDisciplina', 'ProfessorDisciplina')));
		$professores = $this->Cidade->Professor->find('all', $options);
		$professores = $this->TransformarArray->FindInContainable('Professor', $professores);
		$this->set(compact('professores'));*/
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
