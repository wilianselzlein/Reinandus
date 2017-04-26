<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoComProblemaNoCPF implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.id, a.nome, a.email
                from aluno a 
                where a.cpf like "%..%"
                order by a.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos com problema no CPF';
	}

}
?>