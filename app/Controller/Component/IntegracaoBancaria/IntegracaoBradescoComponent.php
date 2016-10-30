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
		$seq = $this->Data[0]['Conta']['seq_remessa'];
		$seq = $this->FormatarNumero($seq, 2);
		return 'CB' . date('d') . date('m') . $seq . '.TST'; //REM
	}
}

?>
