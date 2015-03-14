<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarPlanosDeContaComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['PLACODRED'];
		$dados['reduzido'] = $parametro['PLACODRED'];
		$dados['analitico'] = $parametro['PLACODANA'];
		$dados['descricao'] = $this->FormatarValorEncode($parametro['PLADESCRICAO']);
		$dados['nivel'] = $parametro['PLANIVEL'];

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('PlanoConta');
		$this->setSqlConsulta('Select * from TPlanoConta');
		$this->setCheckBox('PlanosDeContas');
	}

}

?>


