<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoComProblemaNoEmailAlt implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome, aluno.emailalt
                from aluno aluno
                where aluno.emailalt like "%@%@%"
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos com problema no email alternativo';
	}

}
?>