<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoComProblemaNoEmailAlt implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.id, a.nome, a.emailalt
                from aluno a 
                where a.emailalt like "%@%@%"
                order by a.nome';
        return $sql;

    }

}
?>