<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoComProblemaNoEmail implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome, aluno.email
                from aluno aluno 
                where aluno.email like "%@%@%"
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos com problema no email';
	}

}
?>