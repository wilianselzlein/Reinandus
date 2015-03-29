<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarAvisosCursosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['curso_id'] = $parametro['AVICURCURSO'];
		$dados['aviso_id'] = $parametro['AVICURAVISO'];
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('AvisoCurso');
		$this->setSqlConsulta('Select * from TAvisoCurso');
		$this->setCheckBox('AvisoCurso');
	}

}

?>


