<?php

App::uses('Component', 'Controller');
App::uses('CakeTime', 'Utility');
App::import('Controller/Component/ConsultasContratos', 
	array('CarregarConsultasBaseComponent', 'ConsultarCursoComponent', 'ConsultarAlunoComponent', 'ConsultarInstitutoComponent'));

class GeraContratoComponent extends Component {

	private static $pasta = 'contratos/';
	private static $modo_leitura = 'r';
	var $Data;

	public function setData($parametro) {
		$this->Data = $parametro['Contrato'];
    }

	public function Gerar() {
        $filename = self::$pasta . $this->Data['modelo'];
        $fp = fopen($filename, self::$modo_leitura);
        $s = fread($fp,filesize($filename));
        fclose($fp);

        $this->SetarNoContratoCamposBasicosDaTelaDeFiltro($s);

		$Instituto = new ConsultarInstitutoComponent($s, 1, 'instituto');

		if (isset($this->Data['aluno_id'])) {
        	$Aluno = new ConsultarAlunoComponent($s, $this->Data['aluno_id'], 'aluno'); //new ComponentCollection()
	        if ($Aluno->PegarValorCampo('id') > 0) {
				$Curso = new ConsultarCursoComponent($s, $Aluno->PegarValorCampo('curso_id'), 'curso');
				$Cidade = new CarregarConsultasBaseComponent($s, $Aluno->PegarValorCampo('cidade_id'), 'cidade');
				$Estado = new CarregarConsultasBaseComponent($s, $Cidade->PegarValorCampo('estado_id'), 'estado');
			}
		}
		if (isset($this->Data['professor_id'])) {
        	$Professor = new CarregarConsultasBaseComponent($s, $this->Data['professor_id'], 'professor');  //new ComponentCollection()
	
	        if ($Professor->PegarValorCampo('id') > 0) {
	        	$Cidade = new CarregarConsultasBaseComponent($s, $Professor->PegarValorCampo('cidade_id'), 'cidade');
				$Estado = new CarregarConsultasBaseComponent($s, $Cidade->PegarValorCampo('estado_id'), 'estado');
			}
		}
		//$s = utf8_encode($s);
        return $s;
	}

	private function SetarNoContratoCamposBasicosDaTelaDeFiltro(&$contrato) {
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

		$IsSetValor = isset($this->Data['valor']);
		$IsSetQuant = isset($this->Data['quantidade']);
		$IsSetLiqui = isset($this->Data['liquido']);
		$IsSetBolsa = isset($this->Data['bolsa']);
		$IsSetDesco = isset($this->Data['desconto']);
		$IsSetVncto = isset($this->Data['vencimento']);
		$IsSetVlAul = isset($this->Data['valor_aula']);
		$IsSetHoras = isset($this->Data['horas_aula']);
		$IsSetData1 = isset($this->Data['data1']);
		$IsSetData2 = isset($this->Data['data2']);
		$IsSetData3 = isset($this->Data['data3']);

		$this->CorrigirParametrosNumericos();
		
		if (($IsSetValor) && ($IsSetQuant))
		{
			$contrato = str_replace(':total', $this->Data['valor'] * $this->Data['quantidade'], $contrato);
			$contrato = str_replace(':extensototal', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['valor'] * $this->Data['quantidade']), $contrato);
		}
		if ($IsSetValor)
		{
			$contrato = str_replace(':valor', $this->Data['valor'] * 1, $contrato);
			$contrato = str_replace(':extensovalor', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['valor'] * 1), $contrato);
		}
		if ($IsSetQuant)
			$contrato = str_replace(':parcelas', $this->Data['quantidade'], $contrato);
		if ($IsSetLiqui) {
			$contrato = str_replace(':liquido', $this->Data['liquido'] * 1, $contrato);
			$contrato = str_replace(':extensoliquido', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['liquido'] * 1), $contrato);
		}
		if ($IsSetBolsa) {
			$contrato = str_replace(':bolsa', $this->Data['bolsa'] * 1, $contrato);
			$contrato = str_replace(':extensobolsa', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['bolsa'] * 1), $contrato);
		}		
		if ($IsSetDesco) {
			$contrato = str_replace(':desconto', $this->Data['desconto'] * 1, $contrato);
			$contrato = str_replace(':extensodesconto', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['desconto'] * 1), $contrato);
		}
		if ($IsSetVncto)
			$contrato = str_replace(':vctoini', $this->Data['vencimento'], $contrato);
		if ($IsSetVlAul)
		{
			$contrato = str_replace(':valor', $this->Data['valor_aula'] * 1, $contrato);
			$contrato = str_replace(':extensovalor', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['valor_aula'] * 1), $contrato);
		}

		//disciplina
		if ($IsSetHoras) {
			$contrato = str_replace(':ha', $this->Data['horas_aula'], $contrato);
			$contrato = str_replace(':extensoha', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['horas_aula'], false), $contrato);
		}
		if ($IsSetData1)
			$contrato = str_replace(':data1', $this->Data['data1'], $contrato);
		if ($IsSetData2)
			$contrato = str_replace(':data2', $this->Data['data2'], $contrato);
		if ($IsSetData3)
			$contrato = str_replace(':data3', $this->Data['data3'], $contrato);

		$contrato = str_replace(':data', CakeTime::i18nFormat(date('m/d/Y'), '%d de %B de %Y'), $contrato);
	}

	private function CorrigirParametrosNumericos() {
		$this->CorrigirParametroNumerico('valor');
		$this->CorrigirParametroNumerico('quantidade');
		$this->CorrigirParametroNumerico('liquido');
		$this->CorrigirParametroNumerico('bolsa');
		$this->CorrigirParametroNumerico('desconto');
		$this->CorrigirParametroNumerico('valor_aula');
		$this->CorrigirParametroNumerico('horas_aula');
	}

	private function CorrigirParametroNumerico($campo) {
		if (isset($this->Data[$campo])) {
			$this->Data[$campo] = str_replace('.', '', $this->Data[$campo]);
			$this->Data[$campo] = str_replace(',', '.', $this->Data[$campo]);

			if (! is_numeric($this->Data[$campo]))
				$this->Data[$campo] = 0.00;
		}
	}


}

?>
