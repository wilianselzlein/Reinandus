<?php
App::uses('AppController', 'Controller');
/**
 * Alunos Controller
 *
 * @property Aluno $Aluno
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlunosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index($tipo = null) {

		$filtros = array();
		$filtros['OR'] = $this->AdicionarFiltrosLike($this->Aluno, 
			['is_ativo', 'emitir_carteirinha', 'entregou_cpf', 'cert_entrega', 'created', 
			'modified', 'cert_solicitado', 'curso_fim', 'curso_inicio', 'entregou_diploma', 
			'data_expedicao', 'data_nascimento', 'mono_prazo', 'entregou_rg', 'bloqueado_data',
			'mono_data']);
		if ($tipo == 'Aniver')
			$filtros['AND'] = array('Aluno.data_nascimento' => array('value' => date('Y-m-d')));

		$filtro = array();
		$filtro['filter1'] = $filtros;
		$this->Filter->addFilters($filtro);

		$this->Filter->setPaginate('order', array('Aluno.id' => 'desc')); 

		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);

		$this->Aluno->recursive = 0;
		$this->set('alunos', $this->paginate());

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aluno->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
		$this->set('aluno', $this->Aluno->find('first', $options));

		$options = array('conditions' => array('AlunoDisciplina.aluno_id' => $id));
		$disciplinas = $this->Aluno->AlunoDisciplina->find('all', $options);
		$this->set(compact('disciplinas'));

		$options = array('conditions' => array('Mensalidade.aluno_id' => $id));
		$mensalidades = $this->Aluno->Mensalidade->find('all', $options);
		$this->set(compact('mensalidades'));

		$options = array('conditions' => array('Acesso.aluno_id' => $id));
		$acessos = $this->Aluno->Acesso->find('all', $options);
		$this->set(compact('acessos'));

		$options = array('recursive' => -1, 'conditions' => array('Detalhe.aluno_id' => $id));
		$detalhes = $this->Aluno->Detalhe->find('all', $options);
		$this->set(compact('detalhes'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {      
		if ($this->request->is('post')) {
			$this->Aluno->create();
			if ($this->Aluno->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Aluno->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$estadoCivils = $this->Aluno->EstadoCivil->find('list', array('conditions' => array('EstadoCivil.referencia' => 'estado_civil_id')));
		$indicacaos = $this->Aluno->Indicacao->find('list', array('conditions' => array('Indicacao.referencia' => 'indicacao_id')));
		$situacaos = $this->Aluno->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id')));

		$cursos = $this->Aluno->Curso->findAsCombo();
		$professores = $this->Aluno->Professor->findAsCombo();
		$cidades = $this->Aluno->Cidade->findAsCombo();
		$naturalidades = $this->Aluno->Cidade->findAsCombo();
		$responsavels = $this->Aluno->Responsavel->findAsCombo();
		$disciplinas = $this->Aluno->AlunoDisciplina->findAsCombo();

		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professores', 'cidades', 'naturalidades', 'responsavels', 'disciplinas', 'situacaos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Aluno->id = $id;
		if (!$this->Aluno->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aluno->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Aluno->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
			$this->request->data = $this->Aluno->find('first', $options);
		}
		$estadoCivils = $this->Aluno->EstadoCivil->find('list', array('conditions' => array('EstadoCivil.referencia' => 'estado_civil_id')));
		$indicacaos = $this->Aluno->Indicacao->find('list', array('conditions' => array('Indicacao.referencia' => 'indicacao_id')));
		$situacaos = $this->Aluno->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id')));

		$cursos = $this->Aluno->Curso->findAsCombo();
		$professores = $this->Aluno->Professor->findAsCombo();
		$cidades = $this->Aluno->Cidade->findAsCombo();
		$naturalidades = $this->Aluno->Cidade->findAsCombo();
		$responsavels = $this->Aluno->Responsavel->findAsCombo();
		$disciplinas = $this->Aluno->AlunoDisciplina->findAsCombo();
		
		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professores', 'cidades', 'naturalidades', 'responsavels', 'disciplinas', 'situacaos'));
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
		$this->Aluno->id = $id;
		if (!$this->Aluno->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Aluno->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * mensalidade method
 *
 * @return void
 */
	public function mensalidade($id) {
		$this->layout = false;
		$options = array('conditions' => array('Mensalidade.aluno_id' => $id));
		$this->set('aluno_id', $id);
		$this->set('mensalidade', $this->Aluno->Mensalidade->find('all', $options));

	}

/**
 * disciplina method
 *
 * @return void
 */
	public function disciplina($id) {
		$this->layout = false;
		$options = array('conditions' => array('AlunoDisciplina.aluno_id' => $id));
		$this->set('aluno_id', $id);
		$this->set('disciplina', $this->Aluno->AlunoDisciplina->find('all', $options));

	}

/**
 * reset method
 *
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function reset($id = null) {
		if (!$this->Aluno->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}

		$options = array('recursive' => -1, 'conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
		$senha = $this->Aluno->find('first', $options);
		$senha['Aluno']['senha'] = '1';//  'a1d1fd73b693d0eae95ca92a1edff52a07e5e9c6';

		//debug($senha); die;

		if ($this->Aluno->save($senha)) {
			$this->Session->setFlash(__('Senha resetada. '), "flash/linked/success", 
				array(
					"link_text" => __('GO_TO'),
					"link_url" => array(                  
					"action" => "view", $id)
            	)
        	);
			$this->redirect(array('action' => 'view', $id));
		} else {
			$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
		}
	}
}
