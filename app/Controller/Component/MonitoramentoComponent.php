<?php

App::uses('Component', 'Controller');

class MonitoramentoComponent extends Component {

var $MONITORAMENTOS = array(
		0 => 'AlunoSemDisciplina',
		1 => 'AlunoSemProfessorDisciplina', 
		2 => 'AlunoSemCidade',
		3 => 'AlunoComProblemaNoEmail',
		4 => 'AlunoComProblemaNoEmailAlt',
		5 => 'AlunoFreqMaiorQue100',
		6 => 'AlunoComProblemaNoCPF',
		7 => 'NotaMaiorQue100', 
		8 => 'CursoSemDisciplina', 
		9 => 'LancamentoContabilUltimos30DiasValorMaior1000',
		10 => 'LancamentoContabilSemMensalidade',
		11 => 'MensalidadesValorMaiorQue1000', 
		12 => 'MensalidadeSituacaoPagaMasPagamentoNulo',
		13 => 'MensalidadeSituacaoPagaMasValorPagoZero',
		14 => 'MensalidadeSituacaoAbertaMasPagamentoNaoNulo',
		15 => 'MensalidadeValorIgualDesconto',
		16 => 'MensalidadeLancContabilValorDiferente',
		17 => 'MensalidadeLancContabilDescontoDiferente',
		18 => 'MensalidadeComDescontoMaiorQue1000',
		19 => 'MensalidadeSemLancamentoContabil',
		20 => 'ProfessorSemCidade'
		//21 => 'RemessaPorPeriodo'
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
		$consulta = $this->MONITORAMENTOS[$id];
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
		$consulta = $this->MONITORAMENTOS[$componente];
		$consulta = new $consulta();
		$sql = $consulta->Correcao($id);
		if ($sql != '') {
			$db = ConnectionManager::getDataSource('default');
			$sql = $db->fetchAll($sql);
		}
	}

}

?>
