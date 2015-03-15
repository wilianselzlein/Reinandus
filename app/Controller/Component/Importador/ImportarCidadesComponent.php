<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarCidadesComponent extends ImportadorBaseComponent {

	var $Estados;

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['CIDCOD'];
		$dados['estado_id'] = array_search($parametro['CIDUF'], $this->Estados);
		$dados['cep'] = $this->FormatarValorEncode($parametro['CIDCEP']);
		$dados['nome'] = $this->FormatarValorEncode($parametro['CIDNOME']);

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Cidade');
		$UltimoCodigoDeLancamentoImportador = $this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select * from TCidade where CidCod >= ' . $UltimoCodigoDeLancamentoImportador . ' order by CidCod');
		$this->setCheckBox('Cidades');

		$Estado = ClassRegistry::init('Estado');
		$this->Estados = $Estado->find('list');	
	}

}

?>


