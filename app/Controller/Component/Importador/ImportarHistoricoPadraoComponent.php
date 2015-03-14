<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarHistoricoPadraoComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['HISCOD'];
		$dados['nome'] = $this->FormatarValorEncode($parametro['HISNOME']);
		
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('HistoricoPadrao');
		$this->setSqlConsulta('Select * from THistPadrao');
		$this->setCheckBox('HistoricosPadrao');
	}

}

?>


