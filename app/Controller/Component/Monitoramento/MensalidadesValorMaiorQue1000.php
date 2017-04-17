<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadesValorMaiorQue1000 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'MensalidadesValorMaiorQue1000';
        return $sql;

    }

}
?>