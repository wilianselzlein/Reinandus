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
		$dados['valor'] = $parametro['MENVALOR'];
		$dados['acrescimo'] = $parametro['MENACRESCIMO'];
		$dados['desconto'] = $parametro['MENDESCONTO'];
		$dados['pagamento'] = $parametro['MENDATAPAGAMENTO'];
		$dados['formapgto_id'] = $parametro['MENFORMAPGTO'];
		$dados['bolsa'] = $parametro['MENBOLSA'];
		$dados['liquido'] = $parametro['MENLIQUIDO'];
		//$dados['tipo_id'] = $parametro['MENTIPO'];
		$dados['documento'] = $parametro['MENDOCUMENTO'];
		$dados['obs'] = $this->FormatarValorEncode($parametro['MENOBS']);
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
