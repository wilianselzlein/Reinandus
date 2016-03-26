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
		$options = array('recursive' => 0, 'conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
		$this->set('pessoa', $this->Pessoa->find('first', $options));

		$options = array('recursive' => 0, 'conditions' => array('Curso.pessoa_id' => $id), 'limit' => 200,
		 'fields' => array('Curso.id', 'Curso.nome', 'Curso.turma', 'Curso.carga', 'Curso.sigla', 'Curso.num_turma', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Professor.id', 'Professor.nome', 'Periodo.id', 'Periodo.valor'));
		$this->Pessoa->Curso->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$cursos = $this->Pessoa->Curso->find('all', $options);
		$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
		$this->set(compact('cursos'));

		$options = array('recursive' => 0, 'conditions' => array('Usuario.pessoa_id' => $id), 'limit' => 200,
		 'fields' => array('Usuario.id', 'Usuario.username', 'Usuario.created', 'Usuario.modified', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial'));
        //$this->Pessoa->User->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
		$usuarios = $this->Pessoa->Usuario->find('all', $options);
		$usuarios = $this->TransformarArray->FindInContainable('Usuario', $usuarios);
		$this->set(compact('usuarios'));


		$options = array('conditions' => array('Aluno.responsavel_id' => $id), 'limit' => 200,
		  'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor'));
		$this->Pessoa->Aluno->unbindModel(array(
			'hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade'),
			'belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
		$alunos = $this->Pessoa->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));

		$options = array('recursive' => 0, 'conditions' => array('Logo.pessoa_id' => $id), 'limit' => 200,
		 'fields' => array('Logo.id', 'Logo.logo', 'Logo.pessoa_id'));
        $this->Pessoa->Logo->unbindModel(array('belongsTo' => array('Pessoa')));
		$logos = $this->Pessoa->Logo->find('all', $options);
		//$logos = $this->TransformarArray->FindInContainable('Logo', $logos);
		$this->set(compact('logos'));

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
