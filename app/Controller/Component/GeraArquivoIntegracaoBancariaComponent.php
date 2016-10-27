<?php

App::uses('Component', 'Controller');
App::uses('CakeTime', 'Utility');
//App::import('Controller/Component/ConsultasContratos', 
//	array('CarregarConsultasBaseComponent', 'ConsultarCursoComponent', 'ConsultarAlunoComponent', 'ConsultarInstitutoComponent'));

class GeraArquivoIntegracaoBancariaComponent extends Component {

	//private static $pasta = 'contratos/';
	var $Data;

	public function setData($parametro) {
		$this->Data = $parametro;
    }

	public function Gerar() {
	    $s = '';

	    $s .= $this->Cabecalho();
	    $s .= $this->Mensalidades();
	    $s .= $this->Totalizadores();
		
		$s = utf8_encode($s);
		
        return $s;
	}

}

?>
