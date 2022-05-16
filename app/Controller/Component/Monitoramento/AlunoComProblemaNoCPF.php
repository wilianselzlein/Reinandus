<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoComProblemaNoCPF implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome, aluno.email
                from aluno aluno
                where aluno.cpf like "%..%"
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos com problema no CPF';
	}

}
?>