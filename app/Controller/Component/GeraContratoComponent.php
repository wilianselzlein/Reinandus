<?php

App::uses('Component', 'Controller');
App::uses('CakeTime', 'Utility');
App::import('Controller/Component/ConsultasContratos', 
	array('CarregarConsultasBaseComponent', 'ConsultarCursoComponent', 'ConsultarInstitutoComponent'));

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

    	try {
    		$Instituto = new ConsultarInstitutoComponent($s, 1, 'instituto');
	        $Aluno = new CarregarConsultasBaseComponent($s, $this->Data['aluno_id'], 'aluno'); //new ComponentCollection()
	        if ($Aluno->PegarValorCampo('id') > 0) {
				$Curso = new ConsultarCursoComponent($s, $Aluno->PegarValorCampo('curso_id'), 'curso');
				$Cidade = new CarregarConsultasBaseComponent($s, $Aluno->PegarValorCampo('cidade_id'), 'cidade');
				$Estado = new CarregarConsultasBaseComponent($s, $Cidade->PegarValorCampo('estado_id'), 'estado');
			}
        } finally {
        	unset($Aluno);
        	unset($Curso);
        	unset($Cidade);
        	unset($Estado);
        	unset($Instituto);
        }

        return $s;
	}

	private function SetarNoContratoCamposBasicosDaTelaDeFiltro(&$contrato) {
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

		$contrato = str_replace(':data', CakeTime::i18nFormat(date('m/d/Y'), '%d de %B de %Y'), $contrato);
		$contrato = str_replace(':total', $this->Data['valor'] * $this->Data['quantidade'], $contrato);
		$contrato = str_replace(':extensototal', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['valor'] * $this->Data['quantidade']), $contrato);
		$contrato = str_replace(':valor', $this->Data['valor'], $contrato);
		$contrato = str_replace(':extensovalor', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['valor']), $contrato);
		$contrato = str_replace(':parcelas', $this->Data['quantidade'], $contrato);
		$contrato = str_replace(':liquido', $this->Data['liquido'], $contrato);
		$contrato = str_replace(':extensoliquido', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['liquido']), $contrato);
		$contrato = str_replace(':bolsa', $this->Data['bolsa'], $contrato);
		$contrato = str_replace(':extensobolsa', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['bolsa']), $contrato);
		$contrato = str_replace(':desconto', $this->Data['desconto'], $contrato);
		$contrato = str_replace(':extensodesconto', CarregarConsultasBaseComponent::ValorPorExtenso($this->Data['desconto']), $contrato);
		$contrato = str_replace(':vctoini', $this->Data['vencimento'], $contrato);

		//formapgto_id":"1","conta_id":"1","obs":"","modelo":"xxxxx.rtf"
	}

}

?>
