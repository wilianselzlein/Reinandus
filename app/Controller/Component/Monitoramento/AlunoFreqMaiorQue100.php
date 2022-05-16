<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoFreqMaiorQue100 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome, aluno_disciplina.id, disciplina.nome, professor.nome
                from aluno aluno
                join aluno_disciplinas aluno_disciplina on aluno.id = aluno_disciplina.aluno_id
                join disciplina disciplina on disciplina.id = aluno_disciplina.disciplina_id
                join professor professor on professor.id = aluno_disciplina.professor_id
                where aluno_disciplina.frequencia > 100
                order by aluno.nome, disciplina.nome, professor.nome';
        return $sql;

    }

    public function PegarDescricao() {
        return 'Alunos com frequencia maior que 100';
    }

}
?>