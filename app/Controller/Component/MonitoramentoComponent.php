<?php

App::uses('Component', 'Controller');

class MonitoramentoComponent extends Component {

var $MONITORAMENTOS = array(
		0 => 'MensalidadesValorMaiorQue1000', 
		1 => 'AlunoSemDisciplina', 
		2 => 'CursoSemDisciplina', 
		3 => 'AlunoFreqMaiorQue100',
		4 => 'NotaMaiorQue100', 
		5 => 'AlunoSemCidade',
		6 => 'AlunoComProblemaNoEmail',
		7 => 'AlunoComProblemaNoEmailAlt'
	);

/**
 * initialize method
 * input Controller
 * @return array
 */
	function initialize(Controller $controller) {
		foreach ($this->MONITORAMENTOS as $monitoramento)
			App::import('Controller/Component/Monitoramento', $monitoramento);
    }

/**
 * PegarConsultasDisponiveis method
 *
 * @return array
 */
	public function PegarConsultasDisponiveis() {
		$consultas = [];
		foreach ($this->MONITORAMENTOS as $monitoramento) {
			$consulta = new $monitoramento();
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
	    $id = $id['Monitoramento']['consulta'];
	    $consulta = $this->MONITORAMENTOS[$id];
	    $consulta = new $consulta();
		$sql = $consulta->PegarSql();
		$db = ConnectionManager::getDataSource('default');
        $sql = $db->fetchAll($sql);
        return $sql;
	}

}

?>
