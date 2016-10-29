<?php

App::uses('Component', 'Controller');

abstract class IntegracaoBaseComponent extends Component {

	var $Data;

	abstract public function Cabecalho();
	abstract public function Mensalidades();
	abstract public function Totalizadores();

	public function __construct($data) {
		$this->setData($data);
		set_time_limit(0);
	}

	public function setData($parametro) {
		$this->Data = $parametro;
	}

	public function FormatarValorNumerico($parametro){
		return str_replace('.', ',', $parametro);
	}

	public function GerarArquivo() {
		$s = $this->Cabecalho() . $this->Mensalidades() . $this->Totalizadores();
		$s = utf8_encode($s);
		return $s;
	}

}

?>


