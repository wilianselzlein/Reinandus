<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class LancamentoContabilUltimos30DiasValorMaior1000 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, data, valor, documento
                from lancamento_contabil 
                where DATEDIFF(curdate(), modified) < 30
                and valor > 1000
                order by valor desc'; //and documento like "%.RET"
        return $sql;

    }

	public function PegarDescricao() {
		return 'Lançamento contabil últimos 30 dias com valor > 1.000,00';
	}

    public function Correcao() {
        $sql = 'update lancamento_contabil set valor = valor / 100
                where DATEDIFF(curdate(), modified) < 30
                and valor > 1000'; //and documento like "%.RET"
        return $sql;
    }
    
}
?>