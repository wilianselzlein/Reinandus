<?php

App::uses('Component', 'Controller');

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
		$this->Class->create();
        $this->Class->save($parametro);
		debug($parametro); 
	}
	
	public function Importar($conexao, $data) {

		if ($this->VerificarImportacaoNecessaria($data)) {
			exit;
		}

		$Consulta = $conexao->ConsultarSQL($this->SqlConsulta);
		while ($registro = ibase_fetch_assoc ($Consulta)) { 
		//while ($row = ibase_fetch_row ($Consulta)) { 
		//while ($row = ibase_fetch_object ($Consulta)) { 
			$this->PassaValores($registro);
		}
    }

}

?>


