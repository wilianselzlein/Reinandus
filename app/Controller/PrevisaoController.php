<?php
App::uses('AppController', 'Controller');

/**
 * Previsao Controller
 *
 * @property Previsao $Previsao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrevisaoController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Previsao', 'Funcoes');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$consultas = [];
		//$consultas = $this->Previsao->PegarConsultasDisponiveis();
		$this->set('consultas', $consultas);
	}

/**
 * consultar method
 *
 * @return void
 */
	public function consultar() {
	    $data = $this->request->data;
		$id = $data['Previsao']['consulta'];
		//debug($id); die;
		if ($id == '') {
			die;
		}

	    $registros = $this->Previsao->RetornarConsulta($id);
	    $this->set('registros', $registros);
	}

}