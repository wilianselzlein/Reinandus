<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'IntegracaoBaseComponent');

class IntegracaoBradescoComponent extends IntegracaoBaseComponent {

	public function Cabecalho() {
		return '';
	}

	public function Mensalidades() {
		return '';
	}

	public function Totalizadores() {
		return '';
	}

	public function NomeDoArquivo() {
		$seq = '01';
		return 'CB' . date('d') . date('m') . $seq . '.TST'; //REM
	}
}

?>
