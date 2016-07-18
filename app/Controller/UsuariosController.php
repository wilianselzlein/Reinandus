<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Permissoes');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsuariosController extends AppController {
   public $uses = array('User');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'TransformarArray');


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->User))));
		$this->Filter->setPaginate('order', array('User.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Filter->setPaginate('fields', array('User.Id', 'User.username', 'Pessoa.id', 'Pessoa.fantasia', 'Role.id', 'Role.nome', 'User.created', 'User.modified', 'User.assinatura'));
		$this->User->recursive = 0;
		$this->set('usuarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 0, 'conditions' => array('User.' . $this->User->primaryKey => $id),
			'fields' => array('User.*', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Role.id', 'Role.nome'));
/*
User.id, User.username, User.password, User.pessoa_id, User.created, User.modified, User.role_id, User.assinatura, Pessoa.id, Pessoa.fantasia, Pessoa.razaosocial, Pessoa.endereco, Pessoa.numero, Pessoa.bairro, Pessoa.cidade_id, Pessoa.cep, Pessoa.fone, Pessoa.fax, Pessoa.celular, Pessoa.email, Pessoa.emailalt, Pessoa.site, Pessoa.cnpjcpf, Pessoa.resumo, Pessoa.obs, Pessoa.empresa, Pessoa.contato, Pessoa.ie, Pessoa.im, Pessoa.orgao, Pessoa.orgaonum, Pessoa.pessoa, Pessoa.ramo, Pessoa.secundario, Pessoa.fundacao, Pessoa.juntacomercial, Pessoa.created, Pessoa.modified, Pessoa.desconto, Role.id, Role.nome
FROM pedroescobar15.user AS User 
*/
		$this->User->unbindModel(array('hasMany' => array('Mensalidade', 'Aviso', 'ContaPagar')));
		$this->set('usuario', $this->User->find('first', $options));

		$options = array('recursive' => 0, 'conditions' => array('Permissao.user_id' => $id), 'limit' => 200, 
		'fields' => array(' Permissao.id', 'Permissao.user_id', 'Permissao.programa_id', 'Permissao.index', 'Permissao.view', 'Permissao.edit', 'Permissao.add', 'Permissao.delete', 'Programa.id', 'Programa.nome', 'User.id', 'User.username'));
		//$this->User->Permissao->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$permissoes = $this->User->Permissao->find('all', $options);
		$p_ermissoes = $this->TransformarArray->FindInContainable('Permissao', $permissoes);
		$this->set(compact('p_ermissoes'));

		$options = array('recursive' => 0, 'conditions' => array('Mensalidade.user_id' => $id), 'limit' => 200, 
		'fields' => array('Mensalidade.id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Aluno.id', 'Aluno.nome'));
		$this->User->Mensalidade->unbindModel(array('belongsTo' => array('Grupo', 'Tipo', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
		$mensalidades = $this->User->Mensalidade->find('all', $options);
		$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
		$this->set(compact('mensalidades'));

		$options = array('recursive' => 0, 'conditions' => array('Aviso.user_id' => $id), 'limit' => 200,
			'fields' => array('Aviso.*', 'User.id', 'User.username', 'Tipo.id', 'Tipo.valor'));
/*
Aviso.id, Aviso.data, Aviso.user_id, Aviso.arquivo, Aviso.mensagem, Aviso.tipo_id, Aviso.caminho, Aviso.tipo, Aviso.tamanho, User.id, User.username, User.password, User.pessoa_id, User.created, User.modified, User.role_id, User.assinatura, Tipo.id, Tipo.nome, Tipo.referencia, Tipo.valor
*/
		$avisos = $this->User->Aviso->find('all', $options);
		$avisos = $this->TransformarArray->FindInContainable('Aviso', $avisos);
		$this->set(compact('avisos'));
		
		$options = array('recursive' => 0, 'conditions' => array('ContaPagar.user_id' => $id), 'limit' => 200, 
    		'fields' => array('ContaPagar.id', 'ContaPagar.documento', 'Pessoa.id', 'Pessoa.razaosocial', 'ContaPagar.valor', 'ContaPagar.vencimento', 'ContaPagar.pagamento'));
		$this->User->ContaPagar->unbindModel(array('belongsTo' => array('Conta', 'User', 'Formapgto')));
		$pagar = $this->User->ContaPagar->find('all', $options);
		$pagar = $this->TransformarArray->FindInContainable('ContaPagar', $pagar);
		$this->set(compact('pagar'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
         if($this->request->data['User']['password']==$this->request->data['User']['re-password']){
            if ($this->User->save($this->request->data)) {
               $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->User->id
               )));
               $this->redirect(array('action' => 'index'));
            } else {
               $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
         }else{
            $this->Session->setFlash(__('Password mismatched.'), 'flash/error');
         }
		}
		$pessoas = $this->User->Pessoa->findAsCombo();
		$roles = $this->User->Role->findAsCombo();
		$this->set(compact('pessoas', 'roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EmitirExcecaoCasoMaster($id);

        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->User->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->User->unbindModel(array('belongsTo' => array('Pessoa', 'Role')));
			$this->request->data = $this->User->find('first', $options);
		}
		$pessoas = $this->User->Pessoa->findAsCombo();
		$roles = $this->User->Role->findAsCombo();
		$this->set(compact('pessoas', 'roles'));
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
		$this->EmitirExcecaoCasoMaster($id);
		
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
   
   
    public function login() {
    	$this->layout = 'login';
        // Verifica o tipo de requisição, se for POST(form submit) tenta logar.
      if($this->request->is('post')) {           
         
          if ($this->Auth->login()) {
              return $this->redirect($this->Auth->redirect());
          } else {
              $this->Session->setFlash(__('Invalid username or password, try again'), 'flash/error');
          }
      }
    }

    public function logout() {
    	$this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
   
   public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

/**
 * EmitirExcecaoCasoMaster method
 *
 * @throws Exception
 * @param int $id
 * @return void
 */
	private function EmitirExcecaoCasoMaster($id) {
		if ($id == 1) {
			throw new Exception(__('Impossível realizar essa ação com o usuário master!'));
		}
	}

/**
 * beforeCopy method
 *
 * @throws Exception
 * @param int $de_id $para_id
 * @return void
 */
   public function beforeCopy($de_id, $para_id) {
        parent::beforeCopy($de_id, $para_id);
        $Permissao = new PermissoesController;
        $Permissao->CopiarPermissoes($de_id, $para_id);
    }

}
