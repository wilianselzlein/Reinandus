<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarMensalidadesComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['aluno_id'] = $this->VerificarAlunoExiste($parametro['MENALUNO']);
		$dados['numero'] = $parametro['MENNUMERO'];
		$dados['vencimento'] = $parametro['MENVENCIMENTO'];
		$dados['conta_id'] = $parametro['MENBANCO'];
		$dados['valor'] = $this->FormatarValorNumerico($parametro['MENVALOR']);
		$dados['pago'] = $this->FormatarValorNumerico($parametro['MENVALORPAGO']);
		$dados['acrescimo'] = $this->FormatarValorNumerico($parametro['MENACRESCIMO']);
		$dados['desconto'] = $this->FormatarValorNumerico($parametro['MENDESCONTO']);
		$dados['pagamento'] = $parametro['MENDATAPAGAMENTO'];
		$dados['formapgto_id'] = $parametro['MENFORMAPGTO'];
		$dados['bolsa'] = $this->FormatarValorNumerico($parametro['MENBOLSA']);
		$dados['liquido'] = $this->FormatarValorNumerico($parametro['MENLIQUIDO']);
		//$dados['tipo_id'] = $parametro['MENTIPO'];
		$dados['documento'] = $parametro['MENDOCUMENTO'];
		$dados['obs'] = $this->FormatarValorEncode($parametro['MENOBS']);

//		$dados['lancamento_valor_id'] = $parametro['MENLCTOCONTABILMENSALIDADE'];
//		$dados['lancamento_desconto_id'] = $parametro['MENLCTOCONTABILDESCONTOS'];
//		$dados['lancamento_juro_id'] = $parametro['MENLCTOCONTABILJUROS'];
//debug($parametro); debug($dados); die;
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Mensalidade');
		$this->setSqlConsulta('Select * from TMensalidade');
		$this->setCheckBox('Mensalidades');
		$this->CarregarArrayDeAlunos();
	}

}

?>
