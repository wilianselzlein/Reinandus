<?php

App::import('Controller/Component/DecoratorFormatador', 'InterfaceDecoratorFormatador');

class FormatarMinusculo implements InterfaceDecoratorFormatador
{
	public function __construct(&$TextoParaFormatar){

        $TextoParaFormatar = strtolower($TextoParaFormatar);
        
    }

}
?>