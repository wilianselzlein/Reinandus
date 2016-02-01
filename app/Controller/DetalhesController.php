<?php
App::uses('AppController', 'Controller');
/**
 * Detalhes Controller
 *
 * @property Detalhe $Detalhe
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DetalhesController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Detalhe))));
		$this->Filter->setPaginate('order', array('Detalhe.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Filter->setPaginate('fields', array('Detalhe.id', 'Detalhe.aluno_id', 'Detalhe.foto', 'Detalhe.ocorrencias', 'Detalhe.hist_escolar', 'Detalhe.neg_financeira', 'Detalhe.egresso', 'Detalhe.pessoa_id', 'Detalhe.imagem', 'Aluno.id', 'Aluno.nome'));
		$this->Detalhe->recursive = false;
		$this->set('detalhes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Detalhe->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Detalhe.' . $this->Detalhe->primaryKey => $id), 
			'fields' => array('Detalhe.id', 'Detalhe.aluno_id', 'Detalhe.foto', 'Detalhe.ocorrencias', 'Detalhe.hist_escolar', 'Detalhe.neg_financeira', 'Detalhe.egresso', 'Detalhe.pessoa_id', 'Detalhe.imagem', 'Aluno.id', 'Aluno.nome'));
		$this->set('detalhe', $this->Detalhe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Detalhe->create();
			if ($this->Detalhe->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Detalhe->id
               )
            ));
				$this->redirect(array('action' => 'view', $this->Detalhe->getLastInsertID()));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$alunos = $this->Detalhe->Aluno->findAsCombo();
		$aluno_id = $id;
		$this->set(compact('alunos', 'pessoas', 'aluno_id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Detalhe->id = $id;
		if (!$this->Detalhe->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Detalhe->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Detalhe->id
               )
            ));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Detalhe.' . $this->Detalhe->primaryKey => $id));
			$this->Detalhe->unbindModel(array('belongsTo' => array('Aluno')));
			$this->request->data = $this->Detalhe->find('first', $options);
		}
		$alunos = $this->Detalhe->Aluno->findAsCombo('asc', 'Aluno.id = ' . $this->request->data['Detalhe']['aluno_id']);
		$this->set(compact('alunos', 'pessoas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $aluno_id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Detalhe->id = $id;
		if (!$this->Detalhe->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Detalhe->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'detalhes', 'action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'detalhes', 'action' => 'index'));
	}
}
