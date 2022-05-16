<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoNomeDuplicado implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome from 
                (select min(id) as id, nome
                from aluno
                group by nome
                having count(1) > 1) aluno';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos nome duplicado';
	}

    public function Correcao($id = null) {
        $sql = 'update aluno 
                set nome = concat(nome, "."),
                modified = now()
                where id = ' . $id;
        return $sql;
    }
}
?>