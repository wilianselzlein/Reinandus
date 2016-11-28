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
	public $components = array('Session', 'GeraArquivoIntegracaoBancaria', 'RetornoArquivoIntegracaoBancaria');

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
//debug($mensalidades); die;
		$this->GeraArquivoIntegracaoBancaria->setData($mensalidades);
		$remessa = $this->GeraArquivoIntegracaoBancaria->gerar();
		$nome = $this->GeraArquivoIntegracaoBancaria->nome();
		$this->remessa($remessa, $nome);
		$this->MarcarMensalidadesComoEnviadas($mensalidades);
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
	public function retorno($caminho, $arquivo) {
		$nome_arquivo = $arquivo;
		$arquivo = $caminho . $arquivo;
		$arquivo = fopen($arquivo, "r") or die('PERMISSAO_ARQ');

		while(!feof($arquivo)) {
 			$linha = fgets($arquivo);
 			$this->RetornoArquivoIntegracaoBancaria->setLinha($linha);
			
			switch (substr($linha, 0, 1)) {
				case 0:
					$this->RetornoArquivoIntegracaoBancaria->Cabecalho();
					$this->RetornoArquivoIntegracaoBancaria->SetArquivo($nome_arquivo);
					break;
				case 1:
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
		$this->Session->setFlash(__('Mensalidades baixadas, utilize o filtro do arquivo: ' . $nome_arquivo . ' para gerar o relatório.'), 'flash/success');
	}

/**
 * processar method
 *
 * @return void
 */
	public function processar() {
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
			
			$this->retorno($caminho, $arquivo);
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

}

