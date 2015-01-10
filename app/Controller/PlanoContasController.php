<?php
App::uses('AppController', 'Controller');
/**
 * PlanoContass Controller
 *
 * @property PlanoContas $PlanoContas
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlanoContasController extends AppController {

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
		$this->redirect(array('controller' => 'relatorios', 'action' => 'index'));
	}

}
