<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'IntegracaoBaseComponent');

class IntegracaoBradescoComponent extends IntegracaoBaseComponent {

	public function Cabecalho() {
		$s = '1';
		$s .= $this->SequencialDoRegistro();
		$s .= PHP_EOL; 
		return $s;
	}

	public function Mensalidades() {
		$s = '0';
		$s .= $this->SequencialDoRegistro();
		$s .= PHP_EOL;
		return $s;
	}

	public function Totalizadores() {
		$s = '9';
		$s .= $this->FormatarTexto('', 393);
		$s .= $this->SequencialDoRegistro();
		$s .= PHP_EOL;
		return $s;
	}

	public function NomeDoArquivo() {
		$seq = $this->Data[0]['Conta']['seq_remessa'];
		$seq = $this->FormatarNumero($seq, 2);
		return 'CB' . date('d') . date('m') . $seq . '.TST'; //REM
	}
}

?>
