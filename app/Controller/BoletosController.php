<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'PeDF/Table');

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
	public $components = array('Paginator', 'Session', 'GeraArquivoIntegracaoBancaria', 'RetornoArquivoIntegracaoBancaria');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$contas = $this->Boleto->Conta->findAsCombo('asc', 'num_banco > 0');
		$alunos = $this->Boleto->Aluno->findAsCombo('asc', 'Aluno.id in ' . 
			'(select m.aluno_id 
			from mensalidade m 
			where coalesce(m.pago, 0.00) = 0.00)');
		$this->set(compact('contas', 'alunos'));
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

		header("Content-Type: text/html; charset=ISO-8859-1",true);

        $this->downloadarq($caminho, $arquivo);
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
		//$this->MarcarMensalidadesComoEnviadas($mensalidades);
		$this->IncrementarSequencialDaRemessaNaConta($mensalidades);

		//$this->Session->setFlash(__('Arquivo gerado com sucesso! ' . count($mensalidades) . ' mensalidade(s).'), 
		//	'flash/success');
		//$this->Session->setFlash(__('Arquivo gerado com sucesso! '), 'flash/linked/success',
		//	array('link_text' => __('Arquivo'), 'link_url' => array('/remessa/' . $nome)));
		//$this->redirect(array('action' => 'index'));
	}


/**
 * retorno method
 *
 * @return void
 */
	public function retorno($caminho, $arquivo, $validar, &$validacoes) {
		$nome_arquivo = $arquivo;
		$arquivo = $caminho . $arquivo;
		$arquivo = fopen($arquivo, "r") or die('PERMISSAO_ARQ');
		$validacoes = [];
		while(!feof($arquivo)) {
 			$linha = fgets($arquivo);
 			$this->RetornoArquivoIntegracaoBancaria->setLinha($linha);
			
			switch (substr($linha, 0, 1)) {
				case 0:
					$this->RetornoArquivoIntegracaoBancaria->Cabecalho();
					$this->RetornoArquivoIntegracaoBancaria->SetArquivo($nome_arquivo);
					break;
				case 1:
					if ($validar)
						$this->RetornoArquivoIntegracaoBancaria->Validar($validacoes);
					else
						$this->RetornoArquivoIntegracaoBancaria->Mensalidade();
					break;
				case 3:
					$this->RetornoArquivoIntegracaoBancaria->Rateio();
					break;
				case 9:
					$this->RetornoArquivoIntegracaoBancaria->Totalizadores();
					break;
			}
		}
		fclose($arquivo);
		if (! $validar)
			$this->Session->setFlash(__('Mensalidades baixadas ou liberadas para pagamento, utilize o filtro do arquivo: ' . $nome_arquivo . ' para gerar o relatório.'), 'flash/success');
	}

/**
 * processar method
 *
 * @return void
 */
	public function processar($validar = false) {
		$validar = (bool) $validar;

		if ($this->request->is('post') || $this->request->is('put')) {

/*
	'Boleto' => array(
		'retorno' => array(
			'name' => 'test.php',
			'type' => 'text/php',
			'tmp_name' => '/Applications/XAMPP/xamppfiles/temp/phpxvajou',
			'error' => (int) 0,
			'size' => (int) 3005
*/
			$caminho = 'retorno/';
			$data = $this->request->data;
			$tmp = $data['Boleto']['retorno']['tmp_name'];
			$arquivo = basename($data['Boleto']['retorno']['name']);

			if (! move_uploaded_file($tmp, $caminho . $arquivo))
				throw new Exception(__('PERMISSAO_ARQ'));

	        if (! file_exists($caminho . $arquivo))
	            throw new Exception(__('PERMISSAO_ARQ'));

			$validacoes = '';
			$this->retorno($caminho, $arquivo, $validar, $validacoes);

			if ($validar)
				$this->set(compact('validacoes'));
			else
				$this->redirect(array('controller' => 'relatorios', 'action' => 'filter', 29));
		}
	}

