<?php

App::uses('Component', 'Controller');
App::import('Controller', 'Mensalidades');

abstract class RetornoBaseComponent extends Component {

	var $Linha;
	var $Mensalidade;
	var $IdsPagos;

	abstract public function Mensalidades();

	public function __construct($linha) {
		$this->setLinha($linha);
		set_time_limit(0);
		$this->Mensalidade = new MensalidadesController;
		$this->IdsPagos = [];
	}

	public function setLinha($linha) {
		$this->Linha = $linha;
	}

	protected function ConsultarMensalidade($id) {
		$options = array('recursive' >= -1, 
			'conditions' => array('Mensalidade.' . $this->Mensalidade->Mensalidade->primaryKey => $id), 
			'fields' => array('Mensalidade.id', 'Mensalidade.formapgto_id', 'Mensalidade.documento', 'Mensalidade.pagamento', 'Mensalidade.acrescimo', 'Mensalidade.desconto', 'Mensalidade.pago', 'Mensalidade.lancamento_desconto_id', 'Mensalidade.lancamento_valor_id', 'Mensalidade.lancamento_juro_id', 'Mensalidade.remessa', 'Mensalidade.aluno_id', 'Aluno.nome'));
		$this->Mensalidade->Mensalidade->unbindModel(array('belongsTo' => array('Conta', 'Formapgto', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
		return $this->Mensalidade->Mensalidade->find('first', $options);
	}

	protected function FormatarData($data) {
		$dia = substr($data, 0, 2);
		$mes = substr($data, 4, 2);
		$ano = substr($data, 6, 4);
		$time = strtotime($dia . '/' . $mes . '/' . $ano);
		return date('d/m/y', $time);
	}

	protected function FormatarValor($valor) {
		return (float) $valor / 100;
	}

	public function Totalizadores() {
		// $IdsPagos[];	
	}

}

?>
