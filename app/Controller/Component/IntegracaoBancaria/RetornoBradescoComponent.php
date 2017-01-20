<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'RetornoBaseComponent');

class RetornoBradescoComponent extends RetornoBaseComponent {

	public function Mensalidades() {
		$mensalidade_id = substr($this->Linha, 37, 24);
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
		$pagamento = substr($this->Linha, 296, 6); 
		$pagamento = trim($pagamento);
		
		if ($pagamento == '') {
			$pagamento = substr($this->Linha, 110, 6);
			$pagamento = trim($pagamento);
		}
		$pagamento = $this->FormatarData($pagamento);
		return $pagamento;
	} 	

	public function Validar(&$validacoes) {

		$linha = [];
		
		$linha['linha'] = $this->Linha;
		$linha['id'] = substr($this->Linha, 37, 24);
		$linha['pagamento'] = $this->Pagamento();
		$linha['acrescimo'] = $this->FormatarValor(substr($this->Linha, 189, 13)) + $this->FormatarValor(substr($this->Linha, 202, 13)) + $this->FormatarValor(substr($this->Linha, 267, 13));
		$linha['desconto'] = $this->FormatarValor(substr($this->Linha, 241, 13));
		$linha['pago'] = $this->FormatarValor(substr($this->Linha, 254, 13));
		$linha['formapgto_id'] = $this->FormaPgto_Id;
		$linha['documento'] = $this->Arquivo;
		$linha['retorno'] = substr($this->Linha, 108, 2);
		$linha['motivos'] = $this->MotivosRejeite(substr($this->Linha, 318, 2)) . '|' . $this->MotivosRejeite(substr($this->Linha, 320, 2)) . '|' . $this->MotivosRejeite(substr($this->Linha, 322, 2));
		
		$validacoes[] = $linha;
	}

	private function MotivosRejeite($codigo) {
		$retorno = '';
		switch ($codigo) {
		    case 00: $retorno = 'Retorno zero'; break;
		    case 02: $retorno = 'Código do registro detalhe inválido'; break;
		    case 03: $retorno = 'Código da ocorrência inválida'; break;
	        case 04: $retorno = 'Código de ocorrência não permitida para a carteira'; break;
	        case 05: $retorno = 'Código de ocorrência não numérico'; break;
	        case 07: $retorno = 'Agência/conta/Digito Inválido'; break;
	        case 08: $retorno = 'Nosso número inválido'; break;
	        case 09: $retorno = 'Nosso número duplicado'; break;
	        case 10: $retorno = 'Carteira inválida'; break;
	        case 13: $retorno = 'Identificação da emissão do bloqueto inválida (Novo)'; break;
	        case 16: $retorno = 'Data de vencimento invalida'; break;
	        case 18: $retorno = 'Vencimento fora do prazo de operação'; break;
	        case 20: $retorno = 'Valor do Título inválido'; break;
	        case 21: $retorno = 'Espécie do Título inválida'; break;
	        case 22: $retorno = 'Espécie não permitida para a carteira'; break;
	        case 24: $retorno = 'Data de emissão inválida'; break;
	        case 28: $retorno = 'Código do desconto inválido (Novo)'; break;
	        case 38: $retorno = 'Prazo para protesto inválido'; break;
	        case 44: $retorno = 'Agência Beneficiárionão prevista'; break;
	        case 45: $retorno = 'Nome do pagador não informado (Novo)'; break;
	        case 46: $retorno = 'Tipo/número de inscrição do pagador inválidos (Novo)'; break;
	        case 47: $retorno = 'Endereço do pagador não informado (Novo)'; break;
	        case 48: $retorno = 'CEP Inválido (Novo)'; break;
	        case 50: $retorno = 'CEP irregular Banco Correspondente'; break;
	        case 63: $retorno = 'Entrada para Título já cadastrado'; break;
	        case 65: $retorno = 'Limite excedido (Novo)'; break;
	        case 66: $retorno = 'Número autorização inexistente (Novo)'; break;
	        case 68: $retorno = 'Débito não agendado - erro nos dados de remessa'; break;
	        case 69: $retorno = 'Débito não agendado - Pagador não consta no cadastro de autorizante'; break;
	        case 70: $retorno = 'Débito não agendado - Beneficiário não autorizado pelo Pagador'; break;
	        case 71: $retorno = 'Débito não agendado - Beneficiário não participa do débito Automático'; break;
	        case 72: $retorno = 'Débito não agendado - Código de moeda diferente de R$'; break;
	        case 73: $retorno = 'Débito não agendado - Data de vencimento inválida '; break;
	        case 74: $retorno = 'Débito não agendado - Conforme seu pedido, Título não registrado'; break;
	        case 75: $retorno = 'Débito não agendado – Tipo de número de inscrição do debitado inválido'; break;
		}
		return $retorno;
	}
}

?>
