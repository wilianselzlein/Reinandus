<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeComDescontoMaiorQue1000 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select mensalidade.id, mensalidade.valor, mensalidade.pago, mensalidade.desconto 
                from mensalidade 
                where desconto > 1000';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com desconto maior que 1000';
	}

    public function Correcao() {
        $sql = 'update mensalidade 
                set desconto = desconto / 100,
                modified = now()
                where desconto > 1000';
        return $sql;
    }

}
?>