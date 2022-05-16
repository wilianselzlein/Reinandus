<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class RemessaPorPeriodo implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select vencimento, count(1)
                from mensalidade
                where remessa = false
                and month(vencimento) = month(current_date)
                and year(vencimento) = year(current_date)
                group by 1';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Remessa por período';
	}

}
?>