<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadesValorMaiorQue1000 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select * from mensalidade where valor > 10000 or desconto > 1000';
        return $sql;

    }

}
?>