<?php

App::uses('Component', 'Controller');
//App::import('Controller/Component/DecoratorFormatador', 
//	array('FormatarEncode', 'FormatarMinusculo', 'FormatarHumanize', 'FormatarRetirar', 'FormatarMaiusculo'));

class CarregarConsultasBaseComponent extends Component {

    var $Id;
	var $Texto;
	var $Contrato;
	var $Data;

	public function __construct(&$contrato, $id, $model) {
		$this->Contrato = $contrato;
		$this->Id = $id;
		$this->Texto = $model;
		$this->Data = [];
		if ($this->VerificarConsultaNecessaria()) {
			$this->Data = $this->Consultar();
			$this->Data = $this->Data[$this->Model()];
		}
		$this->SubstituirTags();
		$contrato = $this->Contrato;
		//return $this->Data;
	}

	private function VerificarConsultaNecessaria() {
		return (boolean) strpos($this->Contrato, ':' . $this->Texto);
	}

	private function SubstituirTags() {
		//debug($this->Data); die;
		
		foreach ($this->Data as $campo => $valor) {
			$tag = ':' . $this->Texto . '_' . $campo;
			//debug($tag . '=' . $valor);
			$this->Contrato = str_replace($tag, $valor, $this->Contrato);
		}
	}

	protected function Model() {
		return Inflector::camelize($this->Texto);
	}

	public function PegarValorCampo($campo) {
		return $this->Data[$campo];
	}

	protected function Consultar() {
		$Consulta = ClassRegistry::init($this->Model());
		$options = array('recursive' => -1, 'conditions' => array($this->Model() . '.' . $Consulta->primaryKey => $this->Id));
		return $Consulta->find('first', $options);
	}

}

?>


