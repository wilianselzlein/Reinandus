<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarLancamentoContabilComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['LCTNUMERO'];
		$dados['data'] = $parametro['LCTDATA'];
		$dados['debito_id'] = $parametro['LCTDEBITO'];
		$dados['credito_id'] = $parametro['LCTCREDITO'];
		$dados['historico_padrao_id'] = $parametro['LCTHISTPADRAO'];
		$dados['identificador'] = $this->FormatarValorEncode($parametro['LCTIDENTIFICADORCOMPLEMENTO']);
		$dados['documento'] = $parametro['LCTDOCUMENTO'];
		if (is_null($dados['documento'])) 
			$dados['documento'] = '0';
		$dados['valor'] = $parametro['LCTVALOR'];
		$dados['complemento'] = $this->FormatarValorEncode($parametro['COMPLEMENTO']);
		$dados['numero'] = $parametro['LCTNUMERO'];
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('LancamentoContabil');
		$UltimoCodigoDeLancamentoImportador = $this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select TLctoContabil.*, cast(LCTCOMPLEMENTO as varchar(2000)) as complemento from TLctoContabil where lctnumero >= ' . $UltimoCodigoDeLancamentoImportador . ' order by LctNumero');
		$this->setCheckBox('Lancamentos');
	}

}

?>


