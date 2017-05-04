<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class LancamentoContabilUltimos30DiasValorMaior1000 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select LancamentoContabil.id, LancamentoContabil.data, LancamentoContabil.valor, LancamentoContabil.documento
                from lancamento_contabil LancamentoContabil
                where DATEDIFF(curdate(), modified) < 90
                and valor > 1000
                order by valor desc
                limit 200'; //and documento like "%.RET"
        return $sql;

    }

	public function PegarDescricao() {
		return 'Lançamento contabil últimos 60 dias com valor > 1.000,00';
	}

    public function Correcao() {
        $sql = 'update lancamento_contabil set valor = valor / 100
                where DATEDIFF(curdate(), modified) < 90
                and valor > 1000'; //and documento like "%.RET"
        return $sql;
    }
    
}
?>