<?php
App::uses('AppController', 'Controller');
/**
 * Notas Controller
 *
 * @property Nota $Nota
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NotasController extends AppController {

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
