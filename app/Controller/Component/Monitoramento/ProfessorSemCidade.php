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

    public function Correcao($id = null) {
        $sql = 'update professor
                set cidade_id = 1,
                modified = now()  
                where id = ' . $id; 
        return $sql;
    }

}
?>