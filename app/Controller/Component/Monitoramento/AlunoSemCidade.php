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

    public function Correcao($id = null) {
        $sql = 'update aluno 
                set cidade_id = 1,
                modified = now()
                where id = ' . $id;
        return $sql;
    }
}
?>