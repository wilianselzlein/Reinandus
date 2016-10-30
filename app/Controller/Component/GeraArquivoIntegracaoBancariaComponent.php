<?php

App::uses('Component', 'Controller');
App::uses('CakeTime', 'Utility');
App::import('Controller/Component/IntegracaoBancaria', 
	array('IntegracaoBaseComponent', 'IntegracaoBradescoComponent'));

class GeraArquivoIntegracaoBancariaComponent extends Component {

	//private static $pasta = 'contratos/';
	var $Data;
	var $NomeDoArquivo;

	public function setData($parametro) {
		$this->Data = $parametro;
    }

	public function Gerar() {
	    if ($this->Data[0]['Conta']['num_banco'] == 237)
	    	$Integracao = new IntegracaoBradescoComponent($this->Data);
	    else
	    	throw new NotFoundException(__('Número do banco não configurado no cadastro da conta.'));

	    $this->$NomeDoArquivo = $Integracao->NomeDoArquivo();
	    return $Integracao->GerarArquivo();
	}

	public function Nome() {
	    return $this->$NomeDoArquivo;
	}

}

?>
