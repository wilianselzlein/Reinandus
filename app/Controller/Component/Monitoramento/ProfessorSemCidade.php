<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class ProfessorSemCidade implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, nome
                from professor 
                where cidade_id is null 
                order by nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Professor sem cidade';
	}

}
?>