<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeSituacaoPagaMasPagamentoNulo implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, aluno_id, situacao_id, pagamento, pago
                from mensalidade 
                where situacao_id = 86 
                and pagamento is null;';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com situação paga mas pagamento nulo';
	}

    public function Correcao() {
        $sql = 'update mensalidade 
                set situacao_id = 85 
                where situacao_id = 86 
                and pagamento is null;';
        return $sql;
    }

}
?>