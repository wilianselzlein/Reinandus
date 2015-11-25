<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CursosController extends AppController {

    public $uses = array('Curso', 'CursoDisciplina');

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Curso))));
		$this->Filter->setPaginate('order', array('Curso.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Filter->setPaginate('fields', array('Curso.id', 'Curso.nome', 'Curso.sigla', 'Curso.turma', 'Curso.carga', 
			'Professor.id', 'Professor.nome', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial'));
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 0, 'conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
		$this->set('curso', $this->Curso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Curso->create();
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Curso->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$professores = $this->Curso->Professor->findAsCombo();
		$pessoas = $this->Curso->Pessoa->findAsCombo();
		$grupos = $this->Curso->Grupo->findAsCombo();
		$tipos = $this->Curso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'curso')));
		$periodos = $this->Curso->Periodo->find('list', array('conditions' => array('Periodo.referencia' => 'periodo_id')));
		$this->set(compact('professores', 'pessoas', 'grupos', 'tipos', 'periodos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Curso->id = $id;
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Curso->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
			$this->Curso->unbindModel(array('belongsTo' => array('Professor', 'Pessoa', 'Grupo', 'Tipo', 'Periodo')));
			$this->request->data = $this->Curso->find('first', $options);
		}
		$professores = $this->Curso->Professor->findAsCombo();
		$pessoas = $this->Curso->Pessoa->findAsCombo();
		$grupos = $this->Curso->Grupo->findAsCombo();
		$tipos = $this->Curso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'curso')));
		$periodos = $this->Curso->Periodo->find('list', array('conditions' => array('Periodo.referencia' => 'periodo_id')));
		$this->set(compact('professores', 'pessoas', 'grupos', 'tipos', 'periodos'));
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
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Curso->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * disciplina method
 *
 * @return void
 */
	public function disciplina($id) {
		$this->layout = false;
		$options = array('conditions' => array('CursoDisciplina.curso_id' => $id));
		$this->set('curso_id', $id);
		$this->set('disciplina', $this->CursoDisciplina->find('all', $options));

	}

}
