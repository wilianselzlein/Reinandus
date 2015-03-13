<?php

App::import('Controller/Component/DecoratorFormatador', 'InterfaceDecoratorFormatador');

class FormatarEncode implements InterfaceDecoratorFormatador
{
	public function __construct(&$TextoParaFormatar){

        $TextoParaFormatar = utf8_encode($TextoParaFormatar);

    }

}
?>