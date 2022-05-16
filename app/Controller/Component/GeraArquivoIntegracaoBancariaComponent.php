<?php

App::uses('Component', 'Controller');
App::import('Controller/Component/IntegracaoBancaria', 
	array('IntegracaoBaseComponent', 'IntegracaoBradescoComponent', 'IntegracaoItauComponent'));

class GeraArquivoIntegracaoBancariaComponent extends Component {

	//private static $pasta = 'contratos/';
	var $Data;
	var $NomeDoArquivo;

	public function setData($parametro) {
		$this->Data = $parametro;
    }

	public function Gerar() {
		$banco = $this->Data[0]['Conta']['num_banco'];
	    if ($banco == 237)
			$Integracao = new IntegracaoBradescoComponent($this->Data);
		else if ($banco == 341)
			$Integracao = new IntegracaoItauComponent($this->Data);
		else
			throw new NotFoundException(__('Número do banco não configurado no cadastro da conta.'));

		$this->NomeDoArquivo = $Integracao->NomeDoArquivo();
		return $Integracao->GerarArquivo();
	}

	public function Nome() {
		return $this->NomeDoArquivo;
	}

}

?>
