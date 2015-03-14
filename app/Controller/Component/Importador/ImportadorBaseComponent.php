<?php

App::uses('Component', 'Controller');
App::import('Controller/Component/DecoratorFormatador', 
	array('FormatarEncode', 'FormatarMinusculo', 'FormatarHumanize', 'FormatarRetirar'));

abstract class ImportadorBaseComponent extends Component {

	var $Class;
	var $Model;
	var $Conexao;
	var $SqlConsulta;
	var $CheckBox;
	var $Dados;

	abstract public function PassaValores($parametro);
	abstract public function Configurar();

	public function __construct()
	{
		$this->Configurar();
	}

	private function VerificarImportacaoNecessaria($parametro) {
		return (boolean)$parametro[$this->CheckBox];
	}

	private function setConexao($parametro) {
		$this->Conexao = $parametro;
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
	
	public function Importar($conexao, $data) {

		if ($this->VerificarImportacaoNecessaria($data)) {

			$Consulta = $conexao->ConsultarSQL($this->SqlConsulta);
			while ($registro = ibase_fetch_assoc ($Consulta)) { 
			//while ($row = ibase_fetch_row ($Consulta)) { 
			//while ($row = ibase_fetch_object ($Consulta)) { 
				$this->PassaValores($registro);
			}
			
		}
    }

}

?>


