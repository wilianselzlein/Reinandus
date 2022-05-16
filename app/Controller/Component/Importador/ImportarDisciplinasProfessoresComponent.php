<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarDisciplinasProfessoresComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['disciplina_id'] = $parametro['PRODISDISCIPLINA'];
		$dados['professor_id'] = $parametro['PRODISPROFESSOR'];
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('DisciplinaProfessor');
		$this->setSqlConsulta('Select * from TProfessorDisciplina');
		$this->setCheckBox('DisciplinaProfessor');
	}

}

?>


