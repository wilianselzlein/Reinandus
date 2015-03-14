<?php

App::uses('Component', 'Controller');
App::import('Controller/Component/DecoratorFormatador', 
	array('FormatarEncode', 'FormatarMinusculo', 'FormatarHumanize', 'FormatarRetirar', 'FormatarMaiusculo'));

abstract class ImportadorBaseComponent extends Component {

	var $Class;
	var $Model;
	var $Conexao;
	var $SqlConsulta;
	var $CheckBox;
	var $Dados;
	var $Data;

	abstract public function PassaValores($parametro);
	abstract public function Configurar();

	public function __construct($conexao, $data)
	{
		$this->setConexao($conexao);
		$this->setData($data);
		$this->Configurar();
		$this->Importar();
	}

	private function VerificarImportacaoNecessaria() {
		return (boolean)$this->Data[$this->CheckBox];
	}

	private function setConexao($parametro) {
		$this->Conexao = $parametro;
	}

	private function setData($parametro) {
		$this->Data = $parametro;
	}

	protected function setModel($parametro) {
		$this->Model = $parametro;
		$this->Class = ClassRegistry::init($this->Model);
	}

	protected function setSqlConsulta($parametro) {
		$this->SqlConsulta = $parametro;
	}

	protected function setCheckBox($parametro) {
		$this->CheckBox = $parametro;
	}

	protected function SalvarDados($parametro) {
		//debug($parametro); 
		$this->Class->create();
        $this->Class->save($parametro);
	}

	public function FormatarValorEncode($parametro){
		$enc = new FormatarEncode($parametro);
		return $parametro;
	}
	
	public function Importar () {

		if ($this->VerificarImportacaoNecessaria()) {

			$Consulta = $this->Conexao->ConsultarSQL($this->SqlConsulta);
			while ($registro = ibase_fetch_assoc ($Consulta)) { 
			//while ($row = ibase_fetch_row ($Consulta)) { 
			//while ($row = ibase_fetch_object ($Consulta)) { 
				$this->PassaValores($registro);
			}
			
		}
    }

}

?>


