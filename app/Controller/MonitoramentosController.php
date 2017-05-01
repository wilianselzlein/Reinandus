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
	public $components = array('Paginator', 'Session', 'Monitoramento', 'Funcoes');

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
	    $registros = $this->Monitoramento->RetornarConsulta($data);
	    $this->set('registros', $registros);
	    
	    $model = '';
	    $colunas = '';
	    $controller = '';
	    //debug($registros); die;
	    if (count($registros) > 0) {
			$model = array_keys($registros[0])[0];
			$colunas = array_keys($registros[0][$model]);
			$controller = $this->Funcoes->GetControllerByModel($model);
		}
		$this->set('model', $model);
		$this->set('colunas', $colunas);
		$this->set('controller', $controller);
	}
}