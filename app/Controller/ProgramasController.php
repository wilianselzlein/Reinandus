<?php
App::uses('AppController', 'Controller');
/**
 * Programas Controller
 *
 * @property Programa $Programa
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramasController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Programa))));
		$this->Filter->setPaginate('order', array('Programa.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Programa->recursive = 0;
		$this->set('programas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Programa->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 0, 'conditions' => array('Permissao.programa_id' => $id), 'limit' => Self::$LIMITE_VIEW, 
		'fields' => array(' Permissao.id', 'Permissao.user_id', 'Permissao.programa_id', 'Permissao.index', 'Permissao.view', 'Permissao.edit', 'Permissao.add', 'Permissao.delete', 'Programa.id', 'Programa.nome', 'User.id', 'User.username'));
		//$this->User->Permissao->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$permissoes = $this->Programa->Permissao->find('all', $options);
		$permissoes = $this->TransformarArray->FindInContainable('Permissao', $permissoes);
		$this->set(compact('permissoes'));

		$options = array('recursive' => false, 'conditions' => array('Programa.' . $this->Programa->primaryKey => $id));
		$this->set('programa', $this->Programa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Programa->create();
			if ($this->Programa->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Programa->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Programa->id = $id;
		if (!$this->Programa->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Programa->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Programa->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Programa.' . $this->Programa->primaryKey => $id));
			$this->request->data = $this->Programa->find('first', $options);
		}
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
		$this->Programa->id = $id;
		if (!$this->Programa->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Programa->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * atualizar method
 *
 * @return void
 */
	public function atualizar() {
		$this->AdicionarProgramasSeNecessario();
		$this->redirect(array('action' => 'index'));
	}

/**
 * AdicionarProgramasSeNecessario method
 *
 * @return void
 */
 private function AdicionarProgramasSeNecessario() {

 	$this->AdicionarProgramaSeNaoExistir( 1, 'Aluno');
 	$this->AdicionarProgramaSeNaoExistir( 2, 'Contum');
 	$this->AdicionarProgramaSeNaoExistir( 3, 'Cidade');
 	$this->AdicionarProgramaSeNaoExistir( 4, 'Curso');
 	$this->AdicionarProgramaSeNaoExistir( 5, 'Disciplina');
    $this->AdicionarProgramaSeNaoExistir( 6, 'Pessoa');
 	$this->AdicionarProgramaSeNaoExistir( 7, 'HistoricoPadrao');
 	$this->AdicionarProgramaSeNaoExistir( 8, 'Instituto');
 	$this->AdicionarProgramaSeNaoExistir( 9, 'LancamentoContabil');
 	$this->AdicionarProgramaSeNaoExistir(10, 'Acesso');
 	$this->AdicionarProgramaSeNaoExistir(11, 'Parametro');
 	$this->AdicionarProgramaSeNaoExistir(12, 'PlanoConta');
 	$this->AdicionarProgramaSeNaoExistir(13, 'Professor');
 	$this->AdicionarProgramaSeNaoExistir(14, 'Programa');
 	$this->AdicionarProgramaSeNaoExistir(15, 'User');
 	$this->AdicionarProgramaSeNaoExistir(16, 'AlunoDisciplina');
 	$this->AdicionarProgramaSeNaoExistir(17, 'Relatorio');
 	$this->AdicionarProgramaSeNaoExistir(18, 'Formapgto');
 	$this->AdicionarProgramaSeNaoExistir(19, 'ContaPagar');
 	$this->AdicionarProgramaSeNaoExistir(20, 'Aviso');
 	$this->AdicionarProgramaSeNaoExistir(21, 'Grupo');
 	$this->AdicionarProgramaSeNaoExistir(22, 'Cabecalho');
 	$this->AdicionarProgramaSeNaoExistir(23, 'Contrato');
 	$this->AdicionarProgramaSeNaoExistir(24, 'CursoDisciplina');
 	$this->AdicionarProgramaSeNaoExistir(25, 'Detalhe');
 	$this->AdicionarProgramaSeNaoExistir(26, 'Enumerado');
 	$this->AdicionarProgramaSeNaoExistir(27, 'Estado');
 	$this->AdicionarProgramaSeNaoExistir(28, 'Importador');
 	$this->AdicionarProgramaSeNaoExistir(29, 'Logo');
 	$this->AdicionarProgramaSeNaoExistir(30, 'Nota');
 	$this->AdicionarProgramaSeNaoExistir(31, 'Permissao');
 	$this->AdicionarProgramaSeNaoExistir(32, 'Role');
 	$this->AdicionarProgramaSeNaoExistir(33, 'GrupoCurso');
 	$this->AdicionarProgramaSeNaoExistir(34, 'Mensalidade');
 	$this->AdicionarProgramaSeNaoExistir(35, 'Remessa/Retorno');
 	$this->AdicionarProgramaSeNaoExistir(36, 'Orcamento');
 	$this->AdicionarProgramaSeNaoExistir(37, 'Cobranca');
 	/*$this->AdicionarProgramaSeNaoExistir(38, '');
 	$this->AdicionarProgramaSeNaoExistir(39, '');
 	$this->AdicionarProgramaSeNaoExistir(40, '');
 	*/
	$this->Session->setFlash(__('Os programas foram atualizados.'), 'flash/success');
 }

/**
 * AdicionarProgramaSeNaoExistir method
 * @param int $id
 * @param string $nome
 * @param boolean $is_cadastro
 * @return void
 */
 	private function AdicionarProgramaSeNaoExistir($id, $nome, $cadastro = true) {
        
        $cadastro=[];
        $cadastro['Programa']['id'] = $id;
        $cadastro['Programa']['nome'] = $nome;
		$cadastro['Programa']['is_cadastro'] = (bool) $cadastro;

		$this->Programa->create();
		$this->Programa->save($cadastro);

		if (! $this->Programa->save($cadastro)) {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), "flash/linked/error", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(
                  "action" => "view",
                  $this->Programa->id
           		)
        	));
			$this->redirect(array('action' => 'index'));
		}
 	}

}
