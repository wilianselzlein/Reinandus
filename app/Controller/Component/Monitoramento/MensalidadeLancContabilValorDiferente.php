<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeLancContabilValorDiferente implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select m.id, m.vencimento, m.lancamento_valor_id, m.valor - m.desconto as valor, lv.valor, 	m.lancamento_desconto_id, m.desconto, ld.valor
				from mensalidade m
				join lancamento_contabil lv on m.lancamento_valor_id = lv.id
				join lancamento_contabil ld on m.lancamento_desconto_id = ld.id
				where m.valor - m.desconto <> lv.valor or m.desconto <> ld.valor';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com Controladoria valores diferentes';
	}

}
?>