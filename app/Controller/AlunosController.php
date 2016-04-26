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
		$this->Filter->setPaginate('fields', array('Aluno.id', 'Aluno.nome', 'Curso.id', 'Curso.nome', 'Aluno.endereco', 'Aluno.numero', 'Aluno.bairro', 'Aluno.cep',
'Cidade.id', 'Cidade.nome', 'Aluno.celular', 'Aluno.email'));

		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);

		$this->Aluno->recursive = 0;
		$this->Aluno->unbindModel(array('belongsTo' => 
			array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Professor', 'Situacao', 'Responsavel')));
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
		$options = array('recursive' => false, 'conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id),
			'fields' => array(
/*Aluno.id, Aluno.is_ativo, Aluno.nome, Aluno.nacionalidade, Aluno.data_nascimento, Aluno.naturalidade_id, 
Aluno.situacao_id, Aluno.estado_civil_id, Aluno.orgao_expedidor, Aluno.data_expedicao, Aluno.sexo, Aluno.nome_mae, 
Aluno.nome_pai, Aluno.indicacao_id, Aluno.curso_id, Aluno.professor_id, Aluno.emitir_carteirinha, Aluno.entregou_cpf,
Aluno.entregou_diploma, Aluno.bolsa, Aluno.cpf, Aluno.identidade, Aluno.endereco, Aluno.bairro, Aluno.cidade_id,
Aluno.cep, Aluno.residencial, Aluno.comercial, Aluno.celular, Aluno.email, Aluno.numero, Aluno.emailalt, 
Aluno.indicacao_nome, Aluno.indicacao_valor, Aluno.indicacao_pago, Aluno.curso_inicio, Aluno.curso_fim, 
Aluno.mono_titulo, Aluno.mono_data, Aluno.mono_nota, Aluno.bloqueado, Aluno.bloqueado_data, Aluno.senha, 
Aluno.entregou_rg, Aluno.desconto, Aluno.mono_prazo, Aluno.pesquisa, Aluno.responsavel_id, Aluno.cert_solicitado, 
Aluno.cert_entrega, Aluno.created, Aluno.modified, Aluno.formacao, */
 'Aluno.*', 'Naturalidade.id', 'Naturalidade.nome', 'Situacao.id', 'Situacao.valor', 'EstadoCivil.id', 'EstadoCivil.valor',
 'Indicacao.id', 'Indicacao.valor', 'Curso.id', 'Curso.nome', 'Professor.id', 'Professor.nome', 
 'Cidade.id', 'Cidade.nome', 'Responsavel.id', 'Responsavel.fantasia', 'Responsavel.razaosocial'));
		$this->set('aluno', $this->Aluno->find('first', $options));

		$options = array('recursive' => false, 'conditions' => array('AlunoDisciplina.aluno_id' => $id), 'limit' => 200,
			'fields' => array('AlunoDisciplina.id', 'AlunoDisciplina.frequencia', 'AlunoDisciplina.nota', 'AlunoDisciplina.horas_aula', 'AlunoDisciplina.data', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Aluno->AlunoDisciplina->unbindModel(array('belongsTo' => array('Aluno')));
		$disciplinas = $this->Aluno->AlunoDisciplina->find('all', $options);
		$this->set(compact('disciplinas'));

		$options = array('recursive' => false, 'conditions' => array('Mensalidade.aluno_id' => $id), 'limit' => 200,
			'fields' => array('Mensalidade.id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Formapgto.id', 'Formapgto.nome'));
		$this->Aluno->Mensalidade->unbindModel(array('belongsTo' => array('Aluno', 'Conta', 'User')));
		$mensalidades = $this->Aluno->Mensalidade->find('all', $options);
		$this->set(compact('mensalidades'));

		$dia = $this->ConsultarAcessos($id, '>=', '0 day');
		$this->set(compact('dia'));

		$semana = $this->ConsultarAcessos($id, '>=', '-1 week');
		$this->set(compact('semana'));

		$mes = $this->ConsultarAcessos($id, '>=', '-1 month');
		$this->set(compact('mes'));

		$sem = $this->ConsultarAcessos($id, '>=', '-6 month');
		$this->set(compact('sem'));
		
		$ano = $this->ConsultarAcessos($id, '>=', '-1 year');
		$this->set(compact('ano'));

		$antes = $this->ConsultarAcessos($id, '<', '-1 year');
		$this->set(compact('antes'));
		
		$options = array('recursive' => false, 'conditions' => array('Detalhe.aluno_id' => $id));
		$this->Aluno->Detalhe->unbindModel(array('belongsTo' => array('Aluno')));
		$detalhes = $this->Aluno->Detalhe->find('all', $options);
		$this->set(compact('detalhes'));
	}
	
/**
 * ConsultarAcessos method
 * @param string $id
 * @param string $sinal
 * @param string $periodo
 * @return void
 */
	public function ConsultarAcessos($id, $sinal, $periodo) {
		$options = array('recursive' => false, 'conditions' => array('Acesso.aluno_id' => $id, 'date(Acesso.datahora) ' . $sinal => date('Y-m-d', strtotime($periodo))));
		$this->Aluno->Acesso->unbindModel(array('belongsTo' => array('Aluno')));
		$acessos = $this->Aluno->Acesso->find('count', $options);
		return $acessos;
	}
		
/**
 * add method
 *
 * @return void
 */
	public function add() {      
		if ($this->request->is('post')) {
			$this->Aluno->create();

			if ($this->request->data['Aluno']['codigo'] > 0) 
				$this->request->data['Aluno']['id'] = $this->request->data['Aluno']['codigo'];

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
		$naturalidades = $cidades;
		$responsavels = $this->Aluno->Responsavel->findAsCombo();
		//$disciplinas = $this->Aluno->AlunoDisciplina->findAsCombo();

		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professores', 'cidades', 'naturalidades', 'responsavels', 'situacaos'));
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
			$options = array('recursive' => false, 'conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
			$this->Aluno->unbindModel(array('belongsTo' => array('Naturalidade', 'Situacao', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
			$this->request->data = $this->Aluno->find('first', $options);
		}
		$estadoCivils = $this->Aluno->EstadoCivil->find('list', array('conditions' => array('EstadoCivil.referencia' => 'estado_civil_id')));
		$indicacaos = $this->Aluno->Indicacao->find('list', array('conditions' => array('Indicacao.referencia' => 'indicacao_id')));
		$situacaos = $this->Aluno->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id')));

		$cursos = $this->Aluno->Curso->findAsCombo();
		$professores = $this->Aluno->Professor->findAsCombo();
		$cidades = $this->Aluno->Cidade->findAsCombo();
		$naturalidades = $cidades;
		$responsavels = $this->Aluno->Responsavel->findAsCombo();
		//$disciplinas = $this->Aluno->AlunoDisciplina->findAsCombo();
		
		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professores', 'cidades', 'naturalidades', 'responsavels', 'situacaos'));
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


/**
 * email method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function emails() {
		$options = array('recursive' => 0, 'fields' => array('Situacao.id', 'Situacao.valor'),
		'conditions' => array('Situacao.nome' => 'Aluno', 'Situacao.referencia' => 'situacao_id'));
		$situacoes = $this->Aluno->Situacao->find('all', $options);

		$i = 0;
		foreach ($situacoes as $situacao) {
			$situacoes[$i]['Situacao']['emails'] = $this->EmailPorSituacao($situacao['Situacao']['id']);
			$i++;
		}
		$this->set('situacoes', $situacoes);
	}


/**
 * EmailPorSituacao method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function EmailPorSituacao($situacao) {
		$options = array('recursive' => 0, 'fields' => array('Aluno.email'),
		'conditions' => array('Aluno.email <> ""', 'Aluno.situacao_id' => $situacao), 'order' => array('Aluno.email'));
		$this->Aluno->unbindModel(array('belongsTo' => 
				array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
	    return $this->Aluno->find('list', $options);
	}

}
