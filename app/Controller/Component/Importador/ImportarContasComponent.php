<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarContasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['BANCOD'];
		$dados['banco'] = $this->FormatarValorEncode($parametro['BANNOME']);
		$dados['agencia'] = $this->FormatarValorEncode($parametro['BANAGENCIA']);
		$dados['agencia_dig'] = $parametro['BANAGENCIADIGITO'];
		$dados['conta'] = $this->FormatarValorEncode($parametro['BANCONTA']);
		$dados['conta_dig'] = $parametro['BANCONTADIGITO'];
		$dados['contato'] = $this->FormatarValorEncode($parametro['BANCONTATO']);
		$dados['fone'] = $parametro['BANFONE'];
		$dados['fax'] = $parametro['BANFAX'];
		$dados['celular'] = $parametro['BANCELULAR'];
		$dados['email'] = $this->FormatarValorEncode($parametro['BANEMAIL']);
		$dados['nome_no_banco'] = $this->FormatarValorEncode($parametro['BANNOMENOBANCO']);
		$dados['cedente'] = $parametro['BANCEDENTECODIGO'];
		$dados['cedente_dig'] = $parametro['BANCEDENTEDIGITO'];
		$dados['carteira'] = $parametro['BANCARTEIRA'];
		$dados['dia_emissao'] = $parametro['BANEMISSAO'];
		$dados['dia_multa'] = $parametro['BANDIAMULTA'];
		$dados['dia_desconto'] = $parametro['BANDIADESCONTO'];
		$dados['aceite'] = $parametro['BANACEITE'];
		$dados['formapgto_id'] = $parametro['BANFORMAPGTO'];
		$dados['mensagem'] = $this->FormatarValorEncode($parametro['BANMENSAGEM']);

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Contum');
		$this->setSqlConsulta('Select * from TBanco');
		$this->setCheckBox('ContasBancarias');
	}

}

?>


