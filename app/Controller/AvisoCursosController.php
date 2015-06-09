<?php
App::uses('AppController', 'Controller');
/**
 * Avisos Controller
 *
 * @property Aviso $Aviso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AvisoCursosController extends AppController {

    public $uses = array('Aviso', 'AvisoCurso');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


/**
 * add method
 *
 * @return void
 */
	public function add($aviso_id = null, $layout = 'default') {
      $this->layout = $layout;
      if ($this->request->is('post')) {
			$this->AvisoCurso->create();
			$this->request->data['AvisoCurso']['aviso_id'] = $aviso_id;
			if ($this->AvisoCurso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('controller' => 'avisos', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$cursos = $this->AvisoCurso->Curso->findAsCombo();
		$this->set(compact('cursos'));
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
		$this->AvisoCurso->id = $id;
		if (!$this->AvisoCurso->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->AvisoCurso->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'avisos','action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'avisos', 'action' => 'index'));
	}

}
