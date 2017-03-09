<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'RetornoBaseComponent');

class RetornoItauComponent extends RetornoBaseComponent {

	public function Mensalidades() {
		$mensalidade_id = substr($this->Linha, 38, 24);
		$mensalidade_id = trim($mensalidade_id);

		if ($mensalidade_id == '')
			return;

		$mensalidade = $this->ConsultarMensalidade($mensalidade_id);
		$mensalidade['Mensalidade']['id'] = $mensalidade_id;
		$mensalidade['Mensalidade']['pagamento'] = $this->Pagamento();
		$mensalidade['Mensalidade']['acrescimo'] = $this->FormatarValor(substr($this->Linha, 189, 13)) + $this->FormatarValor(substr($this->Linha, 202, 13)) + $this->FormatarValor(substr($this->Linha, 267, 13));
		$mensalidade['Mensalidade']['desconto'] = $this->FormatarValor(substr($this->Linha, 241, 13));
		$mensalidade['Mensalidade']['pago'] = $this->FormatarValor(substr($this->Linha, 254, 13));
		$mensalidade['Mensalidade']['remessa'] = true;
		$mensalidade['Mensalidade']['formapgto_id'] = $this->FormaPgto_Id;
		$mensalidade['Mensalidade']['documento'] = $this->Arquivo;
		$mensalidade['Mensalidade']['situacao_id'] = self::$SituacaoFechada;

//debug($mensalidade); die;
		/*if ($this->Mensalidade->save($mensalidade)) {
			$this->Mensalidade->RealizarLancamentosContabeis($mensalidade);
			$this->IdsPagos[] = (int) $mensalidade_id;
		} else {
			$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
		}*/
	}

	private function Pagamento() {
		$pagamento = substr($this->Linha, 295, 6); 
		$pagamento = trim($pagamento);
		
		if ($pagamento == '') {
			$pagamento = substr($this->Linha, 108, 6);
			$pagamento = trim($pagamento);
		}
		$pagamento = $this->FormatarData($pagamento);
		return $pagamento;
	} 	

	public function Validar(&$validacoes) {

		$linha = [];
		
		//$linha['linha'] = $this->Linha;
		$linha['id'] = trim(substr($this->Linha, 37, 24));
		$linha['confirmado'] = trim(substr($this->Linha, 108, 2));
		$linha['pagamento'] = $this->Pagamento();
		$linha['acrescimo'] = $this->FormatarValor(substr($this->Linha, 189, 13)) + $this->FormatarValor(substr($this->Linha, 202, 13)) + $this->FormatarValor(substr($this->Linha, 267, 13));
		$linha['desconto'] = $this->FormatarValor(substr($this->Linha, 242, 13)) / 100;
		$linha['pago'] = $this->FormatarValor(substr($this->Linha, 255, 13)) / 100;
		$linha['formapgto_id'] = $this->FormaPgto_Id;
		$linha['documento'] = $this->Arquivo;
		$linha['aluno'] = trim(substr($this->Linha, 324, 30));
		$linha['formapagamento'] = $this->FormaPagamento(substr($this->Linha, 392, 2));

		//debug($linha); die;
		$validacoes[] = $linha;
	}

	private function FormaPagamento($codigo) {
		$retorno = '';
		switch ((string) $codigo) {
			case 'AA': $retorno = 'CAIXA ELETRÔNICO BANCO ITAÚ DISPONÍVEL'; break;
			case 'AC': $retorno = 'PAGAMENTO EM CARTÓRIO AUTOMATIZADO A COMPENSAR'; break;
			case 'AO': $retorno = 'ACERTO ONLINE DISPONÍVEL'; break;
			case 'BC': $retorno = 'BANCOS CORRESPONDENTES DISPONÍVEL'; break;
			case 'BF': $retorno = 'ITAÚ BANKFONE DISPONÍVEL'; break;
			case 'BL': $retorno = 'ITAÚ BANKLINE DISPONÍVEL'; break;
			case 'B0': $retorno = 'OUTROS BANCOS – RECEBIMENTO OFF-LINE A COMPENSAR'; break;
			case 'B1': $retorno = 'OUTROS BANCOS – PELO CÓDIGO DE BARRAS A COMPENSAR'; break;
			case 'B2': $retorno = 'OUTROS BANCOS – PELA LINHA DIGITÁVEL A COMPENSAR'; break;
			case 'B3': $retorno = 'OUTROS BANCOS – PELO AUTO ATENDIMENTO A COMPENSAR'; break;
			case 'B4': $retorno = 'OUTROS BANCOS – RECEBIMENTO EM CASA LOTÉRICA A COMPENSAR'; break;
			case 'B5': $retorno = 'OUTROS BANCOS – CORRESPONDENTE A COMPENSAR'; break;
			case 'B6': $retorno = 'OUTROS BANCOS – TELEFONE A COMPENSAR'; break;
			case 'B7': $retorno = 'OUTROS BANCOS – ARQUIVO ELETRÔNICO (Pagamento Efetuado por meio de troca de arquivos) A COMPENSAR '; break;
			case 'CC': $retorno = 'AGÊNCIA ITAÚ – COM CHEQUE DE OUTRO BANCO ou (CHEQUE ITAÚ)* A COMPENSAR'; break;
			case 'CI': $retorno = 'CORRESPONDENTE ITAÚ DISPONÍVEL'; break;
			case 'CK': $retorno = 'SISPAG – SISTEMA DE CONTAS A PAGAR ITAÚ DISPONÍVEL'; break;
			case 'CP': $retorno = 'AGÊNCIA ITAÚ – POR DÉBITO EM CONTA CORRENTE, CHEQUE ITAÚ* OU DINHEIRO DISPONÍVEL'; break;
			case 'DG': $retorno = 'AGÊNCIA ITAÚ – CAPTURADO EM OFF-LINE DISPONÍVEL'; break;
			case 'LC': $retorno = 'PAGAMENTO EM CARTÓRIO DE PROTESTO COM CHEQUE A COMPENSAR'; break;
			case 'EA': $retorno = 'TERMINAL DE CAIXA DISPONÍVEL'; break;
			case 'Q0': $retorno = 'AGENDAMENTO – PAGAMENTO AGENDADO VIA BANKLINE OU OUTRO CANAL ELETRÔNICO E LIQUIDADO NA DATA INDICADA DISPONÍVEL'; break;
			case 'RA': $retorno = 'DIGITAÇÃO – REALIMENTAÇÃO AUTOMÁTICA DISPONÍVEL'; break;
			case 'ST': $retorno = 'PAGAMENTO VIA SELTEC** DISPONÍVEL'; break;

		}
		return $retorno;
	}

}

?>
