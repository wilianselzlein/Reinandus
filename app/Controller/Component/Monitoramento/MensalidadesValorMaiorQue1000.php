<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadesValorMaiorQue1000 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select id, aluno_id, valor, desconto
        		from mensalidade 
        		where valor > 10000 or desconto > 1000';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com valor maior que 1000';
	}

}
?>