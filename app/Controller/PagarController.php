<?php
App::uses('AppController', 'Controller');
/**
 * Pagars Controller
 *
 * @property Pagar $Pagar
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PagarController extends AppController {

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
