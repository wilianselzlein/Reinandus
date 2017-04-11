<?php
App::uses('AppController', 'Controller');

/**
 * Monitoramentos Controller
 *
 * @property Monitoramento $Monitoramento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MonitoramentosController extends AppController {

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
		$consultas = [];
		$consultas[1] = 'Mensalidades valor maior que 1000';
		$this->set('consultas', $consultas);
	}


/**
 * consultar method
 *
 * @return void
 */
	public function consultar() {
	    $data = $this->request->data;
		debug($data);
		die;
	}
}