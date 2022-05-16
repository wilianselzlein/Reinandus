<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeSituacaoPagaMasValorPagoZero implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, aluno_id, situacao_id, pagamento, valor, desconto, pago
                from mensalidade 
                where situacao_id = 86 
                and (pago is null or pago = 0)
                order by pagamento desc;';
        return $sql;
    }

	public function PegarDescricao() {
		return 'Mensalidade com situação paga mas valor pago zerado';
	}

    public function Correcao($id = null) {
        $sql = 'update mensalidade 
                set pago = valor - desconto,
                modified = now() 
                where id = ' . $id;
        return $sql;
    }

}
?>