<?php

App::uses('Component', 'Controller');

class ImportadorBaseComponent extends Component {

	var $Model;
	var $Conexao;
	var $SqlConsulta;
	var $CheckBox;

	abstract public function PassaValores($parametro);
	abstract public function Configurar();

	private function setModel($parametro) {
		$this->Model = $parametro;
	}

	private function setConexao($parametro) {
		$this->Conexao = $parametro;
	}

	private function setSqlConsulta($parametro) {
		$this->Consulta = $parametro;
	}

	private function setCheckBox($parametro) {
		$this->CheckBox = $parametro;
	}

	private function VerificarImportacaoNecessaria($parametro) {
		return $parametro[$this->CheckBox];
	}

	public function Importar($conexao, $data) {
		if ($this->VerificarImportacaoNecessaria($data)) {
			exit;
		}
		$this->Configurar();

		$Consulta = $conexao->ConsultarSQL($this->SqlConsulta);

		while ($row = ibase_fetch_object ($Consulta)) { 
			$this->PassaValores($row);
		}
    }

}

?>


