<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'IntegracaoBaseComponent');

class IntegracaoBradescoComponent extends IntegracaoBaseComponent {

	public function Cabecalho() {
		$s = '0'; //identificacao do registro
		$s .= '1'; //identificacao do arquivo
		$s .= 'REMESSA';
		$s .= '01'; //codigo do servico 
		$s .= 'COBRANCA';
		$s .= $this->FormatarTexto($this->Data[0]['Conta']['cedente'], 20);
		$s .= $this->FormatarTexto($this->Empresa['Pessoa']['razaosocial'], 30);
		$s .= '237'; //numero do bradesco
		$s .= $this->FormatarTexto('Bradesco', 15);
		$s .= date('d') . date('m') . date('y'); //data gravacao do arquivo
		$s .= $this->FormatarTexto('', 8); //brancos
		$s .= 'MX'; //identificacao do sistema
		$s .= $this->FormatarNumero($this->Data[0]['Conta']['seq_remessa'], 7);
		$s .= $this->FormatarTexto('', 277); //brancos
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
