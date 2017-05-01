<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeLancContabilValorDiferente implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select mensalidade.id, mensalidade.vencimento, mensalidade.lancamento_valor_id, mensalidade.valor - mensalidade.desconto as valor, lv.valor, mensalidade.lancamento_desconto_id, mensalidade.desconto, ld.valor
				from mensalidade mensalidade
				join lancamento_contabil lv on mensalidade.lancamento_valor_id = lv.id
				join lancamento_contabil ld on mensalidade.lancamento_desconto_id = ld.id
				where mensalidade.valor - mensalidade.desconto <> lv.valor or mensalidade.desconto <> ld.valor';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com Controladoria valores diferentes';
	}

}
?>