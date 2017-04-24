<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeValorIgualDesconto implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, aluno_id, valor, desconto
                from mensalidade 
                where valor = desconto';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com valor igual desconto';
	}

}
?>