<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CursoDisciplinasController extends AppController {

    //public $uses = array('Curso', 'CursoDisciplina');

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
	public function add($curso_id = null, $layout = 'default') {
		 $this->layout = $layout;
		if ($this->request->is('post')) {
			$this->CursoDisciplina->create();
			$this->request->data['CursoDisciplina']['curso_id'] = $curso_id;
			if ($this->CursoDisciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
				$this->redirect(array('controller' => 'cursos', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$disciplinas = $this->CursoDisciplina->Disciplina->findAsCombo();
		$professores = $this->CursoDisciplina->Professor->findAsCombo();
		$this->set(compact('disciplinas', 'professores', 'curso_id'));
	}

	public function edit($id = null, $layout = 'default') {
		$this->layout = $layout;
        $this->CursoDisciplina->id = $id;
		if (!$this->CursoDisciplina->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$curso_id = $this->request->data;
			$curso_id = $curso_id['CursoDisciplina']['curso_id'];
			if ($this->CursoDisciplina->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->CursoDisciplina->id
               )
            ));
				$this->redirect(array('controller' => 'cursos', 'action' => 'view', $curso_id));
				//$this->redirect(array('controller' => 'cursos', 'action' => 'index')); //TESTE
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('CursoDisciplina.' . $this->CursoDisciplina->primaryKey => $id));
			$this->request->data = $this->CursoDisciplina->find('first', $options);
		}
		$disciplinas = $this->CursoDisciplina->Disciplina->findAsCombo();
		$professores = $this->CursoDisciplina->Professor->findAsCombo();
		$this->set(compact('disciplinas', 'professores'));
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
		$this->CursoDisciplina->id = $id;
		if (!$this->CursoDisciplina->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->CursoDisciplina->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('controller' => 'cursos','action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('controller' => 'cursos', 'action' => 'index'));
	}

}
