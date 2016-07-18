<?php
App::uses('AppController', 'Controller');
/**
 * Permissaos Controller
 *
 * @property Permissao $Permissao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PermissoesController extends AppController {

   public $uses = array('Permissao');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'TransformarArray', 'Auth');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Permissao))));
		$this->Filter->setPaginate('order', array('Permissao.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Permissao->recursive = 0;
		$this->set('perms', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Permissao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Permissao.' . $this->Permissao->primaryKey => $id));
		$this->set('permissao', $this->Permissao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Permissao->create();
			if ($this->Permissao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Permissao->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Permissao->User->findAsCombo();
		$programas = $this->Permissao->Programa->findAsCombo();
		$this->set(compact('users', 'programas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Permissao->id = $id;
		if (!$this->Permissao->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Permissao->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Permissao->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Permissao.' . $this->Permissao->primaryKey => $id));
			$this->request->data = $this->Permissao->find('first', $options);
		}
		$users = $this->Permissao->User->findAsCombo();
		$programas = $this->Permissao->Programa->findAsCombo();
		$this->set(compact('users', 'programas'));
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
		$this->Permissao->id = $id;
		if (!$this->Permissao->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Permissao->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * adicionar method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function adicionar($user_id = null) {
		//$this->VerificarUsuarioParaPermissao($id);
		$this->IncluirPermissoesNoUsuario($user_id, true);
		$this->Session->setFlash(__('Permissões adicionadas!'), 'flash/error');
		$this->redirect(array('controller' => 'usuarios', 'action' => 'view', $user_id));
	}

/**
 * negar method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function negar($user_id = null) {
		//$this->VerificarUsuarioParaPermissao($id);
		$this->IncluirPermissoesNoUsuario($user_id, false);
		$this->Session->setFlash(__('Permissões negadas!'), 'flash/error');
		$this->redirect(array('controller' => 'usuarios', 'action' => 'view', $user_id));
	}

/**
 * VerificarUsuarioParaPermissao method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	private function VerificarUsuarioParaPermissao($user_id) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Permissao->User->id = $user_id;
		if (!$this->Permissao->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
	}

/**
 * IncluirPermissoesNoUsuario method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @param boolean $permitir
 * @return void
 */
	private function IncluirPermissoesNoUsuario($user_id, $permitir) {
		$incluidas = $this->Permissao->find('list', array('fields' => array('Permissao.programa_id'), 'conditions' => array('Permissao.user_id' => $user_id)));
		if (empty($incluidas)) $incluidas[] = 0;
		$options = array('recursive' => false, 'conditions' => array('NOT' => array('Programa.id' => $incluidas)), 'fields' => 'Programa.id');
		$programas = $this->Permissao->Programa->find('list', $options);

		foreach ($programas as $programa) {
			$dados = [];
			$dados['user_id'] = $user_id;
			$dados['programa_id'] = $programa;
			$dados['add'] = $permitir;
			$dados['delete'] = $permitir;
			$dados['index'] = $permitir;
			$dados['view'] = $permitir;
			$dados['edit'] = $permitir;
			$this->Permissao->create();
			$this->Permissao->save($dados);
		}
	}
	
	public function ConsultarPermissoesParaMontarOMenu($user_id) {
		/*select pr.id, pr.nome, pe.index from programa pr left outer join permissao pe on pr.id = pe.programa_id and pe.user_id = 1*/
		$joins = array(array('table' => 'programa', 'alias' => 'Programa', 'type' => 'RIGHT',
    				'conditions' => array('Programa.id = Permissao.programa_id and Permissao.user_id = ' . $user_id)));

		$permissoes = $this->Permissao->find('list', array('recursive' => -1, 'fields' => array('Programa.id', 'Permissao.index'), 'joins' => $joins));
		$programas = $this->Permissao->find('list', array('recursive' => -1, 'fields' => array('Programa.id', 'Programa.nome'), 'joins' => $joins));

		$menu = [];
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Alunos', 1);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Professores', 13);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Cursos', 4);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Disciplinas', 5);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Empresas/Pessoas', 6);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Cidades', 3);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Contas', 2);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Formas de Pagamento', 18);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Cadastro', 'Grupos', 21);

		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Secretaria', 'Avisos, Materiais e Notícias', 20);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Secretaria', 'Contrato Alunos', 23, 'Contratos', 'aluno');
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Secretaria', 'Contrato Professores', 23, 'Contratos', 'professor');
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Secretaria', 'Notas e Frequências', 30);
		
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Financeiro', 'Mensalidades', 34);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Financeiro', 'Contas a Pagar', 19);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Financeiro', 'Gerar Mensalidades', 34, 'Mensalidades', 'Gerar');
		
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Controladoria', 'Histórico Padrão', 7);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Controladoria', 'Plano de Contas', 12);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Controladoria', 'Lançamentos', 9);
		
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Parâmetros', 11);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Usuários', 15);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Acessos de Alunos', 10);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Permissões de Usuários', 31);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Cabeçalhos', 22);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Enumerados', 26);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Estados', 27);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Instituto', 8);
		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Configuracoes', 'Programas', 14);

		$this->AdicionarMenuSeHabilitado($menu, $permissoes, $programas, 'Relatorios', 'Relatorios', 17);

		return $menu;
	}

	private function AdicionarMenuSeHabilitado(&$array, $permissoes, $programas, $menu, $caption, $programa_id, $controller = null, $action = 'index') {
		if ((is_null($permissoes[$programa_id])) || ($permissoes[$programa_id])) {
			$model = $programas[$programa_id];
			if ($controller == null) 
				$controller = $this->GetControllerByModel($model);
			$array[$menu][$caption] = array($model, $controller, $action);
		}
	}

	private function GetControllerByModel($model) {
		$return = Inflector::camelize(Inflector::humanize(Inflector::pluralize($model)));
		if (! strcasecmp($return, 'Conta')) 
			$return = 'Contas';
		if (! strcasecmp($return, 'Lancamentocontabil')) 
			$return = 'LancamentoContabil';
		if (! strcasecmp($return, 'Contaspagar')) 
			$return = 'ContasPagar';
		if (! strcasecmp($return, 'HistoricoPadraos')) 
			$return = 'HistoricoPadrao';
		if (! strcasecmp($return, 'Formapgtos')) 
			$return = 'FormasPagamentos';
		if (! strcasecmp($return, 'Institutos')) 
			$return = 'Instituto';

		return $return;
	}

	public function CopiarPermissoes($de_id, $para_id) {
		$this->Permissao->recursive = -1;
		$p_ermissoes = $this->Permissao->find('all', array('conditions' => array('Permissao.user_id' => $de_id)));
		foreach ($p_ermissoes as $permissao) {
			$permissao['Permissao']['user_id'] = $para_id;
			unset($permissao['Permissao']['id']);
			unset($permissao['Permissao']['created']);
			unset($permissao['Permissao']['modified']);

			$this->Permissao->create();
			$this->Permissao->save($permissao);
		}

	}

}