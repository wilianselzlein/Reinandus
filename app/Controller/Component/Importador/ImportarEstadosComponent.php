<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarEstadosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['pais'] = 'Brasil';
		$dados['nome'] = $this->FormatarValorEncode($parametro['CIDUF']);
		$dados['sigla'] = $dados['nome'];
		
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Estado');
		$this->setSqlConsulta('Select distinct upper(CidUF) as CIDUF from TCidade where ciduf is not null and ciduf <> \'\'');
		$this->setCheckBox('Estados');
	}

}

?>


