<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RolesController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Role))));
		$this->Filter->setPaginate('order', array('Role.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Role->recursive = 0;
		$this->set('roles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
		
		$options = array('recursive' => 0, 'conditions' => array('Usuario.role_id' => $id), 'limit' => 200,
		 'fields' => array('Usuario.id', 'Usuario.username', 'Usuario.created', 'Usuario.modified', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial'));
        //$this->Pessoa->User->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$usuarios = $this->Role->Usuario->find('all', $options);
		$usuarios = $this->TransformarArray->FindInContainable('Usuario', $usuarios);
		$this->set(compact('usuarios'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Role->id
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
        $this->Role->id = $id;
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Role->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
			$this->request->data = $this->Role->find('first', $options);
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
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Role->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}



/**
 * atualizar method
 *
 * @return void
 */
	public function atualizar() {
		$this->AdicionarRolesSeNecessario();
		$this->redirect(array('action' => 'index'));
	}

/**
 * AdicionarRolesSeNecessario method
 *
 * @return void
 */
 function AdicionarRolesSeNecessario() {
 	$this->AdicionarRoleSeNaoExistir(1, 'Root');
 	$this->AdicionarRoleSeNaoExistir(2, 'Coordenador');
 	$this->AdicionarRoleSeNaoExistir(3, 'Financeiro');
 	$this->AdicionarRoleSeNaoExistir(4, 'Secretaria');
 	$this->AdicionarRoleSeNaoExistir(5, 'Professor');
 	$this->AdicionarRoleSeNaoExistir(6, 'Aluno');
 	
	$this->Session->setFlash(__('Os cargos foram atualizados.'), 'flash/success');
 }


/**
 * AdicionarRoleSeNaoExistir method
 * @param int $id
 * @param string $nome
 * @return void
 */
 	function AdicionarRoleSeNaoExistir($id, $nome) {
        
        $cadastro=[];
        $cadastro['Role']['id'] = $id;
        $cadastro['Role']['nome'] = $nome;
		
		$this->Role->create();
		$this->Role->save($cadastro);
		
		if (! $this->Role->save($cadastro)) {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), "flash/linked/error", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Role->id
           		)
        	));
			$this->redirect(array('action' => 'index'));
		}
 	}
}
