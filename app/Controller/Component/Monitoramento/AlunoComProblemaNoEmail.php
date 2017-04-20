<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoComProblemaNoEmail implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.id, a.nome, a.email
                from aluno a 
                where a.email like "%@%@%"
                order by a.nome';
        return $sql;

    }

}
?>