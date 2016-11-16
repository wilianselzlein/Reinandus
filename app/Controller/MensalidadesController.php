<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
App::import('Controller/Component/ConsultasContratos', 
	array('CarregarConsultasBaseComponent'));
/**
 * Mensalidades Controller
 *
 * @property Mensalidade $Mensalidade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MensalidadesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Boletos.BoletoBb', 'Boletos.BoletoHsbc', 'Boletos.BoletoBradesco', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index($tipo = null) {
		/*$filtros = array();
		$filtros['OR'] = $this->AdicionarFiltrosLike($this->Mensalidade);
		if ($tipo == 'Recebidas')
			$filtros['AND'] = array('Mensalidade.pagamento' => array('value' => date('Y-m-d')));
		if ($tipo == 'Receber')
			$filtros['AND'] = array('Mensalidade.vencimento' => array('value' => date('Y-m-d')));

		$filtro = array();
		$filtro['filter1'] = $filtros;
		$this->Filter->addFilters($filtro);*/
        $this->Filter->addFilters(
                array('filter1' => array('OR' => array(                           
                        'Aluno.id' => array('operator' => 'LIKE'),
                        'Aluno.nome' => array('operator' => 'LIKE', 'explode'  => false),
                        )
                    )
                )
        );

		$this->Filter->setPaginate('order', array('Mensalidade.id' => 'desc')); 
		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);
		$this->Filter->setPaginate('fields', array('Mensalidade.id', 'Mensalidade.numero', 'Aluno.id', 'Aluno.nome', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento',
           'Formapgto.id', 'Formapgto.nome', 'Situacao.id', 'Situacao.valor'));

		$this->Mensalidade->recursive = 0;
		$this->set('mensalidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id),
			'fields' => array(
/*Mensalidade.id, Mensalidade.numero, Mensalidade.vencimento, Mensalidade.conta_id, Mensalidade.valor, 
Mensalidade.desconto, Mensalidade.acrescimo, Mensalidade.liquido, Mensalidade.pago, Mensalidade.pagamento,
Mensalidade.obs, Mensalidade.formapgto_id, Mensalidade.user_id, Mensalidade.bolsa, Mensalidade.documento, 
Mensalidade.renegociacao, Mensalidade.created, Mensalidade.modified, Mensalidade.aluno_id, */
'Mensalidade.*', 'Conta.id', 'Conta.banco', 'Formapgto.id', 'Formapgto.nome', 'User.id', 'User.username',
'Aluno.id', 'Aluno.nome', 'Situacao.id', 'Situacao.valor'));
		$mensalidade = $this->Mensalidade->find('first', $options);
		$this->set('mensalidade', $mensalidade);

		$options = array('recursive' => 1, 'conditions' => array('LancamentoContabilValor.id' => 
			array($mensalidade['Mensalidade']['lancamento_valor_id'], 
				$mensalidade['Mensalidade']['lancamento_desconto_id'], 
				$mensalidade['Mensalidade']['lancamento_juro_id'])));
		$lancamentos = $this->Mensalidade->LancamentoContabilValor->find('all', $options);
		$lancamentos = $this->TransformarArray->FindInContainable('LancamentoContabilValor', $lancamentos);
		if (isset($lancamentos['LancamentoContabilValor'])) {
			$lancamentos['LancamentoContabil'] = $lancamentos['LancamentoContabilValor'];
			unset($lancamentos['LancamentoContabilValor']);
		}
		$this->set(compact('lancamentos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mensalidade->create();
			$this->request->data['Mensalidade']['situacao_id'] = $this->PegarSituacaoAberto();
			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Mensalidade->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$alunos = $this->Mensalidade->Aluno->findAsCombo();
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		$users = $this->Mensalidade->User->findAsCombo();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Mensalidade->id = $id;
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", 
					array("link_text" => __('GO_TO'), "link_url" => array("action" => "view", $this->Mensalidade->id)));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
			$this->Mensalidade->unbindModel(array('belongsTo' => array('Conta', 'Formapgto', 'User', 'Aluno', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
			$this->request->data = $this->Mensalidade->find('first', $options);
		}
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$alunos = $this->Mensalidade->Aluno->findAsCombo();
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		$users = $this->Mensalidade->User->findAsCombo();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Mensalidade->id = $id;
		if (!$this->Mensalidade->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$this->ExcluirLancamentosContabeis($id);
		if ($this->Mensalidade->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * baixar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function baixar($id = null) {
        $this->Mensalidade->id = $id;
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Mensalidade']['situacao_id'] = $this->PegarSituacaoFechado();
			if ($this->Mensalidade->save($this->request->data)) {
				$mensalidade = $this->request->data;
				setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
				$this->PrepararDadosRecibo($mensalidade);
				$this->RealizarLancamentosContabeis($mensalidade);
				$this->set(compact('mensalidade'));
				
				//$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", 
				//	array("link_text" => __('GO_TO'), "link_url" => 
				//		array("action" => "view", $this->Mensalidade->id)));

				$this->render('recibo');

				//$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id),
				'fields' => array('Mensalidade.*', 'Conta.id', 'Conta.conta', 'Formapgto.id', 'Formapgto.nome', 'User.id', 'User.username', 'Aluno.id', 'Aluno.nome'));
			$this->request->data = $this->Mensalidade->find('first', $options);
		}
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$aluno_id = $this->request->data['Mensalidade']['aluno_id'];
		$alunos = $this->Mensalidade->Aluno->find('list', array('conditions' => array('Aluno.id' => $aluno_id)));
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		$users = $this->Mensalidade->User->findAsCombo();

        $dados = $this->Session->read('Auth');
        $user_id = $dados['User']['id'];

		$formapgto_id = $this->ConsultarFormaPgtoPadrao();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos', 'user_id', 'formapgto_id'));
	}

/**
 * gerar method
 *
 * @throws Exception
 * @return void
 */
	public function gerar($aluno_id = null) {
        if ($this->request->is('post') || $this->request->is('put')) {	
        	$data = $this->request->data;
        	$data = $data['Mensalidade'];
        	if ($aluno_id == null) {
				$aluno_id = $data['aluno_id'];
        	}

        	if (! (bool) $data['selecionou']) {
	        	$ValorMaximo = $this->PegarValorLimite();
	        	if ($data['valor'] > $ValorMaximo) {
	    			throw new Exception(__('Proibido gerar mensalidades maior que R$ ' . $ValorMaximo));
	        	}

	    		$numero = 1;
	        	$quantidade = (float) $data['quantidade'];

	        	while ($numero <= $quantidade) {
	        		$mensalidade = $data;
	    			$mensalidade['numero'] = $numero;
	    			
	    			$vencimento = str_replace("/", "-", $mensalidade['vencimento']);
	    			$vencimento = strtotime($vencimento);
					$vencimento = date("Y-m-d", strtotime("+" . ($numero - 1) . " month", $vencimento));
					$mensalidade['vencimento'] = $vencimento;
					$mensalidade['situacao_id'] = $this->PegarSituacaoAberto();
	                $this->Mensalidade->create();
	                if (! $this->Mensalidade->save($mensalidade)) { 
	                	 debug($mensalidade); debug($this->validationErrors); die();
						//$this->redirect($this->referer());
	            	}
	                $numero++;
	        	}
				$this->redirect(array('action' => 'index'));
			}
		}
		$curso = $this->Mensalidade->Aluno->RetornarDadosCursoFormContrato($aluno_id);
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$alunos = $this->Mensalidade->Aluno->findAsComboCampo('Aluno.id', $aluno_id);
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		$formapgto_id = $this->ConsultarFormaPgtoPadrao();
		$conta_id = $this->ConsultarContaPadrao();
		$users = $this->Mensalidade->User->findAsCombo();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos', 'aluno_id', 'curso', 'formapgto_id', 'conta_id'));
	}

/**
 * PegarValorLimite method
 *
 * @return void
 */
	private function PegarValorLimite() {
	      $parametro = ClassRegistry::init('Parametro');
	      return $parametro->valor(12);
     }

/**
 * DadosBoleto method
 *
 * @return void
 */
    public function DadosBoleto($id) {
    	$dados = array();

		$options = array('recursive' => -1, 'conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
		$mensalidade = $this->Mensalidade->find('first', $options);

		$options = array('recursive' => -1, 'conditions' => array('Conta.' . $this->Mensalidade->Conta->primaryKey => $mensalidade['Mensalidade']['conta_id']));
		$conta = $this->Mensalidade->Conta->find('first', $options);

		$options = array('recursive' => -1, 'conditions' => array('Aluno.' . $this->Mensalidade->Aluno->primaryKey => $mensalidade['Mensalidade']['aluno_id']));
		$aluno = $this->Mensalidade->Aluno->find('first', $options);

		$options = array('recursive' => -1, 'conditions' => array('Cidade.' . $this->Mensalidade->Aluno->Cidade->primaryKey => $aluno['Aluno']['cidade_id']));
		$cidade = $this->Mensalidade->Aluno->Cidade->find('first', $options);

		$options = array('recursive' => -1, 'conditions' => array('Estado.' . $this->Mensalidade->Aluno->Cidade->Estado->primaryKey => $cidade['Cidade']['estado_id']));
		$estado = $this->Mensalidade->Aluno->Cidade->Estado->find('first', $options);

		$Instituto = ClassRegistry::init('Instituto');
		$options = array('recursive' => 1, 'conditions' => array('Instituto.' . $Instituto->primaryKey => 1));
		$instituto = $Instituto->find('first', $options);

		$dados['sacado'] = $aluno['Aluno']['nome'] . ' ' . $aluno['Aluno']['cpf'];
		$dados['endereco1'] = $aluno['Aluno']['endereco'] . ' ' . $aluno['Aluno']['numero'] . ' ' . $aluno['Aluno']['bairro'];
		$dados['endereco2'] = $cidade['Cidade']['nome'] . '/' . $estado['Estado']['sigla'];
		$dados['cpf_cnpj'] = $aluno['Aluno']['cpf'];
		
		$dados['valor_cobrado'] = $mensalidade['Mensalidade']['valor'];
		$dados['pedido'] = $aluno['Aluno']['id']; // Usado para gerar o número do documento e o nosso número.

		/* Seus Dados */
		$dados["identificacao"] = $instituto['Empresa']['fantasia'];
		$dados["cpf_cnpj"] = $instituto['Empresa']['cnpjcpf'];
		$dados["endereco"] = $instituto['Empresa']['endereco'] . ' ' . $instituto['Empresa']['numero'] . ' ' . $instituto['Empresa']['bairro'] . ' ' . ' '  . $instituto['Empresa']['cep'];

		$options = array('recursive' => -1, 'conditions' => array('Cidade.' . $this->Mensalidade->Aluno->Cidade->primaryKey => $instituto['Empresa']['cidade_id']));
		$cidade = $this->Mensalidade->Aluno->Cidade->find('first', $options);

		$dados["cidade_uf"] =  $cidade['Cidade']['nome'];
		$dados["cedente"] = $conta['Conta']['cedente']; //$instituto['Empresa']['fantasia'] . ' ' .$instituto['Empresa']['cnpjcpf'];

		// Informações da sua conta 
		$dados["agencia"] = $conta['Conta']['agencia']; // Num da agencia, sem digito
		$dados["conta"] = $conta['Conta']['conta']; 	// Num da conta, sem digito
		$dados["conta_dv"] = $conta['Conta']['conta_dig']; 	// Num da conta, sem digito

		// Dados do contrato com o Banco
		$dados["convenio"] = $conta['Conta']['cedente'];  // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
		$dados["contrato"] = $conta['Conta']['cedente']; // Num do seu contrato
		$dados["carteira"] = "18";
		//$dados["variacao_carteira"] = "-019";  // Variação da Carteira, com traço (opcional)

		// Tipo do Boleto
		$dados["formatacao_convenio"] = "7"; // REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos
		$dados["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoN�mero de at� 5 dígitos ou 2 para opção de até 17 dígitos

		// Vence em quantos dias? 
		$dados['dias_vencimento'] = date('j', strtotime($mensalidade['Mensalidade']['vencimento']));
		$dados['data_vencimento'] = date('m/d/Y', strtotime($mensalidade['Mensalidade']['vencimento']));

		// Taxa do boleto
		$dados['taxa'] = 0;

		// Informações para o cliente
		$dados["demonstrativo1"] = 'Endereço cedente:' . $instituto['Empresa']['endereco'] . ' Curitiba-PR ' . $instituto['Empresa']['cep'] . ' ' . $instituto['Empresa']['site']  . "<br />";
		$dados["demonstrativo2"] = "<br />";
		$dados["demonstrativo3"] = "";

		// OPCIONAIS
		$dados["quantidade"] = "";
		$dados["valor_unitario"] = "";

		// Instruções ao caixa
		$dados["instrucoes1"] = " CONCEDER DESCONTO DE R$ " . $mensalidade['Mensalidade']['desconto'] . " SE PAGO ATE O VENCIMENTO";
		$dados["instrucoes2"] = " NAO RECEBER APOS O VENCIMENTO";
		$dados["instrucoes3"] = "";
		
		$options = array('recursive' => -1, 'fields' => array('Curso.nome'), 'conditions' => array('Curso.' . $this->Mensalidade->Aluno->Curso->primaryKey => $aluno['Aluno']['curso_id']));
		$curso = $this->Mensalidade->Aluno->Curso->find('first', $options);
		
		$dados["instrucoes4"] = "CURSO: " . $curso['Curso']['nome'];

		// MOEDA 
		$dados["aceite"] = "N";
		$dados["especie"] = "R$";
		$dados["especie_doc"] = "";

		//debug($data); die;
		
		return $dados;
    }

/**
 * boleto method
 * @param int $id
 * @return void
 */
	public function boleto($id = null){
		if (is_null($id)) {
			$this->redirect(array('action' => 'index'));
			return;
		}
		$this->autoRender = false;
		$dados = $this->DadosBoleto($id);
	$this->BoletoBradesco->render($dados);
	}

/**
 * PrepararDadosRecibo method
 * @param array $mensalidade
 * @return &$mensalidade
 */
	private function PrepararDadosRecibo(&$mensalidade) {
		$aluno_id = $mensalidade['Mensalidade']['aluno_id'];
		$aluno = $this->Mensalidade->Aluno->find('list', array('conditions' => array('Aluno.id' => $aluno_id)));
		$mensalidade['Aluno']['nome'] = $aluno[$aluno_id]; 
		$mensalidade['Mensalidade']['extenso'] = CarregarConsultasBaseComponent::ValorPorExtenso($mensalidade['Mensalidade']['liquido']);

		$mensalidade['Mensalidade']['liquido'] = $this->CorrigirParametroNumerico($mensalidade['Mensalidade']['liquido']);
		$mensalidade['Mensalidade']['valor'] = $this->CorrigirParametroNumerico($mensalidade['Mensalidade']['valor']);
		$mensalidade['Mensalidade']['desconto'] = $this->CorrigirParametroNumerico($mensalidade['Mensalidade']['desconto']);
		$mensalidade['Mensalidade']['pago'] = $this->CorrigirParametroNumerico($mensalidade['Mensalidade']['pago']);
		$mensalidade['Mensalidade']['acrescimo'] = $this->CorrigirParametroNumerico($mensalidade['Mensalidade']['acrescimo']);

		$usuario = $this->Session->read('Auth');
		$mensalidade['User']['assinatura'] = $usuario['User']['assinatura'];
		$mensalidade['Pessoa']['razaosocial'] = $usuario['User']['Pessoa']['razaosocial'];
	    $Cidade = $this->Mensalidade->Aluno->Cidade;
		$Cidade->recursive = false;
		//$cidade = $Cidade->findById($usuario['User']['Pessoa']['cidade_id'], array('Cidade.nome', 'Estado.sigla'));
		//if (count($cidade) == 0)
		$cidade = $this->Mensalidade->Aluno->Cidade->findById(1, array('Cidade.nome', 'Estado.sigla'));
		$mensalidade['Cidade']['nome'] = $cidade['Cidade']['nome'];
		$mensalidade['Estado']['sigla'] = $cidade['Estado']['sigla'];
	}

/**
 * RealizarLancamentosContabeis method
 * @param array $mensalidade
 * @return void
 */
	private function RealizarLancamentosContabeis($mensalidade) {

		$this->LancarContabil($mensalidade, 2, 'lancamento_desconto_id', 'MenDesDeb','MenDesCre','MenDesHis', 'desconto');
		$this->LancarContabil($mensalidade, 1, 'lancamento_valor_id', 'MenValDeb','MenValCre','MenValHis', 'pago');
		$this->LancarContabil($mensalidade, 3, 'lancamento_juro_id', 'MenJurDeb','MenJurCre','MenJurHis', 'acrescimo');
		//die;
	}

/**
 * LancarContabil method
 * @param array $mensalidade, string[field] $campo, $debito, $credito, $historico, $valor
 * @return void
 */
	private function LancarContabil($mensalidade, $inc, $campo, $debito, $credito, $historico, $valor) {
		if ($mensalidade['Mensalidade'][$valor] <= 0) 
			return;

		$this->Mensalidade->Formapgto->recursive = false;
		$forma = $this->Mensalidade->Formapgto->findById($mensalidade['Mensalidade']['formapgto_id'], array('id', $debito, $credito, $historico));

		if ((! isset($forma['Formapgto'])) || (is_null($forma['Formapgto'][$debito])) || (is_null($forma['Formapgto'][$credito])) || (is_null($forma['Formapgto'][$historico])))
			return;

		$id = 0;
		if (isset($mensalidade['Mensalidade'][$campo]))
			$id = $mensalidade['Mensalidade'][$campo];
        if ($id > 0)
        	$lancamento['id'] = $id;
        $lancamento['data'] = $mensalidade['Mensalidade']['pagamento'];
        $lancamento['debito_id'] = $forma['Formapgto'][$debito];
        $lancamento['credito_id'] = $forma['Formapgto'][$credito];
        $lancamento['historico_padrao_id'] = $forma['Formapgto'][$historico];
        $lancamento['documento'] = $mensalidade['Mensalidade']['documento'];
        $lancamento['complemento'] = $mensalidade['Aluno']['nome'] . '-' . $mensalidade['Mensalidade']['aluno_id'];
		$lancamento['valor'] = $mensalidade['Mensalidade'][$valor];

		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');
		$LancamentoContabil->create();
		$LancamentoContabil->save($lancamento);

		if ($id == 0) {
			$relacionamento = [];
			$relacionamento['Mensalidade']['id'] = $mensalidade['Mensalidade']['id'];
			$relacionamento['Mensalidade'][$campo] = $LancamentoContabil->getLastInsertID();
			$this->Mensalidade->save($relacionamento);
		}
	}

/**
 * ExcluirLancamentosContabeis method
 * @param int $id
 * @return void
 */
	private function ExcluirLancamentosContabeis($id) {
		$this->Mensalidade->recursive = false;
		$lancamentos = $this->Mensalidade->findById($id, array('lancamento_desconto_id', 'lancamento_valor_id', 'lancamento_juro_id'));
		
		$LancamentoContabil = ClassRegistry::init('LancamentoContabil');
		foreach ($lancamentos['Mensalidade'] as $lancamento => $lancamento_id) {
			if (! is_null($lancamento_id)) {
				$LancamentoContabil->id = $lancamento_id;
				$LancamentoContabil->delete();
			}
		}
	}

/**
 * ConsultarFormaPgtoPadrao method
 * @param int $id
 * @return void
 */
	private function ConsultarFormaPgtoPadrao() {
		$this->Mensalidade->Formapgto->recursive = -1;
		$formapgto_id = $this->Mensalidade->Formapgto->findByTipo('P');
		if (isset($formapgto_id['Formapgto']))
			$formapgto_id = $formapgto_id['Formapgto']['id'];
		return $formapgto_id;
	}


/**
 * ConsultarContaPadrao method
 * @param int $id
 * @return void
 */
	private function ConsultarContaPadrao() {
		$this->Mensalidade->Conta->recursive = -1;
		$conta_id = $this->Mensalidade->Conta->findByTipo('P');
		if (isset($conta_id['Conta']))
			$conta_id = $conta_id['Conta']['id'];
		return $conta_id;
	}

/**
 * PegarSituacaoAberto method
 * @return int $situacao_id
 */
	private function PegarSituacaoAberto() {
		return 85;
	}

/**
 * PegarSituacaoFechado method
 * @return int $situacao_id
 */
	private function PegarSituacaoFechado() {
		return 86;
	}

/**
 * CorrigirParametroNumerico method
 * @param double $id
 * @return double $valor
 */
	private function CorrigirParametroNumerico($valor) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);

		if (! is_numeric($valor))
			$valor = 0.00;

		return $valor;
	}
}