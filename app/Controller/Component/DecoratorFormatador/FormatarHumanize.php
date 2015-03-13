<?php

App::import('Controller/Component/DecoratorFormatador', 'InterfaceDecoratorFormatador');

class FormatarHumanize implements InterfaceDecoratorFormatador
{
	public function __construct(&$TextoParaFormatar){

        $TextoParaFormatar = Inflector::humanize($TextoParaFormatar);
        
    }

}
?>