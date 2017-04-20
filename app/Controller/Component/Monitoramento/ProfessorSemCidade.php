<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class ProfessorSemCidade implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select p.id, p.nome
                from professor p 
                where p.cidade_id is null 
                order by p.nome';
        return $sql;

    }

}
?>