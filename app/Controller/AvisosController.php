<?php
App::uses('AppController', 'Controller');
/**
 * Avisos Controller
 *
 * @property Aviso $Aviso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AvisosController extends AppController {

    public $uses = array('Aviso', 'AvisoCurso', 'AvisoGrupo');

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
	public function index($user_id = null) {
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Aviso))));
		$this->Filter->setPaginate('order', array('Aviso.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Aviso->recursive = 0;
		if ($user_id != null)
			$this->Paginator->settings = array(
				'conditions' => array('Aviso.user_id ' => $user_id),
				'order' => array('Aviso.data' => 'desc')
			);
		$this->set('avisos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aviso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Aviso.' . $this->Aviso->primaryKey => $id));
		$this->set('aviso', $this->Aviso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aviso->create();
			if ($this->Aviso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Aviso->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Aviso->User->find('list');
		$tipos = $this->Aviso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'aviso')));
		$cursos = $this->Aviso->Curso->find('list');
		$grupos = $this->Aviso->Grupo->find('list');
		$this->set(compact('users', 'tipos', 'cursos', 'grupos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Aviso->id = $id;
		if (!$this->Aviso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aviso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Aviso->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Aviso.' . $this->Aviso->primaryKey => $id));
			$this->request->data = $this->Aviso->find('first', $options);
		}
		$users = $this->Aviso->User->find('list');
		$tipos = $this->Aviso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'aviso')));
		$cursos = $this->Aviso->Curso->find('list');
		$grupos = $this->Aviso->Grupo->find('list');
		$this->set(compact('users', 'tipos', 'cursos', 'grupos'));
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
		$this->Aviso->id = $id;

		if (!$this->Aviso->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$arquivo = $this->Aviso->findById($id);
		$arquivo = $arquivo['Aviso']['caminho'];		
		if (is_file($arquivo)) {
			unlink($arquivo);
		}
		if ($this->Aviso->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * curso method
 *
 * @return void
 */
	public function curso($id) {
		$this->layout = false;
		$options = array('conditions' => array('AvisoCurso.aviso_id' => $id));
		$this->set('aviso_id', $id);
		$this->set('curso', $this->AvisoCurso->find('all', $options));

	}

/**
 * grupo method
 *
 * @return void
 */
	public function grupo($id) {
		$this->layout = false;
		$options = array('conditions' => array('AvisoGrupo.aviso_id' => $id));
		$this->set('aviso_id', $id);
		$this->set('grupo', $this->AvisoGrupo->find('all', $options));
	}

}
