<?php
App::uses('AppController', 'Controller');
/**
 * Grupos Controller
 *
 * @property Grupo $Grupo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GruposController extends AppController {

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

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Grupo))));
		$this->Filter->setPaginate('order', array('Grupo.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Grupo->recursive = 0;
		$this->set('grupos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Grupo->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
		$this->Grupo->unbindModel(array('hasMany' => array('AvisoGrupo', 'Curso')));
		$this->set('grupo', $this->Grupo->find('first', $options));

		$options = array('fields' => array('aviso_id'), 'conditions' => array('grupo_id = ' => $id));
		$avisos = $this->Grupo->AvisoGrupo->find('list', $options);
		sort($avisos);
		if (empty($avisos)) $avisos[] = 0;

		$options = array('recursive' => 0, 'conditions' => array('Aviso.id >= ' => min($avisos), 'Aviso.id <= ' => max($avisos), 'AND' => array('Aviso.id' => $avisos)),
		  'fields' => array('Aviso.id', 'Aviso.data', 'Aviso.arquivo', 'Aviso.mensagem', 'User.id', 'User.username', 'Tipo.id', 'Tipo.valor'));
		$avisos = $this->Grupo->AvisoGrupo->Aviso->find('all', $options);
		$avisos = $this->TransformarArray->FindInContainable('Aviso', $avisos);
		$this->set(compact('avisos'));

		$options = array('recursive' => 0, 'conditions' => array('Curso.grupo_id' => $id), 'limit' => self::$LIMITE_VIEW,
          'fields' => array('Curso.id', 'Curso.nome', 'Curso.turma', 'Curso.carga', 'Curso.sigla', 'Curso.num_turma', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Professor.id', 'Professor.nome', 'Periodo.id', 'Periodo.valor'));
		$this->Grupo->Curso->unbindModel(array(
			'belongsTo' => array('Grupo', 'Tipo')));
		$cursos = $this->Grupo->Curso->find('all', $options);
		$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
		$this->set(compact('cursos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Grupo->create();
			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Grupo->id
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
        $this->Grupo->id = $id;
		if (!$this->Grupo->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Grupo->save($this->request->data)) {
            $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Grupo->id
               )
            ));
            
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
			$this->request->data = $this->Grupo->find('first', $options);
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
		$this->Grupo->id = $id;
		if (!$this->Grupo->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Grupo->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
