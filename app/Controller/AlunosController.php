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
	public $components = array('Paginator', 'Session', 'TransformarArray');

/**
 * index method
 *
 * @return void
 */
	public function index($tipo = null) {

/*		$filtros = array();
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
*/
        $this->Filter->addFilters(
                array('filter1' => array('OR' => array(                           
                        'Aluno.id' => array('operator' => 'LIKE'),
                        'Aluno.nome' => array('operator' => 'LIKE', 'explode'  => false),
                        )
                    )
                )
        );

		$this->Filter->setPaginate('order', array('Aluno.id' => 'desc')); 
		$this->Filter->setPaginate('fields', array('Aluno.id', 'Aluno.nome', 'Curso.id', 'Curso.nome', 'Aluno.endereco', 'Aluno.numero', 'Aluno.bairro', 'Aluno.cep', 'Aluno.cpf',
'Cidade.id', 'Cidade.nome', 'Aluno.celular', 'Aluno.email', 'Situacao.id', 'Situacao.valor'));

		if (! isset($filtros['AND'])) 
			$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		else
			$this->Filter->setPaginate('conditions', $filtros['AND']);

		$this->Aluno->recursive = 0;
//		$this->Aluno->unbindModel(array('belongsTo' => 
//			array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Professor', 'Situacao', 'Responsavel')));
		$this->set('alunos', $this->paginate());
		
		$pendentes = $this->Aluno->query(
			'select a.id, a.nome, a.email, a.emailalt
			from aluno a 
			where a.situacao_id = 8
			and a.id not in (
			select ad.aluno_id 
			from aluno_disciplinas ad 
			join aluno b on ad.aluno_id = b.id
			where b.situacao_id = 8
			and (ad.frequencia = 0 or ad.nota = 0 or ad.horas_aula = 0))');
		$this->set('pendentes', $pendentes);
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
 'Cidade.id', 'Cidade.nome', 'Responsavel.id', 'Responsavel.fantasia', 'Responsavel.razaosocial', 'Formapgto.id', 'Formapgto.nome'));
		$this->set('aluno', $this->Aluno->find('first', $options));

		$disciplinas = $this->ConsultarDisciplinas($id);
		$this->set(compact('disciplinas'));

		$mensalidades = $this->ConsultarMensalidades($id);
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

		$detalhes = $this->ConsultarDetalhes($id);
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
		$situacaos = $this->Aluno->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id', 'Situacao.nome' => 'aluno')));

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
		$situacaos = $this->Aluno->Situacao->find('list', array('conditions' => array('Situacao.referencia' => 'situacao_id', 'Situacao.nome' => 'aluno')));

		$cursos = $this->Aluno->Curso->findAsCombo();
		$professores = $this->Aluno->Professor->findAsCombo();
		$cidades = $this->Aluno->Cidade->findAsCombo();
		$naturalidades = $cidades;
		$responsavels = $this->Aluno->Responsavel->findAsCombo();
		//$responsavels[null] = '';
		//$disciplinas = $this->Aluno->AlunoDisciplina->findAsCombo();

		$disciplinas = $this->ConsultarDisciplinas($id);
		$this->set(compact('disciplinas'));
		
		$mensalidades = $this->ConsultarMensalidades($id);
		$this->set(compact('mensalidades'));

		$detalhes = $this->ConsultarDetalhes($id);
		$this->set(compact('detalhes'));

		$formapgtos = $this->Aluno->Formapgto->findAsCombo('asc', 'tipo <> "I"');

		$this->set(compact('estadoCivils', 'indicacaos', 'cursos', 'professores', 'cidades', 'naturalidades', 'responsavels', 'situacaos', 'formapgtos'));
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
		$options = array('recursive' => -1, 'fields' => array('Situacao.id', 'Situacao.valor'),
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
		$options = array('recursive' => -1, 'fields' => array('Aluno.email'),
		'conditions' => array('Aluno.email <> ""', 'Aluno.situacao_id' => $situacao), 'order' => array('Aluno.email'));
		$this->Aluno->unbindModel(array('belongsTo' => 
				array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
	    return $this->Aluno->find('list', $options);
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

		$this->Aluno->AlunoDisciplina->recursive = -1;
		$registros = $this->Aluno->AlunoDisciplina->find('all', array('conditions' => array('AlunoDisciplina.aluno_id' => $de_id)));
		foreach ($registros as $registro) {
			$registro['AlunoDisciplina']['aluno_id'] = $para_id;
			unset($registro['AlunoDisciplina']['id']);
			unset($registro['AlunoDisciplina']['created']);
			unset($registro['AlunoDisciplina']['modified']);

			$this->Aluno->AlunoDisciplina->create();
			$this->Aluno->AlunoDisciplina->save($registro);
		}

    }

/**
 * ConsultarMensalidades method
 *
 * @param int $id
 * @return void
 */
   public function ConsultarMensalidades($id) {
		$options = array('recursive' => false, 'conditions' => array('Mensalidade.aluno_id' => $id),
			'fields' => array('Mensalidade.id', 'Mensalidade.aluno_id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Formapgto.id', 'Formapgto.nome', 'Aluno.id', 'Aluno.nome', 'Situacao.id', 'Situacao.valor'));
		$this->Aluno->Mensalidade->unbindModel(array('belongsTo' => array('Conta', 'User', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
		$mensalidades = $this->Aluno->Mensalidade->find('all', $options);
		$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
		return $mensalidades;
	}

/**
 * ConsultarDetalhes method
 *
 * @param int $id
 * @return void
 */
   public function ConsultarDetalhes($id) {
		$options = array('recursive' => false, 'conditions' => array('Detalhe.aluno_id' => $id));
		$this->Aluno->Detalhe->unbindModel(array('belongsTo' => array('Aluno')));
		$detalhes = $this->Aluno->Detalhe->find('all', $options);
		return $detalhes;
	}
	
/**
 * ConsultarDetalhes method
 *
 * @param int $id
 * @return void
 */
   public function ConsultarDisciplinas($id) {
		$options = array('recursive' => false, 'conditions' => array('AlunoDisciplina.aluno_id' => $id),
			'fields' => array('AlunoDisciplina.id', 'AlunoDisciplina.frequencia', 'AlunoDisciplina.nota', 'AlunoDisciplina.horas_aula', 'AlunoDisciplina.data', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Aluno->AlunoDisciplina->unbindModel(array('belongsTo' => array('Aluno')));
		$disciplinas = $this->Aluno->AlunoDisciplina->find('all', $options);
		$disciplinas = $this->TransformarArray->FindInContainable('AlunoDisciplina', $disciplinas);
		return $disciplinas;
   }

/**
 * ConsultarDetalhes method
 *
 * @param int $id
 * @return void
 */
	public function Trocar() {
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$de = $this->request->data['Aluno']['de'];
			$para = $this->request->data['Aluno']['para'];
			
			//$this->Aluno->id = $de;
			if (! $this->Aluno->exists($de)) {
				$this->Session->setFlash(__("Aluno $de não existe"), 'flash/error');
				$this->redirect($this->referer());
			}
			
			//$this->Aluno->id = $para;
			if ($this->Aluno->exists($para)) {
				$this->Session->setFlash(__("Aluno $para já existe."), "flash/linked/error",
				array("link_text" => __('GO_TO'), "link_url" => array("action" => "view", $para)));

				$this->redirect($this->referer());
			}
			
			$sql = "update aluno set id = $para where id = $de";
			$this->Aluno->query($sql);

			$this->Session->setFlash(__("Código do aluno alterado de $de para $para."), 'flash/success');
			$this->redirect(array('action' => 'view', $para));
		}	
	}

/**
 * excel method
 *
 * @throws FatalErrorException
 * @param void
 * @return file
 */
	public function excel ($dados = null){
		//Self::$fields_excel = array('Aluno.id', 'Aluno.nome', ...);
		parent::excel();
	}
	
	/**
 * ConsultarDetalhes method
 *
 * @param int $id
 * @return void
 */
	public function SetarComprovanteComoImpresso($id) {
		if (!$this->Aluno->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}

		$options = array('recursive' => -1, 'conditions' => array('Aluno.' . $this->Aluno->primaryKey => $id));
		$aluno = $this->Aluno->find('first', $options);
		$aluno['Aluno']['imprimiu_comprovante'] = True;

		$this->Aluno->save($aluno);

	}

}
