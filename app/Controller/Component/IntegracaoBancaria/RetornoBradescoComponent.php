<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/IntegracaoBancaria', 'RetornoBaseComponent');

class RetornoBradescoComponent extends RetornoBaseComponent {

	//public function Cabecalho() {

	//}

	public function Mensalidades() {
		$mensalidade_id = subst($this->Linha, 38, 25);
		$mensalidade = $this->ConsultarMensalidade($mensalidade_id);
		$mensalidade['Mensalidade']['pagamento'] = $this->FormatarData(subst($this->Linha, 296, 6));
		$mensalidade['Mensalidade']['acrescimo'] =  $this->FormatarValor(subst($this->Linha, 189, 13)) + $this->FormatarValor(subst($this->Linha, 202, 13)) + $this->FormatarValor(subst($this->Linha, 267, 13));
		$mensalidade['Mensalidade']['desconto'] = $this->FormatarValor(subst($this->Linha, 241, 13));
		$mensalidade['Mensalidade']['pago'] = $this->FormatarValor(subst($this->Linha, 254, 13));

		if ($this->Mensalidade->save($mensalidade)) {
			$this->Mensalidade->RealizarLancamentosContabeis($mensalidade);
		} else {
			$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
		}
	}

	public function Totalizadores() {

	}

}

?>
