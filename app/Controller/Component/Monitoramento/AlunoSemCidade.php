<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemCidade implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome
                from aluno aluno 
                where aluno.cidade_id is null 
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos sem cidade';
	}

}
?>