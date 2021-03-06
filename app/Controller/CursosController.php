<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CursosController extends AppController {

    public $uses = array('Curso', 'CursoDisciplina', 'User', 'Enumerado');

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Curso))));
		$this->Filter->setPaginate('order', array('Curso.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Filter->setPaginate('fields', array('Curso.id', 'Curso.nome', 'Curso.sigla', 'Curso.turma', 'Curso.carga', 
			'Professor.id', 'Professor.nome', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial'));
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
	}	
		$options = array('recursive' => 0, 'conditions' => array('Curso.' . $this->Curso->primaryKey => $id),
			'fields' => array(
 /*Curso.id, Curso.nome, Curso.professor_id, Curso.turma, Curso.carga, Curso.valor, Curso.percentual, Curso.desconto, 
 Curso.liquido, Curso.dia_vencimento, Curso.inicio, Curso.fim, Curso.sistema_aval, Curso.criterios_aval, 
 Curso.pessoa_id, Curso.sigla, Curso.site, Curso.monografia, Curso.aviso, Curso.calendario, Curso.horario,
  Curso.num_turma, Curso.grupo_id, Curso.tipo_id, Curso.periodo_id, Curso.created, Curso.modified,*/
 'Curso.*', 'Professor.id', 'Professor.nome', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial',
 'Grupo.id', 'Grupo.nome', 'Tipo.id', 'Tipo.valor', 'Periodo.id', 'Periodo.valor'));
		$this->set('curso', $this->Curso->find('first', $options));

		$options = array('conditions' => array('Aluno.curso_id' => $id), 'limit' => self::$LIMITE_VIEW,
		  'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor', 'Curso.id', 'Curso.nome'));
		$this->Curso->Aluno->unbindModel(array(
			'hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade'),
			'belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Professor', 'Cidade', 'Responsavel')));
		$alunos = $this->Curso->Aluno->find('all', $options);
		$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
		$this->set(compact('alunos'));

		$options = array('fields' => array('aviso_id'), 'conditions' => array('curso_id = ' => $id));
		$avisos = $this->Curso->AvisoCurso->find('list', $options);
		sort($avisos);
		if (empty($avisos)) $avisos[] = 0;

		$options = array('recursive' => 0, 'conditions' => array('Aviso.id >= ' => min($avisos), 'Aviso.id <= ' => max($avisos), 'AND' => array('Aviso.id' => $avisos)),
		  'fields' => array('Aviso.id', 'Aviso.data', 'Aviso.arquivo', 'Aviso.mensagem', 'User.id', 'User.username', 'Tipo.id', 'Tipo.valor'));
		$avisos = $this->Curso->Aviso->find('all', $options);
		$avisos = $this->TransformarArray->FindInContainable('Aviso', $avisos);
		$this->set(compact('avisos'));

		$options = array('recursive' => false, 'conditions' => array('CursoDisciplina.curso_id' => $id), 'limit' => self::$LIMITE_VIEW,
			'fields' => array('CursoDisciplina.id', 'CursoDisciplina.disciplina_id', 'CursoDisciplina.horas_aula','CursoDisciplina.periodo_letivo', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'));
		$this->Curso->CursoDisciplina->unbindModel(array('belongsTo' => array('Curso')));
		$disciplinas = $this->Curso->CursoDisciplina->find('all', $options);
		$disciplinas = $this->TransformarArray->FindInContainable('CursoDisciplina', $disciplinas);
		$this->set(compact('disciplinas'));
		
		$options = array('recursive' => false, 'conditions' => array('Calendario.curso_id' => $id), 'limit' => self::$LIMITE_VIEW,
		  'fields' => array('Calendario.id', 'Calendario.data', 'Curso.id', 'Curso.nome', 'Disciplina.id', 'Disciplina.nome'));
		$calendarios = $this->Curso->Calendario->find('all', $options);
		$calendarios = $this->TransformarArray->FindInContainable('Calendario', $calendarios);
		$this->set(compact('calendarios'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Curso->create();
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Curso->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$professores = $this->Curso->Professor->findAsCombo();
		$pessoas = $this->Curso->Pessoa->findAsCombo();
		$grupos = $this->Curso->Grupo->findAsCombo();
		$tipos = $this->Curso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'curso')));
		$periodos = $this->Curso->Periodo->find('list', array('conditions' => array('Periodo.referencia' => 'periodo_id')));
		$this->set(compact('professores', 'pessoas', 'grupos', 'tipos', 'periodos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Curso->id = $id;
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Curso->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
			$this->Curso->unbindModel(array('belongsTo' => array('Professor', 'Pessoa', 'Grupo', 'Tipo', 'Periodo')));
			$this->request->data = $this->Curso->find('first', $options);
		}
		$professores = $this->Curso->Professor->findAsCombo();
		$pessoas = $this->Curso->Pessoa->findAsCombo();
		$grupos = $this->Curso->Grupo->findAsCombo();
		$tipos = $this->Curso->Tipo->find('list', array('conditions' => array('Tipo.referencia' => 'tipo_id', 'Tipo.nome' => 'curso')));
		$periodos = $this->Curso->Periodo->find('list', array('conditions' => array('Periodo.referencia' => 'periodo_id')));
		$this->set(compact('professores', 'pessoas', 'grupos', 'tipos', 'periodos'));
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
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Curso->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

/**
 * disciplina method
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function disciplina($id) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$this->layout = false;
		$options = array('conditions' => array('CursoDisciplina.curso_id' => $id));
		$this->set('curso_id', $id);
		$this->set('disciplina', $this->CursoDisciplina->find('all', $options));
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

		$this->CursoDisciplina->recursive = -1;
		$registros = $this->CursoDisciplina->find('all', array('conditions' => array('CursoDisciplina.curso_id' => $de_id)));
		foreach ($registros as $registro) {
			$registro['CursoDisciplina']['curso_id'] = $para_id;
			unset($registro['CursoDisciplina']['id']);
			unset($registro['CursoDisciplina']['created']);
			unset($registro['CursoDisciplina']['modified']);

			$this->CursoDisciplina->create();
			$this->CursoDisciplina->save($registro);
		}

    }

/**
 * email method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function emails($situacao_id = null) {
		$options = array('recursive' => -1, 'fields' => array('Curso.id', 'Curso.nome'), 'order' => array('Curso.nome'));
		$cursos = $this->Curso->find('all', $options);

		$i = 0;
		foreach ($cursos as $curso) {
			$cursos[$i]['Curso']['emails'] = $this->EmailPorCurso($curso['Curso']['id'], $situacao_id);
			$i++;
		}
		$this->set('cursos', $cursos);

		$options = array('recursive' => -1, 'fields' => array('Situacao.id', 'Situacao.valor'),
			'conditions' => array('Situacao.nome' => 'Aluno', 'Situacao.referencia' => 'situacao_id'));
		$situacoes = $this->Curso->Aluno->Situacao->find('all', $options);
		$this->set('situacoes', $situacoes);		
	}

/**
 * EmailPorCurso method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function EmailPorCurso($curso_id, $situacao_id = null) {
		$conditions = array();
		$conditions[] = array('Aluno.email <> ""');
		$conditions[] = array('Aluno.curso_id' => $curso_id);
		if ($situacao_id != null)
			$conditions[] = array('Aluno.situacao_id' => $situacao_id);

		$options = array('recursive' => -1, 'fields' => array('Aluno.email'),
		'conditions' => $conditions, 'order' => array('Aluno.email'));
		$this->Curso->Aluno->unbindModel(array('belongsTo' => 
				array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
	    return $this->Curso->Aluno->find('list', $options);
	}

}
