<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemDisciplina implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome
                from aluno aluno
                left join aluno_disciplinas d on aluno.id = d.aluno_id 
                where d.aluno_id is null  
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos sem disciplina';
	}

}
?>