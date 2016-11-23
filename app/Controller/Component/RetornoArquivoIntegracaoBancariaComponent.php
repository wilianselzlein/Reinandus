<?php
App::import('Controller/Component/IntegracaoBancaria', 
	array('RetornoBaseComponent', 'RetornoBradescoComponent'));

class RetornoArquivoIntegracaoBancariaComponent extends Component {

	var $Linha;
	var $Integracao;

	public function setLinha($parametro) {
		$this->Linha = $parametro;
		if (isset($this->Integracao))
			$this->Integracao->setLinha($parametro);
    }

	public function Cabecalho() {
		$banco = substr($this->Linha, 76, 3);
	    if ($banco == 237)
	    	$this->Integracao = new RetornoBradescoComponent($this->Linha);
	    else
	    	throw new NotFoundException(__('Número do banco não configurado no arquivo de retorno.'));

	    //return $this->Integracao->Cabecalho();
	}

	public function Mensalidade() {
	    return $this->Integracao->Mensalidades();
	}

	public function Rateio() {
	    return;
	}

	public function Totalizadores() {
	    return $this->Integracao->Totalizadores();
	}

}

?>
