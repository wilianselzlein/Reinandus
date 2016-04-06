<?php
App::uses('AppController', 'Controller');
/**
 * Cidades Controller
 *
 * @property Cidade $Cidade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CidadesController extends AppController {

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

		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Cidade))));
		$this->Filter->setPaginate('order', array('Cidade.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
      
		$this->Cidade->recursive = 0;
		$this->set('cidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));

		$options = array('conditions' => array('Aluno.cidade_id' => $id), 'limit' => 200,
		  'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor'));
		$this->Cidade->Aluno->unbindModel(array(
			'hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade'),
			'belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
		$alunos = $this->Cidade->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));

		$options = array('conditions' => array('Pessoa.cidade_id' => $id), 'limit' => 200, 
		  'fields' => array('Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Pessoa.endereco', 'Pessoa.numero', 'Pessoa.bairro', 'Pessoa.cep', 'Pessoa.fone',
		  'Pessoa.email', 'Cidade.id', 'Cidade.nome'));
		$this->Cidade->Pessoa->unbindModel(array('hasMany' => array('Curso', 'Detalhe', 'Usuario')));
		$pessoas = $this->Cidade->Pessoa->find('all', $options);
		$pessoas = $this->TransformarArray->FindInContainable('Pessoa', $pessoas);
		$this->set(compact('pessoas'));

		$options = array('conditions' => array('Professor.cidade_id' => $id), 'limit' => 200,
		  'fields' => array('Professor.id', 'Professor.nome', 'Professor.celular', 'Professor.email', 'Professor.resumotitulacao', 'Cidade.id', 'Cidade.nome'));
		$this->Cidade->Professor->unbindModel(array('hasAndBelongsToMany' => array('Disciplina'), 'hasMany' => array('Aluno', 'AlunoDisciplina', 'Curso', 'CursoDisciplina', 'ProfessorDisciplina')));
		$professores = $this->Cidade->Professor->find('all', $options);
		$professores = $this->TransformarArray->FindInContainable('Professor', $professores);
		$this->set(compact('professores'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cidade->create();
			if ($this->Cidade->save($this->request->data)) {
			$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Cidade->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$estados = $this->Cidade->Estado->findAsCombo();
		$this->set(compact('estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Cidade->id = $id;
		if (!$this->Cidade->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cidade->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Cidade->id
               )
            ));
            
			$this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
			$this->request->data = $this->Cidade->find('first', $options);
		}
		$estados = $this->Cidade->Estado->findAsCombo();
		$this->set(compact('estados'));
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
		$this->Cidade->id = $id;
		if (!$this->Cidade->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Cidade->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

}
