<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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
		$envio = $data['Cobranca']['envio'];
		$this->set(compact('mensalidades', 'envio'));
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

/**
 * enviar method
 *
 * @return void
 */
	public function enviar($envio) {
		$data = $this->request->data;
		//debug($data);
		foreach ($data as $email) {
			$this->EnviarEmail($email, $envio);
			echo '<br> Email enviado para ' . $email['Cobranca']['aluno'] . ' ' . $envio;
			break;
		}
		die;
	}

/**
 * EnviarEmail method
 *
 * @return void
 */
	public function EnviarEmail($email, $envio) {

		$emails = array('wilianselzlein@gmail.com'); //$email['Cobranca']['email'];

		$Email = new CakeEmail('smtp');
		$Email->emailFormat('html');
		$Email->to($emails);
		$Email->subject('Protocolo');

		$texto = '';
		if ($envio == 0) //vencidas em aberto
			$texto = $this->PegarTextoEmailVencidas($email);
		if ($envio == 1) //nao vencidas
			$texto = $this->PegarTextoEmailAVencer($email);
echo $texto; die;
      $Email->send($texto); 
	}

/**
 * PegarTextoEmailVencidas method
 *
 * @return void
 */
	private function PegarTextoEmailVencidas($email) {
		return 
			'PREZADO(A) ' . $email['Cobranca']['aluno'] . ', ' . '<br>' .
			'Constatamos em nossos registros a ausência de pagamento(s) de mensalidade(s) do curso de Pós-Graduação da FACET.' . '<br>' .
			'Solicitamos, portanto que a V.Sa. compareça na Coordenação da Pós-Graduação, a cargo de negociar prazos e condições de regularização. ' . '<br>' .
			'Nosso horário de atendimento é de segunda a sexta das 13h30 as 19h. ' . '<br>' .
			'Por oportuno, pedimos remeter cópia do comprovante do pagamento porventura efetuado, para que possamos dar baixa em nosso sistema para o e-mail: financeiro@facet.br. ' . '<br>' .
			'Obs. conforme contrato: o atraso em 3 mensalidades cancela automaticamente a sua matrícula.' . '<br>' .
			'O não pagamento implicará no cadastro ao SPC (Serviço de Proteção ao Crédito)' . '<br>' .
			'Por gentileza regularize o quanto antes.' . '<br>' .
			'Vencimento: ' . $email['Cobranca']['vencimento'] . '<br>' .
			'Valor: R$ ' . $email['Cobranca']['valor'] . '<br>';
	}

/**
 * PegarTextoEmailAVencer method
 *
 * @return void
 */
	private function PegarTextoEmailAVencer($email) { 
		return
			'PREZADO(A) ' . $email['Cobranca']['aluno'] . ', ' . '<br>' .
			'Já está disponível no seu portal o novo boleto para pagamento.' . '<br>' . 
			'Vencimento: ' . $email['Cobranca']['vencimento'] . '<br>' .
			'Valor: R$ ' . $email['Cobranca']['valor'] . '<br>';
	}

}

