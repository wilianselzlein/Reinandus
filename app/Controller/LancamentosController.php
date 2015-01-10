<?php
App::uses('AppController', 'Controller');
/**
 * Lancamentos Controller
 *
 * @property Lancamento $Lancamento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LancamentosController extends AppController {

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
