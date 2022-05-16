<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemNaturalidade implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome
                from aluno aluno 
                where aluno.naturalidade_id is null 
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos sem naturalidade';
	}

    public function Correcao($id = null) {
        $sql = 'update aluno 
                set naturalidade_id = 872,
                modified = now()
                where id = ' . $id;
        return $sql;
    }
}
?>