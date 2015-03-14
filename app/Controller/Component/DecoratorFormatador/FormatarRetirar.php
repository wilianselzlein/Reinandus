<?php

App::import('Controller/Component/DecoratorFormatador', 'InterfaceDecoratorFormatador');

class FormatarRetirar implements InterfaceDecoratorFormatador
{
	var $TextoParaFormatar;

	public function __construct(&$TextoParaFormatar){

		$this->TextoParaFormatar = $TextoParaFormatar;
		
    }

    public function Retirar($TextoParaRetirar){
		$this->TextoParaFormatar = str_replace($TextoParaRetirar, '', $this->TextoParaFormatar);
		return $this->TextoParaFormatar;

    }

}
?>