/**
 * ConsultaMenslidades method
 * input array
 * @return array
 */

	private function ConsultarMensalidades($data) {
		$this->Boleto->Mensalidade->unbindModel(array('belongsTo' => array('Formapgto', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));

		$mensalidades = $this->Boleto->Mensalidade->find('all', array('recursive' => 0, 
			'conditions' =>	$this->CondicoesParaConsultarMensalidade($data),
			'joins' => $this->JoinsParaConsultarMensalidade(),
			'fields' => $this->FieldsParaConsultarMensalidade(),
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

/**
 * MarcarMensalidadesComoEnviadas method
 * input array
 * @return void
 */
	private function MarcarMensalidadesComoEnviadas($data) {
		if (count($data) == 0)
			return;

		$table = new Table();
		$ids = $table->array_column($data, 'Mensalidade');
		$ids = $table->array_column($ids, 'id');

		sort($ids);
		if (empty($ids)) $ids[] = 0;

		$this->Boleto->Mensalidade->unbindModel(array('belongsTo' => array('Conta', 'Aluno', 'Situacao', 'Formapgto', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));

		$this->Boleto->Mensalidade->updateAll(
    		array('Mensalidade.remessa' => true),
			array('Mensalidade.id >= ' => min($ids), 'Mensalidade.id <= ' => max($ids), 
				'AND' => array('Mensalidade.id' => $ids)));
	}

/**
 * CondicoesParaConsultarMensalidade method
 * input array
 * @return array
 */
	private function CondicoesParaConsultarMensalidade($data) {

		$ENVIAR_TODAS = 2;
		$envio = $data['Boleto']['envio'];
		if ($envio == $ENVIAR_TODAS) 
			$envio = array(0 , 1);

		$conditions = [];
		$conditions['Mensalidade.vencimento >= '] =  $data['Boleto']['vencimento_inicial'];
		$conditions['Mensalidade.vencimento <= '] =  $data['Boleto']['vencimento_final'];
		$conditions['COALESCE(Mensalidade.pago,0)'] = 0.00;
		$conditions['Mensalidade.conta_id'] = $data['Boleto']['conta_id'];
		$conditions['Mensalidade.remessa'] = $envio;
		$aluno_id = $data['Boleto']['aluno_id'];
		if ($aluno_id > 0)
			$conditions['Mensalidade.aluno_id'] = $aluno_id;

		return $conditions;
	}

/**
 * JoinsParaConsultarMensalidade method
 * input void
 * @return array
 */
	private function JoinsParaConsultarMensalidade() {
		return array(
			array('table' => 'pessoa', 'alias' => 'Responsavel', 'type' => 'LEFT','conditions' => array('Mensalidade.pessoa_id = Responsavel.id')),
			array('table' => 'cidade', 'alias' => 'Cidade', 'type' => 'LEFT','conditions' => array('coalesce(Aluno.cidade_id, Responsavel.cidade_id, 1) = Cidade.id')),
			array('table' => 'estado', 'alias' => 'Estado', 'type' => 'LEFT','conditions' => array('Cidade.estado_id = Estado.id')));
	}

/**
 * FieldsParaConsultarMensalidade method
 * input void
 * @return array
 */
	private function FieldsParaConsultarMensalidade() {
		return
			array('Mensalidade.id', 'Mensalidade.vencimento', 'Mensalidade.valor', 'Mensalidade.desconto',
					'Aluno.id', 'Aluno.nome', 'Aluno.cpf', 'Aluno.endereco', 'Aluno.bairro', 'Aluno.cep', 'Aluno.complemento', 'Aluno.numero', 'Cidade.nome', 'Estado.sigla',
					'Responsavel.Id', 'Responsavel.razaosocial', 'Responsavel.cnpjcpf', 'Responsavel.endereco', 'Responsavel.bairro', 'Responsavel.cep', 'Responsavel.numero',
					'Conta.id', 'Conta.cedente', 'Conta.cedente_dig', 'Conta.agencia', 'Conta.conta', 'Conta.nome_no_banco', 'Conta.num_banco', 'Conta.agencia_dig', 'Conta.conta_dig', 'Conta.carteira', 'Conta.Mensagem', 'Conta.dia_emissao', 'Conta.seq_remessa', 'Conta.dia_desconto');
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

}

