<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarParametrosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['PARCOD'];
		$dados['nome'] = $this->FormatarNome($parametro['PARNOME']);
		$dados['valor'] = $this->FormatarValorEncode($parametro['PARVALOR']);
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Parametro');
		$this->setSqlConsulta('Select * from TParametro');
		$this->setCheckBox('Parametros');
	}

	private function FormatarNome($nome){
		$enc = new FormatarEncode($nome);
		$min = new FormatarMinusculo($nome);
		$hum = new FormatarHumanize($nome);
		return $nome;
	}

}

?>


