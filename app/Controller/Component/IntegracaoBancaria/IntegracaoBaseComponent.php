<?php

App::uses('Component', 'Controller');

abstract class IntegracaoBaseComponent extends Component {

	var $Data;

	abstract public function Cabecalho();
	abstract public function Mensalidades();
	abstract public function Totalizadores();
	abstract public function NomeDoArquivo();

	public function __construct($data) {
		$this->setData($data);
		set_time_limit(0);
	}

	public function setData($parametro) {
		$this->Data = $parametro;
	}

	public function FormatarNumero($numero, $tamanho){
		$numero = str_replace('.', '', $numero);
		$numero = str_replace(',', '', $numero);
		$numero = str_pad($numero, $tamanho, '0', STR_PAD_LEFT);
		return $numero;
	}

	public function FormatarTexto($texto, $tamanho){
		$texto = str_pad($texto, $tamanho, ' ', STR_PAD_RIGHT);
		$texto = strtoupper($texto);
		return $texto;
	}

	public function GerarArquivo() {
		$s = $this->Cabecalho() . $this->Mensalidades() . $this->Totalizadores();
		$s = utf8_encode($s);
		return $s;
	}

}

?>
