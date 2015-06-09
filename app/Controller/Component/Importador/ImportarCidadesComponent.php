<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarCidadesComponent extends ImportadorBaseComponent {

	var $Estados;

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['CIDCOD'];
		$dados['estado_id'] = array_search($this->Formatar($parametro['CIDUF']), $this->Estados);
		if ($dados['estado_id'] == false)
			$dados['estado_id'] = 1;
		$dados['cep'] = $this->FormatarValorEncode($parametro['CIDCEP']);
		$dados['nome'] = $this->FormatarValorEncode($parametro['CIDNOME']);

		$this->SalvarDados($dados);
	}

	private function Formatar($nome){
		$enc = new FormatarEncode($nome);
		$min = new FormatarMaiusculo($nome);
		$hum = new FormatarHumanize($nome);
		return $nome;
	}

	public function Configurar() {
		$this->setModel('Cidade');
		$UltimoCodigoDeLancamentoImportador = 0;// $this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select * from TCidade where CidCod >= ' . $UltimoCodigoDeLancamentoImportador . ' order by CidCod');
		$this->setCheckBox('Cidades');

		$Estado = ClassRegistry::init('Estado');
		$this->Estados = $Estado->findAsCombo();	
	}

}

?>


