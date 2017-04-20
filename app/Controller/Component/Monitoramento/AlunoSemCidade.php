<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemCidade implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.id, a.nome
                from aluno a 
                where a.cidade_id is null 
                order by a.nome';
        return $sql;

    }

}
?>