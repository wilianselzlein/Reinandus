<?php
App::uses('AppController', 'Controller');
/**
 * Avisos Controller
 *
 * @property Aviso $Aviso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AvisoGruposController extends AppController {

    public $uses = array('Aviso', 'AvisoGrupo');

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
	public function add($aviso_id = null) {
		if ($this->request->is('post')) {
			$this->AvisoGrupo->create();
			$this->request->data['AvisoGrupo']['aviso_id'] = $aviso_id;
			if ($this->AvisoGrupo->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('controller' => 'avisos', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$grupos = $this->AvisoGrupo->Grupo->find('list');
		$this->set(compact('grupos'));
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
		$this->AvisoGrupo->id = $id;
		if (!$this->AvisoGrupo->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->AvisoGrupo->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'avisos','action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'avisos', 'action' => 'index'));
	}

}
