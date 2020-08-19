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
			/*
			'Grupo' => array(
				'Grupo' => array(
					(int) 0 => '100',
					(int) 1 => '101'
				)
			),

			'Grupo' => array(
				'Grupo' => ''
			),
			*/
			if ($this->Aviso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", 
					array("link_text" => __('GO_TO'),
						"link_url" => array("action" => "view",	$this->Aviso->id)));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Aviso->User->findAsCombo();
		$tipos = $this->Aviso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'aviso')));
		$cursos = $this->Aviso->Curso->findAsCombo();
		array_shift($cursos);
		$grupos = $this->Aviso->Grupo->findAsCombo();
		array_shift($grupos);
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
			$options = array('recursive' => 1, 'conditions' => array('Aviso.' . $this->Aviso->primaryKey => $id));
			$this->Aviso->unbindModel(array('belongsTo' => array('User', 'Tipo')));
			$this->request->data = $this->Aviso->find('first', $options);
		}
		$users = $this->Aviso->User->findAsCombo();
		$tipos = $this->Aviso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'aviso')));
		$cursos = $this->Aviso->Curso->findAsCombo();
		$grupos = $this->Aviso->Grupo->findAsCombo();
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


/**
 * beforeCopy method
 *
 * @throws Exception
 * @param int $de_id $para_id
 * @return void
 */
   public function beforeCopy($de_id, $para_id) {
        parent::beforeCopy($de_id, $para_id);

		$this->AvisoGrupo->recursive = -1;
		$grupos = $this->AvisoGrupo->find('all', array('conditions' => array('AvisoGrupo.aviso_id' => $de_id)));
		foreach ($grupos as $grupo) {
			$grupo['AvisoGrupo']['aviso_id'] = $para_id;
			unset($grupo['AvisoGrupo']['id']);
			unset($grupo['AvisoGrupo']['created']);
			unset($grupo['AvisoGrupo']['modified']);

			$this->AvisoGrupo->create();
			$this->AvisoGrupo->save($grupo);
		}

		$this->AvisoCurso->recursive = -1;
		$cursos = $this->AvisoCurso->find('all', array('conditions' => array('AvisoCurso.aviso_id' => $de_id)));
		foreach ($cursos as $curso) {
			$curso['AvisoCurso']['aviso_id'] = $para_id;
			unset($curso['AvisoCurso']['id']);
			unset($curso['AvisoCurso']['created']);
			unset($curso['AvisoCurso']['modified']);

			$this->AvisoCurso->create();
			$this->AvisoCurso->save($curso);
		}

    }

	public function addpopup($model, $curso_id=null, $aviso_id=null) {
		if ($model == 'Curso') {
			$this->AvisoCurso->create();
			if ($this->AvisoCurso->save(array('curso_id' => $curso_id, 'aviso_id' => $aviso_id))) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", 
					array("link_text" => __('GO_TO'),
						"link_url" => array("action" => "view",	$aviso_id)));
				//$this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$this->AvisoGrupo->create();
			if ($this->AvisoGrupo->save(array('grupo_id' => $curso_id, 'aviso_id' => $aviso_id))) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", 
					array("link_text" => __('GO_TO'),
						"link_url" => array("action" => "view",	$aviso_id)));
				//$this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

	public function popup($model, $id=null, $filter=null) {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			if (isset($data['Curso'])) {
				$this->AvisoCurso->Curso->create();
				if ($this->AvisoCurso->Curso->save($data)) {
					$this->Session->setFlash(__('Curso salvo'),'default',array('class'=>'success'));
					$this->addpopup($model, $this->AvisoCurso->Curso->getLastInsertID(), $id);
					$this->set('return',true);
				} else {
					$this->Session->setFlash(__('Curso não pode ser salvo.'));
					$this->set('retry',true);
				}
			} else {
				$this->AvisoGrupo->Grupo->create();
				if ($this->AvisoGrupo->Grupo->save($data)) {
					$this->Session->setFlash(__('Grupo salvo'),'default',array('class'=>'success'));
					$this->addpopup($model, $this->AvisoGrupo->Grupo->getLastInsertID(), $id);
					$this->set('return',true);
				} else {
					$this->Session->setFlash(__('Grupo não pode ser salvo.'));
					$this->set('retry',true);
				}
			}
			
		} 
		
		//$this->layout = 'modal';
		//$this->layout = false;
		$this->set('aviso_id',$id);

		if ($model == 'Curso') {
			$options = array('recursive' => 0, 'fields' => array('Curso.id', 'Curso.nome'));
			$this->Aviso->Curso->unbindModel(array('belongsTo' => array('Professor', 'Pessoa', 'Grupo', 'Tipo', 'Periodo')));
			$this->set('registros', $this->Aviso->Curso->find('all', $options));
		} else {
			$options = array('recursive' => 0, 'fields' => array('Grupo.id', 'Grupo.nome'));
			$this->set('registros', $this->Aviso->Grupo->find('all', $options));
		}
		$this->set('model', $model);
		//$this->Aviso->Curso->recursive = -1;
		//$this->set('cursos', $this->Aviso->Curso->Find('all'));
	}

}
