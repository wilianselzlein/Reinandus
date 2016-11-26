<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'RetornoBaseComponent');

class RetornoBradescoComponent extends RetornoBaseComponent {

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

$this->IdsPagos[] = (int) $mensalidade_id;
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

}

?>
