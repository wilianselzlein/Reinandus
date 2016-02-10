<?php
App::uses('AppController', 'Controller');
/**
 * Permissaos Controller
 *
 * @property Permissao $Permissao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PermissoesController extends AppController {
   public $uses = array('Permissao');
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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Permissao))));
		$this->Filter->setPaginate('order', array('Permissao.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Permissao->recursive = 0;
		$this->set('permissoes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Permissao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Permissao.' . $this->Permissao->primaryKey => $id));
		$this->set('permissao', $this->Permissao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Permissao->create();
			if ($this->Permissao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Permissao->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Permissao->User->findAsCombo();
		$programas = $this->Permissao->Programa->findAsCombo();
		$this->set(compact('users', 'programas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Permissao->id = $id;
		if (!$this->Permissao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Permissao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Permissao->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Permissao.' . $this->Permissao->primaryKey => $id));
			$this->request->data = $this->Permissao->find('first', $options);
		}
		$users = $this->Permissao->User->findAsCombo();
		$programas = $this->Permissao->Programa->findAsCombo();
		$this->set(compact('users', 'programas'));
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
		$this->Permissao->id = $id;
		if (!$this->Permissao->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Permissao->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * adicionar method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function adicionar($user_id = null) {
		//$this->VerificarUsuarioParaPermissao($id);
		$this->IncluirPermissoesNoUsuario($user_id, true);
		$this->Session->setFlash(__('Permissões adicionadas!'), 'flash/error');
		$this->redirect(array('controller' => 'user', 'action' => 'view', $user_id));
	}

/**
 * negar method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function negar($user_id = null) {
		//$this->VerificarUsuarioParaPermissao($id);
		$this->IncluirPermissoesNoUsuario($user_id, false);
		$this->Session->setFlash(__('Permissões negadas!'), 'flash/error');
		$this->redirect(array('controller' => 'user', 'action' => 'view', $user_id));
	}

/**
 * VerificarUsuarioParaPermissao method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	private function VerificarUsuarioParaPermissao($user_id) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Permissao->User->id = $user_id;
		if (!$this->Permissao->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
	}

/**
 * IncluirPermissoesNoUsuario method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @param boolean $permitir
 * @return void
 */
	private function IncluirPermissoesNoUsuario($user_id, $permitir) {
		$incluidas = $this->Permissao->find('list', array('fields' => array('Permissao.programa_id'), 'conditions' => array('Permissao.user_id' => $user_id)));
		if (empty($incluidas)) $incluidas[] = 0;
		$options = array('recursive' => false, 'conditions' => array('NOT' => array('Programa.id' => $incluidas)), 'fields' => 'Programa.id');
		$programas = $this->Permissao->Programa->find('list', $options);

		foreach ($programas as $programa) {
			$dados = [];
			$dados['user_id'] = $user_id;
			$dados['programa_id'] = $programa;
			$dados['add'] = $permitir;
			$dados['delete'] = $permitir;
			$dados['index'] = $permitir;
			$dados['view'] = $permitir;
			$dados['edit'] = $permitir;
			$this->Permissao->create();
			$this->Permissao->save($dados);
		}
		//debug($programas); die;
	}
}