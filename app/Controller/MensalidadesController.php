<?php
App::uses('AppController', 'Controller');
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
	public $components = array('Paginator', 'Session', 'Boletos.BoletoBb', 'Boletos.BoletoHsbc');

/**
 * index method
 *
 * @return void
 */
	public function index($tipo = null) {
		$filtros = array();
		$filtros['OR'] = $this->AdicionarFiltrosLike($this->Mensalidade);
		if ($tipo == 'Recebidas')
			$filtros['AND'] = array('Mensalidade.pagamento' => array('value' => date('Y-m-d')));
		if ($tipo == 'Receber')
			$filtros['AND'] = array('Mensalidade.vencimento' => array('value' => date('Y-m-d')));

		$filtro = array();
		$filtro['filter1'] = $filtros;
		$this->Filter->addFilters($filtro);

		$this->Filter->setPaginate('order', array('Mensalidade.id' => 'desc')); 
		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);

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
		$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
		$this->set('mensalidade', $this->Mensalidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mensalidade->create();
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
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo();
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
		} else {
			$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
			$this->Mensalidade->unbindModel(array('belongsTo' => array('Conta', 'Formapgto', 'User', 'Aluno')));
			$this->request->data = $this->Mensalidade->find('first', $options);
		}
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$alunos = $this->Mensalidade->Aluno->findAsCombo();
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo();
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
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
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
		} else {
			$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
			$this->request->data = $this->Mensalidade->find('first', $options);
		}
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$alunos = $this->Mensalidade->Aluno->findAsCombo();
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo();
		$users = $this->Mensalidade->User->findAsCombo();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * gerar method
 *
 * @throws NotFoundException
 * @return void
 */
	public function gerar() {
        if ($this->request->is('post') || $this->request->is('put')) {
        	$data = $this->request->data;
        	$data = $data['Mensalidade'];
        	
    		$numero = 1;
        	$quantidade = (float) $data['quantidade'];

        	while ($numero <= $quantidade) {
        		$mensalidade = $data;
    			$mensalidade['numero'] = $numero;

                $this->Mensalidade->create();
                if (! $this->Mensalidade->save($mensalidade)) { 
                	 debug($this->validationErrors); die();
					//debug($mensalidade);  debug($e); die;
					//$this->redirect($this->referer());
            	}
                $numero++;
        	}
			$this->redirect(array('action' => 'index'));
		}
		$contas = $this->Mensalidade->Conta->findAsCombo();
		$alunos = $this->Mensalidade->Aluno->findAsCombo();
		$formapgtos = $this->Mensalidade->Formapgto->findAsCombo();
		$users = $this->Mensalidade->User->findAsCombo();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

	public function boleto($id = null){
		$this->autoRender = false;

		$dados = array();

		$options = array('recursive' => -1, 'conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
		$mensalidade = $this->Mensalidade->find('first', $options);

		$options = array('recursive' => -1, 'conditions' => array('Conta.' . $this->Mensalidade->Conta->primaryKey => $mensalidade['Mensalidade']['conta_id']));
		$conta = $this->Mensalidade->Conta->find('first', $options);

		$options = array('recursive' => -1, 'conditions' => array('Aluno.' . $this->Mensalidade->Aluno->primaryKey => $mensalidade['Mensalidade']['aluno_id']));
		$aluno = $this->Mensalidade->Aluno->find('first', $options);

		$options = array('recursive' => 1, 'conditions' => array('Cidade.' . $this->Mensalidade->Aluno->Cidade->primaryKey => $aluno['Aluno']['cidade_id']));
		$cidade = $this->Mensalidade->Aluno->Cidade->find('first', $options);

		$Instituto = ClassRegistry::init('Instituto');
		$options = array('recursive' => 2, 'conditions' => array('Instituto.' . $Instituto->primaryKey => 1));
		$instituto = $Instituto->find('first', $options);

		$dados['sacado'] = $aluno['Aluno']['nome'];
		$dados['endereco1'] = $aluno['Aluno']['endereco'] . ' ' . $aluno['Aluno']['numero'] . ' ' . $aluno['Aluno']['bairro'];
		$dados['endereco2'] = $cidade['Cidade']['nome'] . '/' . $cidade['Estado']['sigla'];
		$dados['cpf_cnpj'] = $aluno['Aluno']['cpf'];
		
		$dados['valor_cobrado'] = $mensalidade['Mensalidade']['liquido'];
		$dados['pedido'] = 5; // Usado para gerar o número do documento e o nosso número.

		/* Seus Dados */
		$dados["identificacao"] = $instituto['Empresa']['fantasia'];
		$dados["cpf_cnpj"] = $instituto['Empresa']['cnpjcpf'];
		$dados["endereco"] = $instituto['Empresa']['endereco'] . ' ' . $instituto['Empresa']['numero'] . ' ' . $instituto['Empresa']['bairro'] . ' ' . ' '  . $instituto['Empresa']['cep'];
		$dados["cidade_uf"] = $instituto['Empresa']['Cidade']['nome'];
		$dados["cedente"] = $conta['Conta']['cedente'];

		// Informações da sua conta 
		//debug($conta); die;
		$dados["agencia"] = $conta['Conta']['agencia']; // Num da agencia, sem digito
		$dados["conta"] = $conta['Conta']['conta']; 	// Num da conta, sem digito

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
		$dados['data_vencimento'] = date('d/m/Y', strtotime($mensalidade['Mensalidade']['vencimento']));

		// Taxa do boleto
		$dados['taxa'] = 0;

		// Informações para o cliente
		$dados["demonstrativo1"] = $instituto['Empresa']['fantasia'] . "<br />";
		$dados["demonstrativo2"] = $aluno['Aluno']['nome'] . "<br />";
		$dados["demonstrativo3"] = "";

		// OPCIONAIS
		$dados["quantidade"] = "1";
		$dados["valor_unitario"] = "";

		// Instruções ao caixa
		$dados["instrucoes1"] = " Sr. Caixa,";
		$dados["instrucoes2"] = " Não receber após o vencimento.";
		$dados["instrucoes3"] = "";
		$dados["instrucoes4"] = "";

		
		// MOEDA 
		$dados["aceite"] = "N";
		$dados["especie"] = "R$";
		$dados["especie_doc"] = "DM";

		//debug($data); die;

		$this->BoletoHsbc->render($dados);
	}
}
