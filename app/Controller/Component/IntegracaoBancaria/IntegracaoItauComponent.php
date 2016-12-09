<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'IntegracaoBaseComponent');

class IntegracaoItauComponent extends IntegracaoBaseComponent {

	public function Cabecalho() {
		$s = '0'; //identificacao do registro
		$s .= '1'; //identificacao do arquivo
		$s .= 'REMESSA';
		$s .= '01'; //codigo do servico 
		$s .= $this->FormatarTexto('COBRANCA', 15);
		$s .= $this->FormatarNumero($this->Data[0]['Conta']['agencia'], 4); //Agencia
		$s .= '00'; //Complemento
		$s .= $this->FormatarNumero($this->Data[0]['Conta']['conta'], 5); //Conta
		$s .= $this->FormatarNumero($this->Data[0]['Conta']['conta_dig'], 5); //Conta Digito
		$s .= $this->FormatarTexto('', 8); //brancos
		$s .= $this->FormatarTexto($this->Empresa['razaosocial'], 30);
		$s .= '341'; //numero do itau
		$s .= $this->FormatarTexto('Banco Itau SA', 15);
		$s .= date('d') . date('m') . date('y'); //data gravacao do arquivo
		$s .= $this->FormatarTexto('', 294); //brancos
		$s .= $this->SequencialDoRegistro();
		$s .= PHP_EOL; 
		return $s;
	}

	public function Mensalidades() {
		$i = 0;
		$s = '';

		for ($i=0; $i < count($this->Data); $i++) { 
		
			$carteira = $this->Data[$i]['Conta']['carteira'];

			$s .= '1';
			$s .= $this->FormatarNumero('02', 2); //CNPJ
			$s .= $this->FormatarCNPJ($this->Empresa['cnpj'], 14); //CNPJ
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['agencia'], 4);
			$s .= $this->FormatarNumero('00', 2); //Zeros
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['conta'], 5);
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['conta_dig'], 1);
			$s .= $this->FormatarTexto('', 4); //Brancos
			$s .= $this->FormatarNumero('0', 4); //Alegacao a ser cancelada
			$s .= $this->FormatarTexto($this->Data[$i]['Mensalidade']['id'], 25); //num controle participante
			$s .= $this->FormatarNumero($this->Data[$i]['Mensalidade']['id'], 8); //Numero do Documento
			$s .= $this->FormatarNumero('0', 4); //Quantidade
			$s .= $this->FormatarNumero('10'. $carteira, 3); //carteira
			$s .= $this->FormatarTexto('', 21); //Brancos
			$s .= $this->FormatarNumero($carteira, 1); //carteira
			$s .= $this->FormatarTexto('01', 2); //Identificação da Ocorrencia
			$s .= $this->FormatarNumero($this->Data[$i]['Mensalidade']['id'], 10); //Numero do Documento
			$s .= $this->FormatarTexto(date('ddmmyy', strtotime($this->Data[$i]['Mensalidade']['vencimento'])), 6);
			$s .= $this->FormatarTexto('01', 2); //Identificação da Ocorrencia - Duplicata
			$s .= $this->FormatarTexto('N', 1); //Aceite
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['dia_emissao'], 2) . date('m') . date('y'); //data emissao
			if ($this->Data[$i]['Responsavel']['Id'] > 0) {//Tipo Inscricao Pagador 01 - CPF 02 - CNPJ 03 - PIS/PASEP 98 - Não tem 99 - Outros X
				$s .= $this->FormatarNumero('02', 2); //CNPJ
				$s .= $this->FormatarCNPJ($this->Data[$i]['Responsavel']['cnpjcpf'], 15); //CNPJ
				$s .= $this->FormatarTexto($this->Data[$i]['Responsavel']['razaosocial'], 30); //Nome do Pagador
				$s .= $this->FormatarTexto('', 9); //Brancos
				$s .= $this->FormatarTexto($this->Data[$i]['Responsavel']['endereco'] . ' ' . $this->Data[$i]['Responsavel']['numero'], 40); //Endereco Pagador
				$s .= $this->FormatarTexto($this->Data[$i]['Responsavel']['bairro'], 12);
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Responsavel']['cep'], 0, 5), 5); //CEP
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Responsavel']['cep'], -3), 3); //Sufixo CEP
				$s .= $this->FormatarTexto($this->Data[$i]['Cidade']['nome'], 15);
				$s .= $this->FormatarTexto($this->Data[$i]['Estado']['sigla'], 2);
				$s .= $this->FormatarTexto('', 30); //Avalista
			} else {
				$s .= $this->FormatarNumero('01', 2); //CPF
				$s .= $this->FormatarCPF($this->Data[$i]['Aluno']['cpf'], 15); //CPF
				$s .= $this->FormatarTexto($this->Data[$i]['Aluno']['nome'], 30); //Nome do Pagador
				$s .= $this->FormatarTexto('', 9); //Brancos
				$s .= $this->FormatarTexto($this->Data[$i]['Aluno']['endereco'] . ' ' . $this->Data[$i]['Aluno']['numero'], 40); //Endereco Pagador
				$s .= $this->FormatarTexto($this->Data[$i]['Aluno']['bairro'], 12);
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Aluno']['cep'], 0, 5), 5); //CEP
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Aluno']['cep'], -3), 3); //Sufixo CEP
				$s .= $this->FormatarTexto($this->Data[$i]['Cidade']['nome'], 15);
				$s .= $this->FormatarTexto($this->Data[$i]['Estado']['sigla'], 2);
				$s .= $this->FormatarTexto('', 30); //Avalista
			}
			$s .= $this->FormatarNumero('', 4);	//brancos
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['dia_desconto'], 2) . date('m') . date('y'); //data de Mora 
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['dia_desconto'], 2); //Prazo de Dias
			$s .= $this->FormatarNumero('', 1);	//brancos
			$s .= $this->SequencialDoRegistro();
			$s .= PHP_EOL;

			$s .= '2';
			$s .= $this->FormatarTexto('2', 1); //2 = multa em % 1 = multa em R$ 0 = sem multa
			$s .= $this->FormatarTexto(date('ddmmyy', strtotime($this->Data[$i]['Mensalidade']['vencimento'])), 6); //data multa
			$s .= $this->FormatarTexto('2', 13); //2% multa
			$s .= $this->FormatarNumero('', 370); //brancos
			$s .= $this->SequencialDoRegistro();
			$s .= PHP_EOL;
		}
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
