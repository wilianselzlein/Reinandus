<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/ConsultasContratos', 'CarregarConsultasBaseComponent');

class ConsultarInstitutoComponent extends CarregarConsultasBaseComponent {

	protected function SubstituirTags() {
		$cidade = '';

		$Empresa = ClassRegistry::init('Pessoa');
		$options = array('recursive' => 1, 'conditions' => array('Pessoa.' . $Empresa->primaryKey => $this->Data['empresa_id']));
		$consulta = $Empresa->find('first', $options);
		if (isset($consulta['Cidade'])) {
			$cidade = $consulta['Cidade']['nome'];

			$Estado = ClassRegistry::init('Estado');
			$options = array('recursive' => 1, 'conditions' => array('Estado.' . $Estado->primaryKey => $consulta['Cidade']['estado_id']));
			$consulta = $Estado->find('first', $options);

			$cidade .= '/' . $consulta['Estado']['sigla'];
		}
		//debug($cidade); die;
		$this->Contrato = str_replace(':instituto_cidade', $cidade, $this->Contrato);

		parent::SubstituirTags();

	}

}

?>
