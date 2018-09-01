<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoImprimiuComprovante implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select aluno.id, aluno.nome
                from aluno aluno 
                where aluno.imprimiu_comprovante = True
                order by aluno.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Alunos imprimiu comprovante';
	}

    public function Correcao($id = null) {
        $sql = 'update aluno 
                set imprimiu_comprovante = False,
                modified = now()
                where id = ' . $id;
        return $sql;
    }
}
?>