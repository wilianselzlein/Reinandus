<?php

App::uses('Component', 'Controller');

abstract class IntegracaoBaseComponent extends Component {

	var $Data;
	var $Empresa;
	var $Seq;

	abstract public function Cabecalho();
	abstract public function Mensalidades();
	abstract public function Totalizadores();
	abstract public function NomeDoArquivo();

	public function __construct($data) {
		$this->setData($data);
		set_time_limit(0);
		$this->Seq = 0;
		$this->CarregarDadosDaEmpresa();
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

	protected function SequencialDoRegistro() {
		$this->Seq++;
		return $this->FormatarNumero($this->Seq, 6);
	}

	protected function CarregarDadosDaEmpresa() {
		$Consulta = ClassRegistry::init('instituto');
		$options = array('recursive' => $this->Recursive, 'conditions' => 
			array('instituto' . '.' . $Consulta->primaryKey => 1));
		//debug($options);
        $consulta = $Consulta->find('first', $options);

		$Empresa = ClassRegistry::init('Pessoa');
		$options = array('recursive' => 1, 'conditions' => 
			array('Pessoa.' . $Empresa->primaryKey => $consulta['Empresa']['id']));
		$this->Empresa = $Empresa->find('first', $options);
		//$cidade = $consulta['Cidade']['nome'];
	}
}

?>
