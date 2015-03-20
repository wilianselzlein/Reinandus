<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarCursosDisciplinasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['curso_id'] = $parametro['CURDISCURSO'];
		$dados['disciplina_id'] = $parametro['CURDISDISCIPLINA'];
		$dados['professor_id'] = $parametro['CURDISPROFESSOR'];
		$dados['horas_aula'] = $parametro['CURDISHORASAULA'];
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('CursoDisciplina');
		$this->setSqlConsulta('Select * from TCursoDisciplina');
		$this->setCheckBox('CursoDisciplina');
	}

}

?>


