<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemProfessorDisciplina implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome
                from aluno aluno
                join aluno_disciplinas aluno_disciplina 
                on aluno.id = aluno_disciplina.aluno_id 
                where aluno_disciplina.professor_id is null 
                or aluno_disciplina.professor_id = 0
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos sem professor na disciplina';
	}

	public function Correcao(){

	}

}
?>