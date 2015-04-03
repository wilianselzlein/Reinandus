<?php
App::uses('AppController', 'Controller');
App::import('Controller/Component/Importador', 
	array('ImportarProgramasComponent', 'ImportarPlanosDeContaComponent', 'ImportarHistoricoPadraoComponent',
		'ImportarEstadosComponent', 'ImportarCidadesComponent', 'ImportarGruposComponent', 'ImportarUsuariosComponent',
		'ImportarDisciplinasComponent', 'ImportarParametrosComponent', 'ImportarFormasDePagamentoComponent',
		'ImportarContasComponent', 'ImportarLancamentoContabilComponent', 'ImportarPessoasComponent', 
		'ImportarCursosComponent', 'ImportarProfessorComponent', 'ImportarAlunosComponent', 'ImportarAcessosComponent',
		'ImportarCursosDisciplinasComponent', 'ImportarDisciplinasProfessoresComponent', 'ImportarAvisosComponent',
		'ImportarAvisosCursosComponent', 'ImportarAlunosDisciplinasComponent', 'ImportarDetalhesComponent',
		'ImportarMensalidadesComponent'));

/**
 * Importador Controller
 *
 * @property Importador $Importador
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ImportadorController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'ConexaoFirebird');

/** 
 * index method
 *
 * @return void
 */  
	 public function index() {}

/* *
 * importar method
 *
 * @return void
 */
	public function importar() {

		$data = $this->request->data;
		$data = $data['Importador'];
		$caminho = $data['Caminho'];

		if ($caminho == '') {
			throw new NotFoundException(__('Informe o caminho do banco de dados Firebird.'));
		}
		try {
			$this->ConexaoFirebird->setCaminhoBanco($caminho);
			$this->ConexaoFirebird->Conectar();

			$Programas = new ImportarProgramasComponent($this->ConexaoFirebird, $data); //new ComponentCollection()
			$PlanosDeConta = new ImportarPlanosDeContaComponent($this->ConexaoFirebird, $data);
			$HistoricoPadrao = new ImportarHistoricoPadraoComponent($this->ConexaoFirebird, $data);
			$Estados = new ImportarEstadosComponent($this->ConexaoFirebird, $data);
			$Cidades = new ImportarCidadesComponent($this->ConexaoFirebird, $data);
			$Grupos = new ImportarGruposComponent($this->ConexaoFirebird, $data);
			$Usuarios = new ImportarUsuariosComponent($this->ConexaoFirebird, $data);
			$Disciplinas = new ImportarDisciplinasComponent($this->ConexaoFirebird, $data);
			$Parametros = new ImportarParametrosComponent($this->ConexaoFirebird, $data);
			$FormasDePagamento = new ImportarFormasDePagamentoComponent($this->ConexaoFirebird, $data);
			$Contas = new ImportarContasComponent($this->ConexaoFirebird, $data);
			$LancamentoContabil = new ImportarLancamentoContabilComponent($this->ConexaoFirebird, $data);
			$Pessoas = new ImportarPessoasComponent($this->ConexaoFirebird, $data);
			$Cursos = new ImportarCursosComponent($this->ConexaoFirebird, $data);
			$Professor = new ImportarProfessorComponent($this->ConexaoFirebird, $data);
			$Aluno = new ImportarAlunosComponent($this->ConexaoFirebird, $data);
			$Acesso = new ImportarAcessosComponent($this->ConexaoFirebird, $data);
			$CursosDisciplinas = new ImportarCursosDisciplinasComponent($this->ConexaoFirebird, $data);
			$DisciplinasProfessores = new ImportarDisciplinasProfessoresComponent($this->ConexaoFirebird, $data);
			$Avisos = new ImportarAvisosComponent($this->ConexaoFirebird, $data);
			$AvisosCursos = new ImportarAvisosCursosComponent($this->ConexaoFirebird, $data);
			$AlunosDisciplinas = new ImportarAlunosDisciplinasComponent($this->ConexaoFirebird, $data);
			$Detalhes = new ImportarDetalhesComponent($this->ConexaoFirebird, $data);
			$Mensalidades = new ImportarMensalidadesComponent($this->ConexaoFirebird, $data);

			$this->Session->setFlash(__('Importação Finalizada.'), 'flash/success');

		} catch(Exception $e) {
			$this->Session->setFlash(__('Erro na Importação: ' . $e->getMessage()), 'flash/error');
		}
		unset($this->ConexaoFirebird);
		$this->redirect(array('action' => 'index'));

	}

