<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component', 'ImportadorBaseComponent');

class ImportarProgramasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['PROCOD'];
		$dados['nome'] = Inflector::humanize(strtolower(remove acento( $parametro['PRONOME'])));

		criar decoretor mais um

		$dados['is_cadastro'] = True;

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Programa');
		$this->setSqlConsulta('Select * from TPrograma');
		$this->setCheckBox('Programas');
	}

}

?>


