<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/ConsultasContratos', 'CarregarConsultasBaseComponent');

class ConsultarAlunoComponent extends CarregarConsultasBaseComponent {

	protected function SubstituirTags() {

		//evitar problema com o aluno_id
		$this->Contrato = str_replace(':aluno_identidade', $this->Data['identidade'], $this->Contrato);

		parent::SubstituirTags();

	}

}

?>
