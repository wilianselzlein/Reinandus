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
		$resumos = [];
		for ($i=0; $i < count($consultas); $i++) { 
			$resumos[$consultas[$i]] = count($this->Monitoramento->RetornarConsulta($i));
		}
		$this->set('resumos', $resumos);
	}

/**
 * consultar method
 *
 * @return void
 */
	public function consultar() {
	    $data = $this->request->data;
		$id = $data['Monitoramento']['consulta'];
		//debug($id); die;
		if ($id == '') {
			die;
		}

	    $registros = $this->Monitoramento->RetornarConsulta($id);
	    $this->set('registros', $registros);
	    
	    $model = '';
	    $colunas = '';
	    $controller = '';
	    if (count($registros) > 0) {
			$model = array_keys($registros[0])[0];

			$colunas = [];
			$cabecalhos = array_keys($registros[0]);
			foreach ($cabecalhos as $coluna) {
				$cabecalho = array_keys($registros[0][$coluna]);
				$colunas[$coluna] = $cabecalho;
			}
			$controller = $this->Funcoes->GetControllerByModel($model);
		}
		$this->set('model', $model);
		$this->set('colunas', $colunas);
		$this->set('controller', $controller);
		$this->set('componente', $id);
	}

/**
 * corrigir method
 *
 * @return void
 */
	public function corrigir($componente, $id = null) {
		$retorno = $this->Monitoramento->Corrigir($componente, $id);
		$this->set('retorno', $retorno);
	}

}