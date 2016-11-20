<?php

App::uses('Component', 'Controller');

abstract class RetornoBaseComponent extends Component {

	var $Linha;

	//abstract public function Cabecalho();
	abstract public function Mensalidades();
	abstract public function Totalizadores();
	
	public function __construct($linha) {
		$this->setLinha($linha);
		set_time_limit(0);
	}

	public function setLinha($linha) {
		$this->Linha = $linha;
	}

}

?>
