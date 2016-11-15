<?php
App::uses('AppController', 'Controller');

/**
 * Boletos Controller
 *
 * @property Boleto $Boleto
 * @property SessionComponent $Session
 */
 
class BoletosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session', 'GeraArquivoIntegracaoBancaria');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$contas = $this->Boleto->Conta->findAsCombo('asc', 'num_banco > 0');
		$this->set(compact('contas', ''));
	}

/**
 * remessa method
 *
 * @return void
 */
	public function remessa($remessa, $arquivo) {

        $caminho = 'remessa/';

        if (file_exists($caminho . $arquivo))
            unlink($caminho . $arquivo);

		//chmod($caminho, 0777);

        $fp = fopen($caminho . $arquivo, 'w+');
        if (! $fp) { //if (!is_writable($tempfile)) {
            throw new Exception(__('PERMISSAO_ARQ'));
        }
        $escreve = fwrite($fp, $remessa);
        fclose($fp);

        $this->download($caminho, $arquivo);
	}

/**
 * gerar method
 *
 * @return void
 */
	public function gerar() {
		$data = $this->request->data;
		//debug($data); die;

		if (! isset($data['Boleto']))
			$this->redirect(array('action' => 'index'));

		$mensalidades = $this->ConsultarMensalidades($data);

		if (count($mensalidades) == 0) {
			$this->Session->setFlash(
				__('Nenhuma mensalidade para o período informado.'), 'flash/error');
			$this->redirect(array('action' => 'index'));
		}

		$this->GeraArquivoIntegracaoBancaria->setData($mensalidades);
		$remessa = $this->GeraArquivoIntegracaoBancaria->gerar();
		$nome = $this->GeraArquivoIntegracaoBancaria->nome();
		$this->remessa($remessa, $nome);
		$this->IncrementarSequencialDaRemessaNaConta($mensalidades);

		$this->Session->setFlash(__('Arquivo gerado com sucesso! ' . count($mensalidades) . ' mensalidade(s).'), 
			'flash/success');
		$this->redirect(array('action' => 'index'));
	}


/**
 * retorno method
 *
 * @return void
 */
	public function retorno() {
		/*$data = $this->request->data;
		if (! isset($data['Nota']))
			$this->redirect(array('action' => 'index'));
		$data = $data['Nota'];
		//$professor = $data['professor_id'];
		$cursos = $data['Curso'];
		$disciplinas = $data['Disciplina'];

		$ativos_id = 7;

		$notas = $this->Nota->AlunoDisciplina->find('all', array('recursive' => false, 'conditions' =>
			array('Aluno.curso_id' => $cursos, 'AlunoDisciplina.disciplina_id' => $disciplinas, 'Aluno.situacao_id' => $ativos_id),
			'fields' => array('AlunoDisciplina.id', 'AlunoDisciplina.aluno_id', 'AlunoDisciplina.disciplina_id', 'AlunoDisciplina.professor_id', 'AlunoDisciplina.frequencia', 
				'AlunoDisciplina.nota', 'AlunoDisciplina.horas_aula', 'AlunoDisciplina.data', 'Aluno.id', 'Aluno.nome', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'),
				'order' => array('Aluno.Nome')));
		if (count($notas) == 0) {
			$this->Session->setFlash(
				__('Nenhum aluno ativo para a(s) disciplina(s) e curso(s) selecionado(s).'), 'flash/error');
			$this->redirect(array('action' => 'index'));
		}
		$professores = $this->Nota->Professor->findAsCombo();
		$this->set(compact('notas', 'professores', 'cursos', 'disciplinas')); //'professor',*/
	}

/**
 * processar method
 *
 * @return void
 */
	public function processar() {
		if ($this->request->is('post') || $this->request->is('put')) {

			$data = $this->request->data;
			/*//debug($data); die;
			foreach ($data as $item) {
				//debug($item['AlunoDisciplina']); die;
				$this->Nota->AlunoDisciplina->create();
				$this->Nota->AlunoDisciplina->save($item['AlunoDisciplina']);

				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
			}*/
		} 
		$this->redirect(array('action' => 'index'));
	}

/**
 * ConsultaMenslidades method
 * input array
 * @return array
 */

	private function ConsultarMensalidades($data) {
		$this->Boleto->Mensalidade->unbindModel(array('belongsTo' => array('Formapgto', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));

		$ENVIAR_TODAS = 2;
		$envio = $data['Boleto']['envio'];
		if ($envio == $ENVIAR_TODAS) 
			$envio = array(0 , 1);

		$mensalidades = $this->Boleto->Mensalidade->find('all', array('recursive' => 0, 
			'conditions' =>	array('Mensalidade.vencimento >= ' => $data['Boleto']['vencimento_inicial'], 'Mensalidade.vencimento <= ' => $data['Boleto']['vencimento_final'], 'Mensalidade.pago' => 0.00, 'Mensalidade.conta_id' => $data['Boleto']['conta_id'], 'Mensalidade.remessa' => $envio),
			'joins' => array(array('table' => 'pessoa', 'alias' => 'Responsavel', 'type' => 'LEFT','conditions' => array('Aluno.responsavel_id = Responsavel.id'))),
			'fields' => array('Mensalidade.id', 'Mensalidade.vencimento', 'Mensalidade.valor', 'Mensalidade.desconto',
				'Aluno.id', 'Aluno.nome', 'Aluno.cpf', 'Aluno.endereco', 'Aluno.bairro', 'Aluno.cep', 'Aluno.complemento', 'Aluno.numero',
				'Responsavel.Id', 'Responsavel.razaosocial', 'Responsavel.cnpjcpf', 'Responsavel.endereco', 'Responsavel.bairro', 'Responsavel.cep', 'Responsavel.numero',
				'Conta.id', 'Conta.cedente', 'Conta.cedente_dig', 'Conta.agencia', 'Conta.conta', 'Conta.nome_no_banco', 'Conta.num_banco', 'Conta.agencia_dig', 'Conta.conta_dig', 'Conta.carteira', 'Conta.Mensagem', 'Conta.dia_emissao', 'Conta.seq_remessa', 'Conta.dia_desconto'),
			'order' => array('Mensalidade.Id')));
		return $mensalidades;
	}

/**
 * IncrementarSequencialDaRemessaNaConta method
 * input array
 * @return void
 */
	private function IncrementarSequencialDaRemessaNaConta($data) {

		if (! isset($data[0]['Conta']['id']))
			return;

		$id = $data[0]['Conta']['id'];
		$this->Boleto->Conta->id = $id;

		if (! $this->Boleto->Conta->exists($id)) {
			throw new NotFoundException(__('The record could not be found.') . 
				'Conta Bancária.');
		}

		$seq = $data[0]['Conta']['seq_remessa'] + 1;

		$data = [];	
		$data['Conta']['id'] = $id;
		$data['Conta']['seq_remessa'] = $seq;

		$this->Boleto->Conta->save($data);
	}

}

