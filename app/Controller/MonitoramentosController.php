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
	public $components = array('Paginator', 'Session', 'Monitoramento');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$consultas = $this->Monitoramento->PegarConsultasDisponiveis();
		$this->set('consultas', $consultas);
	}

/**
 * consultar method
 *
 * @return void
 */
	public function consultar() {
	    $data = $this->request->data;
	    $consulta = $this->Monitoramento->RetornarConsulta($data);
		debug($consulta);
		die;
	}
}