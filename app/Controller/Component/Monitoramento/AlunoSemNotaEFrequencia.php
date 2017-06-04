<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemNotaEFrequencia implements InterfaceMonitoramento
{
	public function PegarSql(){
//aluno_disciplina.id, disciplina.nome, professor.nome, 
        $sql = 'select distinct aluno.id, aluno.nome, curso.nome, situacao.valor
                from aluno
                join enumerado situacao on aluno.situacao_id = situacao.id
                join curso curso on curso.id = aluno.curso_id
                join aluno_disciplinas aluno_disciplina on aluno.id = aluno_disciplina.aluno_id
                join disciplina disciplina on disciplina.id = aluno_disciplina.disciplina_id
                join professor professor on professor.id = aluno_disciplina.professor_id
                where coalesce(aluno_disciplina.frequencia,0) = 0
                and coalesce(aluno_disciplina.nota,0) = 0
                order by aluno.nome, disciplina.nome, professor.nome';
        return $sql;

    }

    public function PegarDescricao() {
        return 'Alunos sem nota e frequência';
    }

}
?>