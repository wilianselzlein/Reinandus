<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeSituacaoAbertaMasPagamentoNaoNulo implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, aluno_id, situacao_id, pagamento, pago
                from mensalidade 
                where situacao_id = 85 
                and pagamento is not null;';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com situação aberta mas pagamento não nulo';
	}

    public function Correcao() {
        $sql = 'update mensalidade 
                set situacao_id = 86,
                modified = now()
                where situacao_id = 85 
                and pagamento is not null;';
        return $sql;
    }

}
?>