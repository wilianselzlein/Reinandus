<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarAlunosDisciplinasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['aluno_id'] = $this->VerificarAlunoExiste($parametro['ALUDISALUNO']);
		$dados['disciplina_id'] = $parametro['ALUDISDISCIPLINA'];
		$dados['professor_id'] = $parametro['ALUDISPROFESSOR'];
		$dados['frequencia'] = $parametro['ALUDISFREQUENCIA'];
		$dados['nota'] = $parametro['ALUDISNOTA'];
		$dados['horas_aula'] = $parametro['ALUDISHA'];
		$dados['data'] = $parametro['ALUDISDATA'];

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('AlunoDisciplina');
		$this->setSqlConsulta(
			'Select * from TAlunoDisciplina
			join TAluno on AluCod = AluDisAluno
			join TDisciplina on DisCod = AluDisDisciplina
			join TProfessor on ProCod = AluDisProfessor');
		$this->setCheckBox('AlunoDisciplina');
		$this->CarregarArrayDeAlunos();
	}

}

?>


