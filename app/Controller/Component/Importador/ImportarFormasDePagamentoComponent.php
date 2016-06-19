<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarFormasDePagamentoComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['FORCOD'];
		$dados['tipo'] = $this->FormatarValorEncode($parametro['FORTIPO']);
		$dados['nome'] = $this->FormatarValorEncode($parametro['FORNOME']);

		$dados['MenValDeb'] = $parametro['FORCONTAVALORDEBITO'];
		$dados['MenValCre'] = $parametro['FORCONTAVALORCREDITO'];
		$dados['MenValHis'] = $parametro['FORHISTPADRAOVALOR'];
		
		$dados['MenDesDeb'] = $parametro['FORCONTADESCONTODEBITO'];
		$dados['MenDesCre'] = $parametro['FORCONTADESCONTOCREDITO'];
		$dados['MenDesHis'] = $parametro['FORHISTPADRAODESCONTO'];
		
		$dados['MenJurDeb'] = $parametro['FORCONTAJURODEBITO'];
		$dados['MenJurCre'] = $parametro['FORCONTAJUROCREDITO'];
		$dados['MenJurHis'] = $parametro['FORHISTPADRAOJURO'];

		$dados['PagValDeb'] = $parametro['FORCONTAVALORDEBITOCTP'];
		$dados['PagValCre'] = $parametro['FORCONTAVALORCREDITOCTP'];
		$dados['PagValHis'] = $parametro['FORHISTPADRAOVALORCTP'];
		
		$dados['PagDesDeb'] = $parametro['FORCONTADESCONTODEBITOCTP'];
		$dados['PagDesCre'] = $parametro['FORCONTADESCONTOCREDITOCTP'];
		$dados['PagDesHis'] = $parametro['FORHISTPADRAODESCONTOCTP'];

		$dados['PagJurDeb'] = $parametro['FORCONTAJUROCREDITOCTP'];
		$dados['PagJurCre'] = $parametro['FORCONTAJURODEBITOCTP'];
		$dados['PagJurHis'] = $parametro['FORHISTPADRAOJUROCTP'];

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Formapgto');
		$this->setSqlConsulta('Select * from TFormaPgto');
		$this->setCheckBox('FormasDePagamento');
	}

}

?>