/* *
 * relatorio method
 *
 * @return void
 */
	public function relatorio() {
		$data = $this->request->data;
		$caminho = NULL;
		if (isset($data['Importador']['Caminho']))
		{
			$caminho = $data['Importador']['Caminho'];
		}
		$dados = [];
				
		if (! is_null($caminho)) {
			try {
				$this->ConexaoFirebird->setCaminhoBanco($caminho);
				$this->ConexaoFirebird->Conectar();

				$this->count($this->ConexaoFirebird, $dados, 'Programa', 'TPrograma');
				$this->count($this->ConexaoFirebird, $dados, 'Cidade', 'TCidade');
				$this->count($this->ConexaoFirebird, $dados, 'Grupo', 'TGrupoCurso');
				$this->count($this->ConexaoFirebird, $dados, 'User', 'TUsuario');
				$this->count($this->ConexaoFirebird, $dados, 'Disciplina', 'TDisciplina');
				$this->count($this->ConexaoFirebird, $dados, 'Disciplina', 'TDisciplina');
				$this->count($this->ConexaoFirebird, $dados, 'Aluno', 'TAluno');
				$this->count($this->ConexaoFirebird, $dados, 'Acesso', 'TAlunoAcesso');
				$this->count($this->ConexaoFirebird, $dados, 'Professor', 'TProfessor');
				$this->count($this->ConexaoFirebird, $dados, 'Curso', 'TCurso');
				$this->count($this->ConexaoFirebird, $dados, 'Mensalidade', 'TMensalidade');
				$this->count($this->ConexaoFirebird, $dados, 'HistoricoPadrao', 'THistPadrao');
				$this->count($this->ConexaoFirebird, $dados, 'PlanoConta', 'TPlanoConta');
				$this->count($this->ConexaoFirebird, $dados, 'LancamentoContabil', 'TLctoContabil');
				$this->count($this->ConexaoFirebird, $dados, 'Formapgto', 'TFormaPgto');
				$this->count($this->ConexaoFirebird, $dados, 'Conta', 'TBanco');
				$this->count($this->ConexaoFirebird, $dados, 'Pessoa', 'TNetworking');
				$this->count($this->ConexaoFirebird, $dados, 'Parametro', 'TParametro');
				$this->count($this->ConexaoFirebird, $dados, 'CursoDisciplina', 'TCursoDisciplina');
				$this->count($this->ConexaoFirebird, $dados, 'DisciplinaProfessor', 'TProfessorDisciplina');
				$this->count($this->ConexaoFirebird, $dados, 'Aviso', 'TAviso');
				$this->count($this->ConexaoFirebird, $dados, 'AvisoCurso', 'TAvisoCurso');
				$this->count($this->ConexaoFirebird, $dados, 'AlunoDisciplina', 'TAlunoDisciplina');
				$this->count($this->ConexaoFirebird, $dados, 'Detalhe', 'TAluno');

			} catch(Exception $e) {
				$this->Session->setFlash(__('Erro na conexão: ' . $e->getMessage()), 'flash/error');
			}
			unset($this->ConexaoFirebird);
		}
		$this->set(compact('dados'));
	}

/* *
 * count method
 *
 * @return void
 */
	private function count($conexao, &$array, $model, $tabela) {
		
		$Class = ClassRegistry::init($model);
		$array[$model]['total'] = $Class->find('count');

		$Consulta = $conexao->ConsultarSQL('select count(1) as total from ' . $tabela);
		while ($registro = ibase_fetch_object ($Consulta)) { 
			$array[$model]['de'] = $registro->TOTAL;
		}
	}

}

