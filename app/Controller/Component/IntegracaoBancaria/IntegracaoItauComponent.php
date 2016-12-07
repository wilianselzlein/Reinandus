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
		$s .= $this->FormatarNumero($this->Data[0]['Conta']['cedente'], 20);
		$s .= $this->FormatarTexto($this->Empresa['razaosocial'], 30);
		$s .= '341'; //numero do itau
		$s .= $this->FormatarTexto('Itau', 15);
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
		$i = 0;
		$s = '';

		for ($i=0; $i < count($this->Data); $i++) { 
		
			$s .= '1';
			$s .= $this->FormatarNumero('', 5); //agencia de debito
			$s .= $this->FormatarTexto('', 1); //digito agencia de debito
			$s .= $this->FormatarNumero('', 5); //razao da conta corrente
			$s .= $this->FormatarNumero('', 7); //conta corrente
			$s .= $this->FormatarTexto('', 1); //digito da conta corrente
			$carteira = $this->Data[$i]['Conta']['carteira'];
			$s .= $this->FormatarNumero('0', 1) . $this->FormatarNumero($carteira, 3) . $this->FormatarNumero($this->Data[$i]['Conta']['agencia'], 5) . $this->FormatarNumero($this->Data[$i]['Conta']['conta'], 7) . $this->FormatarNumero($this->Data[$i]['Conta']['conta_dig'], 1); //identificacao da empresa
			$s .= $this->FormatarTexto($this->Data[$i]['Mensalidade']['id'], 25); //num controle participante
			$s .= $this->FormatarTexto('237', 3); //código do banco
			$s .= $this->FormatarTexto('2', 1); //2 = multa 0 = sem multa
			$s .= $this->FormatarTexto('0200', 4); //2% multa
			$num = $this->FormatarNumero($this->Data[$i]['Mensalidade']['id'], 10);
			$s .= $num . $this->FormatarNumero($this->modulo_11($carteira . $num), 1); //Identificação do Titulo no Banco
			$s .= $this->FormatarNumero('', 1); //digito auto conferencia do numero bancario
			$s .= $this->FormatarNumero('0', 10); //Desconto bonificação Dia
			$s .= $this->FormatarTexto(2, 1); //Emissao do Boleto (1 = Banco) (2 = cliente)
			$s .= $this->FormatarTexto('N', 1); //nao registra e nao emite
			$s .= $this->FormatarTexto('', 10); //brancos
			$s .= $this->FormatarTexto('R', 1); //Indicador Rateio Credito
			$s .= $this->FormatarTexto('', 1); //Enderecamento para aviso do debito
			$s .= $this->FormatarTexto('', 2); //Brancos
			$s .= $this->FormatarTexto('01', 2); //Identificação da Ocorrencia - Remessa
			$s .= $this->FormatarNumero($this->Data[$i]['Mensalidade']['id'], 10); //Numero do Documento
			$s .= $this->FormatarTexto(date('ddmmyy', strtotime($this->Data[$i]['Mensalidade']['vencimento'])), 6); //Vencimento
			$s .= $this->FormatarNumero($this->Data[$i]['Mensalidade']['valor'], 13); //Valor
			$s .= $this->FormatarNumero('0', 3); //Banco Encarregado Cobrança
			$s .= $this->FormatarNumero('0', 5); //Agência Depositária
			$s .= $this->FormatarTexto('01', 2); //Especie de Titulo - Duplicata
			$s .= $this->FormatarTexto('N', 1); //Identificacao Sempre N
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['dia_emissao'], 2) . date('m') . date('y'); //data emissao
			$s .= $this->FormatarNumero('0', 2); //1ª instrução
			$s .= $this->FormatarNumero('0', 2); //2ª instrução
			$s .= $this->FormatarNumero('0', 13); //Mora por Dia de Atraso
			$s .= $this->FormatarNumero($this->Data[$i]['Conta']['dia_desconto'], 2) . date('m') . date('y'); //data limite desconto
			$s .= $this->FormatarNumero($this->Data[$i]['Mensalidade']['desconto'], 13); //Valor descont
			$s .= $this->FormatarNumero('0', 13); //IOF
			$s .= $this->FormatarNumero('0', 13); //Abatimento
			if ($this->Data[$i]['Responsavel']['Id'] > 0) {//Tipo Inscricao Pagador 01 - CPF 02 - CNPJ 03 - PIS/PASEP 98 - Não tem 99 - Outros X
				$s .= $this->FormatarNumero('02', 2); //CNPJ
				$s .= $this->FormatarCNPJ($this->Data[$i]['Responsavel']['cnpjcpf'], 14); //CNPJ
				$s .= $this->FormatarTexto($this->Data[$i]['Responsavel']['razaosocial'], 40); //Nome do Pagador
				$s .= $this->FormatarTexto($this->Data[$i]['Responsavel']['endereco'] . ' ' . $this->Data[$i]['Responsavel']['numero'] . ' ' . $this->Data[$i]['Responsavel']['bairro'] , 40); //Endereco Pagador
				$s .= $this->FormatarTexto('', 12); //1 mensagem
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Responsavel']['cep'], 0, 5), 5); //CEP
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Responsavel']['cep'], -3), 3); //Sufixo CEP
			} else {
				$s .= $this->FormatarNumero('01', 2); //CPF
				$s .= $this->FormatarCPF($this->Data[$i]['Aluno']['cpf'], 14); //CPF
				$s .= $this->FormatarTexto($this->Data[$i]['Aluno']['nome'], 40); //Nome do Pagador
				$s .= $this->FormatarTexto($this->Data[$i]['Aluno']['endereco'] . ' ' . $this->Data[$i]['Aluno']['numero'] . ' ' . $this->Data[$i]['Aluno']['bairro'] , 40); //Endereco Pagador
				$s .= $this->FormatarTexto('', 12); //1 mensagem
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Aluno']['cep'], 0, 5), 5); //CEP
				$s .= $this->FormatarNumero(substr($this->Data[$i]['Aluno']['cep'], -3), 3); //Sufixo CEP
			}
			$s .= $this->FormatarTexto('', 60); //2 mensagem
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
