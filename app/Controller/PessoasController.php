<?php
App::uses('AppController', 'Controller');
/**
 * Pessoas Controller
 *
 * @property Pessoa $Pessoa
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PessoasController extends AppController {

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

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Pessoa))));
		$this->Filter->setPaginate('order', array('Pessoa.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Filter->setPaginate('fields', array('Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Pessoa.endereco', 'Pessoa.numero', 'Pessoa.bairro', 'Pessoa.cep',
           'Cidade.id', 'Cidade.nome', 'Pessoa.fone', 'Pessoa.email'));

		$this->Pessoa->recursive = 0;
		$this->set('pessoas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$limite = self::$LIMITE_VIEW;
		
		$options = array('recursive' => 0, 'conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
		$this->set('pessoa', $this->Pessoa->find('first', $options));

		$options = array('recursive' => 0, 'conditions' => array('Curso.pessoa_id' => $id), 'limit' => $limite,
		 'fields' => array('Curso.id', 'Curso.nome', 'Curso.turma', 'Curso.carga', 'Curso.sigla', 'Curso.num_turma', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Professor.id', 'Professor.nome', 'Periodo.id', 'Periodo.valor'));
		$this->Pessoa->Curso->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$cursos = $this->Pessoa->Curso->find('all', $options);
		$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
		$this->set(compact('cursos'));

		$options = array('recursive' => 0, 'conditions' => array('Usuario.pessoa_id' => $id), 'limit' => $limite,
		 'fields' => array('Usuario.id', 'Usuario.username', 'Usuario.created', 'Usuario.modified', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial'));
        //$this->Pessoa->User->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$usuarios = $this->Pessoa->Usuario->find('all', $options);
		$usuarios = $this->TransformarArray->FindInContainable('Usuario', $usuarios);
		$this->set(compact('usuarios'));

		$options = array('conditions' => array('Aluno.responsavel_id' => $id), 'limit' => $limite,
		  'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor', 'Curso.id', 'Curso.nome'));
		$this->Pessoa->Aluno->unbindModel(array(
			'hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade'),
			'belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Professor', 'Cidade', 'Responsavel')));
		$alunos = $this->Pessoa->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));

		$options = array('recursive' => 0, 'conditions' => array('Logo.pessoa_id' => $id), 'limit' => $limite,
		 'fields' => array('Logo.id', 'Logo.logo', 'Logo.pessoa_id'));
        try {
        	$this->Pessoa->Logo->unbindModel(array('belongsTo' => array('Pessoa')));
			$logos = $this->Pessoa->Logo->find('all', $options);
		} catch (Exception $e) {
			$logos = [];
		}
		//$logos = $this->TransformarArray->FindInContainable('Logo', $logos);
		$this->set(compact('logos'));

		$options = array('recursive' => 0, 'conditions' => array('ContaPagar.pessoa_id' => $id), 'limit' => $limite,
			'fields' => array('ContaPagar.id', 'ContaPagar.documento', 'Professor.id', 'Professor.nome', 'Pessoa.id', 'Pessoa.razaosocial', 'ContaPagar.valor', 'ContaPagar.vencimento', 'ContaPagar.pagamento'));
		$this->Pessoa->ContaPagar->unbindModel(array('belongsTo' => array('Conta', 'User', 'Formapgto', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
		$pagar = $this->Pessoa->ContaPagar->find('all', $options);
		$pagar = $this->TransformarArray->FindInContainable('ContaPagar', $pagar);
		$this->set(compact('pagar'));

		$options = array('recursive' => false, 'conditions' => array('Mensalidade.pessoa_id' => $id),
			'fields' => array('Mensalidade.id', 'Mensalidade.aluno_id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Formapgto.id', 'Formapgto.nome', 'Aluno.id', 'Aluno.nome', 'Situacao.id', 'Situacao.valor'));
		$this->Pessoa->Mensalidade->unbindModel(array('belongsTo' => array('Conta', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
		$mensalidades = $this->Pessoa->Mensalidade->find('all', $options);
		$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
		$this->set(compact('mensalidades'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pessoa->create();
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Pessoa->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$cidades = $this->Pessoa->Cidade->findAsCombo();
		$this->set(compact('cidades'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Pessoa->id = $id;
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Pessoa->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
			$this->request->data = $this->Pessoa->find('first', $options);
		}
		$cidades = $this->Pessoa->Cidade->findAsCombo();
		$this->set(compact('cidades'));
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
		$this->Pessoa->id = $id;
		if (!$this->Pessoa->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Pessoa->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


/**
 * email method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function emails() {
		$options = array('recursive' => 0, 'fields' => array('Pessoa.email'), 
			'conditions' => array('Pessoa.email <> ""'), 'order' => array('Pessoa.email'));
	    $emails = $this->Pessoa->find('list', $options);
		$this->set('emails', $emails);
	}

}
