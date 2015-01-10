<?php
App::uses('AppController', 'Controller');
/**
 * Relatorios Controller
 *
 * @property Relatorio $Relatorio
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelatoriosController extends AppController {

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
		//$this->Relatorio->recursive = 0;
		//$this->set('relatorios', $this->paginate());
	}

}
