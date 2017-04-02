<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'PeDF/Table');

/**
 * Cobrancas Controller
 *
 * @property Cobranca $Cobranca
 * @property SessionComponent $Session
 */
 
class CobrancasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$alunos = $this->Cobranca->Aluno->findAsCombo('asc', 'Aluno.id in ' . 
			'(select m.aluno_id 
			from mensalidade m 
			where coalesce(m.pago, 0.00) = 0.00)');
		$this->set(compact('alunos'));
	}

/**
 * consultar method
 *
 * @return void
 */
	public function consultar() {
		$data = $this->request->data;
		$mensalidades = $this->ConsultarMensalidades($data);
		$this->set(compact('mensalidades'));
	}

/**
 * ConsultaMenslidades method
 * input array
 * @return array
 */

	private function ConsultarMensalidades($data) {
		
		$this->Cobranca->Mensalidade->unbindModel(array('belongsTo' => array('Formapgto', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));

		$mensalidades = $this->Cobranca->Mensalidade->find('all', array('recursive' => 0, 
			'conditions' =>	$this->CondicoesParaConsultarMensalidade($data),
			'fields' => $this->FieldsParaConsultarMensalidade(),
			'order' => array('Aluno.nome')));

		return $mensalidades;
	}


/**
 * CondicoesParaConsultarMensalidade method
 * input array
 * @return array
 */
	private function CondicoesParaConsultarMensalidade($data) {

		$envio = $data['Cobranca']['envio'];

		$conditions = [];
		//$conditions['Mensalidade.vencimento >= '] =  $data['Cobranca']['vencimento_inicial'];
		//$conditions['Mensalidade.vencimento <= '] =  $data['Cobranca']['vencimento_final'];
		$conditions['COALESCE(Mensalidade.pago,0)'] = 0.00;
		if ($envio == 0) //vencidas em aberto
			$conditions['Mensalidade.vencimento < '] = date('ymd');
		if ($envio == 1) {//nao vencidas
			$conditions['Mensalidade.vencimento > '] = date('ymd');
			$conditions['Mensalidade.remessa'] = true;
		}
		$aluno_id = $data['Cobranca']['aluno_id'];
		if ($aluno_id > 0)
			$conditions['Mensalidade.aluno_id'] = $aluno_id;

		return $conditions;
	}

/**
 * FieldsParaConsultarMensalidade method
 * input void
 * @return array
 */
	private function FieldsParaConsultarMensalidade() {
		return
			array('Mensalidade.id', 'Mensalidade.vencimento', 'Mensalidade.valor', 'Mensalidade.desconto', 'Aluno.id', 'Aluno.nome', 'Aluno.email', 'Aluno.emailalt');
	}

}
