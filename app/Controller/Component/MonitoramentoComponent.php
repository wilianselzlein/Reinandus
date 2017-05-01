<?php

App::uses('Component', 'Controller');

class MonitoramentoComponent extends Component {

var $MONITORAMENTOS = array(
		0 => 'AlunoSemDisciplina', 
		1 => 'AlunoSemCidade',
		2 => 'AlunoComProblemaNoEmail',
		3 => 'AlunoComProblemaNoEmailAlt',
		4 => 'AlunoFreqMaiorQue100',
		5 => 'AlunoComProblemaNoCPF',
		6 => 'NotaMaiorQue100', 
		7 => 'CursoSemDisciplina', 
		8 => 'LancamentoContabilUltimos30DiasValorMaior1000',
		9 => 'MensalidadesValorMaiorQue1000', 
		10 => 'MensalidadeSituacaoPagaMasPagamentoNulo',
		11 => 'MensalidadeSituacaoAbertaMasPagamentoNaoNulo',
		12 => 'MensalidadeValorIgualDesconto',
		13 => 'MensalidadeLancContabilValorDiferente',
		14 => 'MensalidadeComDescontoMaiorQue1000',
		15 => 'MensalidadeSemLancamentoContabil',
		16 => 'RemessaPorPeriodo',
		17 => 'ProfessorSemCidade'
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
