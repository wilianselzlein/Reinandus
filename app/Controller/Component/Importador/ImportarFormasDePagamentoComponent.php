<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarFormasDePagamentoComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['FORCOD'];
		$dados['tipo'] = $this->FormatarValorEncode($parametro['FORTIPO']);
		$dados['nome'] = $this->FormatarValorEncode($parametro['FORNOME']);

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Formapgto');
		$this->setSqlConsulta('Select * from TFormaPgto');
		$this->setCheckBox('FormasDePagamento');
	}

}

?>


