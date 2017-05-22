<?php

App::uses('Component', 'Controller');

class PrevisaoComponent extends Component {

var $PREVISOES = array(
		0 => 'PorCurso',
		1 => 'PorSigla', 
		2 => 'PorConta', 
		3 => 'PorFormaPagamento'
	);

/**
 * initialize method
 * input Controller
 * @return array
 */
	function initialize(Controller $controller) {
		foreach ($this->PREVISOES as $previsao)
			App::import('Controller/Component/Previsao', $previsao);
    }

/**
 * PegarConsultasDisponiveis method
 *
 * @return array
 */
	public function PegarConsultasDisponiveis() {
		$consultas = [];
		foreach ($this->PREVISOES as $previsao) {
			$consulta = new $previsao();
			$consultas[] = $consulta->PegarDescricao();
		}
		return $consultas;
	}

/**
 * RetornarConsulta method
 * input integer
 * @return array
 */
	public function RetornarConsulta($id) {
		$consulta = $this->PREVISOES[$id];
		$consulta = new $consulta();
		$sql = $consulta->PegarSql();
		$db = ConnectionManager::getDataSource('default');
		$sql = $db->fetchAll($sql);
		return $sql;
	}

/**
 * Corrigir method
 * input integer
 * input integer 
 */
	public function Corrigir($componente, $id = null) {
		$consulta = $this->PREVISOES[$componente];
		$consulta = new $consulta();
		$sql = $consulta->Correcao($id);
		if ($sql != '') {
			$db = ConnectionManager::getDataSource('default');
			$sql = $db->fetchAll($sql);
		}
	}

}

?>
