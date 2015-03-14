<?php

App::import('Controller/Component/DecoratorFormatador', 'InterfaceDecoratorFormatador');

class FormatarMaiusculo implements InterfaceDecoratorFormatador
{
	public function __construct(&$TextoParaFormatar){

        $TextoParaFormatar = strtoupper($TextoParaFormatar);
        
    }

}
?>