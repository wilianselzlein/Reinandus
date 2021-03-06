<?php
App::import('Controller/Component/IntegracaoBancaria', 
	array('RetornoBaseComponent', 'RetornoBradescoComponent', 'RetornoItauComponent'));

class RetornoArquivoIntegracaoBancariaComponent extends Component {

	var $Linha;
	var $Integracao;
	var $Arquivo;

	public function setLinha($parametro) {
		$this->Linha = $parametro;
		if (isset($this->Integracao))
			$this->Integracao->setLinha($parametro);
	}

	public function setArquivo($parametro) {
		$this->Arquivo = $parametro;
		if (isset($this->Integracao))
			$this->Integracao->setArquivo($parametro);
	}

	public function Cabecalho() {
		$banco = substr($this->Linha, 76, 3);

		switch ($banco) {
			case 237: $this->Integracao = new RetornoBradescoComponent($this->Linha); break;
			case 341: $this->Integracao = new RetornoItauComponent($this->Linha); break;
			//default: throw new NotFoundException(__('Número do banco não configurado no arquivo de retorno.')); break;
		}
		//return $this->Integracao->Cabecalho();
	}

	public function Mensalidade() {
	    return $this->Integracao->Mensalidades();
	}

	public function Validar(&$validacoes) {
	    return $this->Integracao->Validar($validacoes);
	}

	public function Rateio() {
	    return;
	}

	public function Totalizadores() {
	    return $this->Integracao->Totalizadores();
	}

}

?>
