<?php
App::uses('AppController', 'Controller');
//App::import('Vendor', 'Classes/PHPExcel');
App::import('Vendor', 'PHPExcel');
/**
 * Enumerados Controller
 *
 * @property Enumerado $Enumerado
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EnumeradosController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Enumerado))));
		$this->Filter->setPaginate('order', array('Enumerado.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Enumerado->recursive = 0;
    	//$this->Paginator->settings = array('limit' => 50);
		$this->set('enumerados', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enumerado->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => false, 'conditions' => array('Enumerado.' . $this->Enumerado->primaryKey => $id), 'limit' => 1);
		$enumerados = $this->Enumerado->find('first', $options);
		$this->set('enumerado', $enumerados);

		if ($enumerados['Enumerado']['nome'] == 'aluno') {
			$alunos = ClassRegistry::init('Aluno');
			$options = array('conditions' => array('Aluno.' . $enumerados['Enumerado']['referencia'] => $id),
			  'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.celular', 'Aluno.email', 'Aluno.curso_inicio', 'Aluno.curso_fim', 'Situacao.id', 'Situacao.valor', 'Curso.id', 'Curso.nome'),
			  'order' => array('Aluno.nome'));
			$alunos->unbindModel(array(
				'hasMany' => array('Acesso', 'Detalhe', 'AlunoDisciplina', 'Mensalidade'),
				'belongsTo' => array('Naturalidade', 'EstadoCivil', 'Indicacao', 'Professor', 'Cidade', 'Responsavel')));
			$alunos = $alunos->find('all', $options);
			$alunos = $this->TransformarArray->FindInContainable('Aluno', $alunos);
			$this->set(compact('alunos'));
		}

		if ($enumerados['Enumerado']['nome'] == 'aviso') {
			$avisos = ClassRegistry::init('Aviso');
			$avisos = $avisos->find('all', array('recursive' => 0, 'order' => array('Aviso.data DESC'),
				'conditions' => array('Aviso.' . $enumerados['Enumerado']['referencia'] => $id),
				'fields' => array('Aviso.id', 'Aviso.data', 'Aviso.arquivo', 'Aviso.mensagem', 'Aviso.tipo_id', 'User.username', 'Tipo.valor', 'User.id')
				));
			$avisos = $this->TransformarArray->FindInContainable('Aviso', $avisos);
			$this->set(compact('avisos'));
		}

		if ($enumerados['Enumerado']['nome'] == 'curso') {
			$cursos = ClassRegistry::init('Curso');
			$cursos->unbindModel(array('belongsTo' => array('Grupo', 'Tipo')));
			$cursos = $cursos->find('all', array('recursive' => 0, 
				'conditions' => array('Curso.' . $enumerados['Enumerado']['referencia'] => $id),
				'fields' => array('Curso.id', 'Curso.nome', 'Curso.turma', 'Curso.carga', 'Curso.sigla', 'Curso.num_turma', 'Pessoa.id', 'Pessoa.fantasia', 'Pessoa.razaosocial', 'Professor.id', 'Professor.nome', 'Periodo.id', 'Periodo.valor'),
				'order' => array('Curso.nome')));
			$cursos = $this->TransformarArray->FindInContainable('Curso', $cursos);
			$this->set(compact('cursos'));
		}
		
		if ($enumerados['Enumerado']['nome'] == 'relatorios_filtros') {
			$filtros = ClassRegistry::init('RelatoriosFiltros');
			$filtros = $filtros->find('all', array('recursive' => 0, 
				'conditions' => array('RelatoriosFiltros.' . $enumerados['Enumerado']['referencia'] => $id)));
			$filtros = $this->TransformarArray->FindInContainable('RelatoriosFiltros', $filtros);
			$this->set(compact('filtros'));
		}

		if ($enumerados['Enumerado']['nome'] == 'contapagar') {
			$contas = ClassRegistry::init('ContaPagar');
			$contas = $contas->find('all', array('recursive' => 0, 'order' => array('ContaPagar.vencimento'),
				'conditions' => array('ContaPagar.' . $enumerados['Enumerado']['referencia'] => $id),
				'fields' => array('ContaPagar.id', 'ContaPagar.documento', 'Professor.id', 'Professor.nome', 'Pessoa.id', 'Pessoa.razaosocial', 'ContaPagar.valor', 'ContaPagar.vencimento', 'ContaPagar.pagamento')
				));
			$contas = $this->TransformarArray->FindInContainable('ContaPagar', $contas);
			$this->set(compact('contas'));
		}

		if ($enumerados['Enumerado']['nome'] == 'professor') {
			$professores = ClassRegistry::init('Professor');
			$professores = $professores->find('all', array('recursive' => 0, 'order' => array('Professor.nome'),
				'conditions' => array('Professor.' . $enumerados['Enumerado']['referencia'] => $id),
				'fields' => array('Professor.id', 'Professor.nome', 'Professor.celular', 'Professor.email', 'Cidade.id', 'Cidade.nome'),
				'order' => array('Professor.nome')
				));
			$professores = $this->TransformarArray->FindInContainable('Professor', $professores);
			$this->set(compact('professores'));
		}

		if ($enumerados['Enumerado']['nome'] == 'mensalidade') {
			$mensalidades = ClassRegistry::init('Mensalidade');

			$options = array('recursive' => 0, 'conditions' => array('Mensalidade.' . $enumerados['Enumerado']['referencia'] => $id), 'limit' => 2000, 
			'fields' => array('Mensalidade.id', 'Mensalidade.numero', 'Mensalidade.vencimento', 'Mensalidade.liquido', 'Mensalidade.pagamento', 'Mensalidade.situacao_id', 'Aluno.id', 'Aluno.nome', 'Situacao.id', 'Situacao.valor'),
				'order' => array('Mensalidade.id desc')
			);
	
			$mensalidades->unbindModel(array('belongsTo' => array('User', 'Conta', 'Formapgto', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));

			$mensalidades = $mensalidades->find('all', $options);
			$mensalidades = $this->TransformarArray->FindInContainable('Mensalidade', $mensalidades);
			$this->set(compact('mensalidades'));
		}
		//$this->AdicionarEnumeradoSeNaoExistir(32, 'instituto', 'tipo_id', 'Instituto');
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enumerado->create();
			if ($this->Enumerado->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Enumerado->id
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
        $this->Enumerado->id = $id;
		if (!$this->Enumerado->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enumerado->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Enumerado->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('recursive' => false, 'conditions' => array('Enumerado.' . $this->Enumerado->primaryKey => $id));
			$this->request->data = $this->Enumerado->find('first', $options);
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
		$this->Enumerado->id = $id;
		if (!$this->Enumerado->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Enumerado->delete()) {
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
		$this->AdicionarEnumeradosSeNecessario();
		$this->redirect(array('action' => 'index'));
	}

/**
 * AdicionarEnumeradosSeNecessario method
 *
 * @return void
 */
 function AdicionarEnumeradosSeNecessario() {
 	$this->AdicionarEnumeradoSeNaoExistir(1, 'aluno', 'estado_civil_id', 'Casado(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(2, 'aluno', 'estado_civil_id', 'Divorciado(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(3, 'aluno', 'estado_civil_id', 'Solteiro(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(4, 'aluno', 'estado_civil_id', 'Separado(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(5, 'aluno', 'estado_civil_id', 'Viuvo(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(6, 'aluno', 'estado_civil_id', 'Amasiado(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(7, 'aluno', 'situacao_id', 'Ativo');
 	$this->AdicionarEnumeradoSeNaoExistir(8, 'aluno', 'situacao_id', 'Pendente Monografia');
 	$this->AdicionarEnumeradoSeNaoExistir(9, 'aluno', 'situacao_id', 'Desistente');
 	$this->AdicionarEnumeradoSeNaoExistir(10, 'aluno', 'situacao_id', 'Suspenso Temporariamente');
 	$this->AdicionarEnumeradoSeNaoExistir(11, 'aluno', 'situacao_id', 'Transferido');
 	$this->AdicionarEnumeradoSeNaoExistir(12, 'aluno', 'situacao_id', 'Outro');
 	$this->AdicionarEnumeradoSeNaoExistir(13, 'aluno', 'situacao_id', 'Extensão');
 	$this->AdicionarEnumeradoSeNaoExistir(14, 'aluno', 'situacao_id', 'Término de Curso');
 	$this->AdicionarEnumeradoSeNaoExistir(15, 'aluno', 'situacao_id', 'Pendente Matrícula');
 	$this->AdicionarEnumeradoSeNaoExistir(16, 'aluno', 'situacao_id', 'Término de Curso de Extensão');
 	$this->AdicionarEnumeradoSeNaoExistir(17, 'aluno', 'indicacao_id', 'Site');
 	$this->AdicionarEnumeradoSeNaoExistir(18, 'aluno', 'indicacao_id', 'Facebook');
 	$this->AdicionarEnumeradoSeNaoExistir(19, 'aluno', 'indicacao_id', 'Amigo(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(20, 'aluno', 'indicacao_id', 'Folder/Panfleto');
 	$this->AdicionarEnumeradoSeNaoExistir(21, 'aviso', 'tipo_id', 'Aviso');
 	$this->AdicionarEnumeradoSeNaoExistir(22, 'aviso', 'tipo_id', 'Material');
 	$this->AdicionarEnumeradoSeNaoExistir(23, 'aviso', 'tipo_id', 'Notícia');
 	$this->AdicionarEnumeradoSeNaoExistir(24, 'aviso', 'tipo_id', 'Vaga');
 	$this->AdicionarEnumeradoSeNaoExistir(25, 'aviso', 'tipo_id', 'Descontos');
 	$this->AdicionarEnumeradoSeNaoExistir(26, 'curso', 'tipo_id', 'Pós');
 	$this->AdicionarEnumeradoSeNaoExistir(27, 'curso', 'tipo_id', 'Extensão');
	$this->AdicionarEnumeradoSeNaoExistir(28, 'curso', 'periodo_id', 'Sabado');
	$this->AdicionarEnumeradoSeNaoExistir(29, 'curso', 'periodo_id', 'Tarde');
	$this->AdicionarEnumeradoSeNaoExistir(30, 'curso', 'periodo_id', 'Vespertino');
	$this->AdicionarEnumeradoSeNaoExistir(31, 'curso', 'periodo_id', 'Noite');
	$this->AdicionarEnumeradoSeNaoExistir(32, 'instituto', 'tipo_id', 'Instituto');
	$this->AdicionarEnumeradoSeNaoExistir(33, 'instituto', 'tipo_id', 'Instituição');
	$this->AdicionarEnumeradoSeNaoExistir(34, 'contapagar', 'tipo_id', 'Boleto');
	$this->AdicionarEnumeradoSeNaoExistir(35, 'contapagar', 'tipo_id', 'Conta Consumo');
	$this->AdicionarEnumeradoSeNaoExistir(36, 'contapagar', 'tipo_id', 'Fatura');
	$this->AdicionarEnumeradoSeNaoExistir(37, 'contapagar', 'tipo_id', 'Folha Pagamento');
	$this->AdicionarEnumeradoSeNaoExistir(38, 'contapagar', 'tipo_id', 'Nota Fiscal');
	$this->AdicionarEnumeradoSeNaoExistir(39, 'contapagar', 'tipo_id', 'Outros');
	$this->AdicionarEnumeradoSeNaoExistir(40, 'contapagar', 'tipo_id', 'Recibos');
	$this->AdicionarEnumeradoSeNaoExistir(41, 'contapagar', 'situacao_id', 'Aberto');
	$this->AdicionarEnumeradoSeNaoExistir(42, 'contapagar', 'situacao_id', 'Fechado');
	$this->AdicionarEnumeradoSeNaoExistir(43, 'contapagar', 'situacao_id', 'Parcial');
	//nao mudar esses codigos dos filtros
	$this->AdicionarEnumeradoSeNaoExistir(51, 'relatorios_filtros', 'tipo_filtro', 'Faixas de numeração');
	$this->AdicionarEnumeradoSeNaoExistir(52, 'relatorios_filtros', 'tipo_filtro', 'Faixas de string');
	$this->AdicionarEnumeradoSeNaoExistir(53, 'relatorios_filtros', 'tipo_filtro', 'Opções finitas a serem selecionadas em lista');
	$this->AdicionarEnumeradoSeNaoExistir(54, 'relatorios_filtros', 'tipo_filtro', 'Faixa de Código ID + campo adicional');
	$this->AdicionarEnumeradoSeNaoExistir(55, 'relatorios_filtros', 'tipo_filtro', 'Código ID do registro + campo adicional');
	$this->AdicionarEnumeradoSeNaoExistir(56, 'relatorios_filtros', 'tipo_filtro', 'Campo único para inteiro');
	$this->AdicionarEnumeradoSeNaoExistir(57, 'relatorios_filtros', 'tipo_filtro', 'Campo único para string');
	$this->AdicionarEnumeradoSeNaoExistir(58, 'relatorios_filtros', 'tipo_filtro', 'Faixas de datas');
	$this->AdicionarEnumeradoSeNaoExistir(59, 'relatorios_filtros', 'tipo_filtro', 'Data');
	$this->AdicionarEnumeradoSeNaoExistir(60, 'relatorios_filtros', 'tipo_filtro', 'Boolean');
	$this->AdicionarEnumeradoSeNaoExistir(61, 'relatorios_filtros', 'tipo_filtro', 'Faixa de valores moeda ou quantidade');
	$this->AdicionarEnumeradoSeNaoExistir(62, 'relatorios_filtros', 'tipo_filtro', 'Valor moeda ou quantidade');
	$this->AdicionarEnumeradoSeNaoExistir(63, 'relatorios_filtros', 'tipo_filtro', 'Valor percentual');
	//--
    $this->AdicionarEnumeradoSeNaoExistir(64, 'aluno', 'indicacao_id', 'Convênio');
    $this->AdicionarEnumeradoSeNaoExistir(65, 'aluno', 'indicacao_id', 'Envio SMS');
    $this->AdicionarEnumeradoSeNaoExistir(66, 'aluno', 'indicacao_id', 'Gazeta On-line-RPC');
    $this->AdicionarEnumeradoSeNaoExistir(67, 'aluno', 'indicacao_id', 'Google');
    $this->AdicionarEnumeradoSeNaoExistir(68, 'aluno', 'indicacao_id', 'Jornal');
    $this->AdicionarEnumeradoSeNaoExistir(69, 'aluno', 'indicacao_id', 'LinkedIn');
    $this->AdicionarEnumeradoSeNaoExistir(70, 'aluno', 'indicacao_id', 'Mala Direta');
    $this->AdicionarEnumeradoSeNaoExistir(71, 'aluno', 'indicacao_id', 'Outdoor');
    $this->AdicionarEnumeradoSeNaoExistir(72, 'aluno', 'indicacao_id', 'Peixe Urbano');
    $this->AdicionarEnumeradoSeNaoExistir(73, 'aluno', 'indicacao_id', 'Programa Educa Mais Brasil');
    $this->AdicionarEnumeradoSeNaoExistir(74, 'aluno', 'indicacao_id', 'Rádio');
    $this->AdicionarEnumeradoSeNaoExistir(75, 'aluno', 'indicacao_id', 'TV');
    $this->AdicionarEnumeradoSeNaoExistir(76, 'aluno', 'indicacao_id', 'Outros');

    $this->AdicionarEnumeradoSeNaoExistir(77, 'professor', 'resumo_titulacao_id', 'Graduado(a)');
    $this->AdicionarEnumeradoSeNaoExistir(78, 'professor', 'resumo_titulacao_id', 'Mestre(a)');
    $this->AdicionarEnumeradoSeNaoExistir(79, 'professor', 'resumo_titulacao_id', 'Doutor(a)');
    $this->AdicionarEnumeradoSeNaoExistir(80, 'professor', 'resumo_titulacao_id', 'Pós-Doutor(a)');
    $this->AdicionarEnumeradoSeNaoExistir(81, 'professor', 'resumo_titulacao_id', 'Especialista');

    $this->AdicionarEnumeradoSeNaoExistir(85, 'mensalidade', 'situacao_id', 'Aberto');
    $this->AdicionarEnumeradoSeNaoExistir(86, 'mensalidade', 'situacao_id', 'Fechado');
    
	$this->Session->setFlash(__('Os enumerados foram atualizados.'), 'flash/success');
 }

/**
 * AdicionarEnumeradoSeNaoExistir method
 * @param int $id
 * @param string $nomeDaTabela
 * @param string $referencia
 * @param string $valor
 * @param boolean $valor
 * @return void
 */
 	function AdicionarEnumeradoSeNaoExistir($id, $nome, $referencia, $valor, $ativo = true) {
        
        $cadastro=[];
        $cadastro['Enumerado']['id'] = $id;
        $cadastro['Enumerado']['nome'] = $nome;
		$cadastro['Enumerado']['referencia'] = $referencia;
		$cadastro['Enumerado']['valor'] = $valor;
		$cadastro['Enumerado']['is_ativo'] = $ativo;
		
		$this->Enumerado->create();
		$this->Enumerado->save($cadastro);
		
		if (! $this->Enumerado->save($cadastro)) {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), "flash/linked/error", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Enumerado->id
           		)
        	));
			$this->redirect(array('action' => 'index'));
		}
 	}

  public function excel (){
 	$this->layout='excel';
	$this->Enumerado->recursive = 0;
    $this->set('posts', $this->Enumerado->find('all'));
}

}

