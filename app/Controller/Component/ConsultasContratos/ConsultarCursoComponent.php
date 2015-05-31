<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/ConsultasContratos', 'CarregarConsultasBaseComponent');

class ConsultarCursoComponent extends CarregarConsultasBaseComponent {

	protected function SubstituirTags() {
		
		$extenso = $this->ValorPorExtenso($this->Data['carga'], false, true);
		$this->Contrato = str_replace(':curso_extenso_carga', $extenso, $this->Contrato);
		$extenso = $this->ValorPorExtenso($this->Data['dia_vencimento'], false, true);
		$this->Contrato = str_replace(':curso_extenso_dia_vencimento', $extenso, $this->Contrato);

		parent::SubstituirTags();

	}

}

?>
