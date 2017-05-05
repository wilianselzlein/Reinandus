<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeLancContabilValorDiferente implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select mensalidade.id, mensalidade.vencimento, mensalidade.lancamento_valor_id, mensalidade.valor - mensalidade.desconto as valor, lv.valor as Lancamento_Valor
				from mensalidade mensalidade
				join lancamento_contabil lv on mensalidade.lancamento_valor_id = lv.id
				where mensalidade.valor - mensalidade.desconto <> lv.valor';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com Controladoria valores diferentes';
	}

}
?>