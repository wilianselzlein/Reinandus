<?php
App::uses('AppController', 'Controller');
/**
 * DisciplinaProfessores Controller
 *
 * @property DisciplinaProfessor $DisciplinaProfessor
 */
class DisciplinaProfessoresController extends AppController {


/**
 * Uses
 *
 * @var array
 */
    public $uses = array('DisciplinaProfessor');

/**
 * view method
 *
 * @return void
 */
	public function view($id = null) {
		$professor_id = $this->DisciplinaProfessor->findById($id, array('Professor.id'));
		$professor_id = $professor_id['Professor']['id']; 
		$this->redirect(array('controller' => 'professores', 'action' => 'view', $professor_id));
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit($id = null) {
		$professor_id = $this->DisciplinaProfessor->findById($id, array('Professor.id'));
		$professor_id = $professor_id['Professor']['id'];
		$this->redirect(array('controller' => 'professores', 'action' => 'edit', $professor_id));
	}

}
