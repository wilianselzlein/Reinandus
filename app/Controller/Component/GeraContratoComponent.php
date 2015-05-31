<?php

App::uses('Component', 'Controller');
App::import('Controller/Component/ConsultasContratos', 
	array('CarregarConsultasBaseComponent'));

class GeraContratoComponent extends Component {

	private static $pasta = 'contratos/';
	private static $modo_leitura = 'r';
	var $Data;

	public function setData($parametro) {
		$this->Data = $parametro['Contrato'];
		//formapgto_id":"1","conta_id":"1","obs":"","valor":"","desconto":""
		//"bolsa":"","liquido":"","quantidade":"","vencimento":"","modelo":"xxxxx.rtf"
    }

	public function Gerar() {
        $filename = self::$pasta . $this->Data['modelo'];
        $fp = fopen($filename, self::$modo_leitura);
        $s = fread($fp,filesize($filename));
        fclose($fp);

    	try {
	        $Aluno = new CarregarConsultasBaseComponent($s, $this->Data['aluno_id'], 'aluno'); //new ComponentCollection()
			$Curso = new CarregarConsultasBaseComponent($s, $Aluno->PegarValorCampo('curso_id'), 'curso');
			$Cidade = new CarregarConsultasBaseComponent($s, $Aluno->PegarValorCampo('cidade_id'), 'cidade');

        } finally {
        	unset($Aluno);
        	unset($Curso);
        	unset($Cidade);
        }

        return $s;
	}

}

?>
