<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeValorIgualDesconto implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, aluno_id, valor, desconto, vencimento, pagamento
                from mensalidade 
                where valor = desconto';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com valor igual desconto';
	}

    public function Correcao($id = null) {
        $sql = 'update mensalidade 
                set desconto = 0,
                modified = now() 
                where id = ' . $id;
        return $sql;
    }

}
?>