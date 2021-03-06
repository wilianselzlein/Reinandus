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
		'ImportarMensalidadesComponent', 'ImportarLogosComponent'));

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

			//$Programas = new ImportarProgramasComponent($this->ConexaoFirebird, $data); //new ComponentCollection()
			$PlanosDeConta = new ImportarPlanosDeContaComponent($this->ConexaoFirebird, $data);
			$HistoricoPadrao = new ImportarHistoricoPadraoComponent($this->ConexaoFirebird, $data);
			$Estados = new ImportarEstadosComponent($this->ConexaoFirebird, $data);
			$Cidades = new ImportarCidadesComponent($this->ConexaoFirebird, $data);
			$Grupos = new ImportarGruposComponent($this->ConexaoFirebird, $data);
			$Usuarios = new ImportarUsuariosComponent($this->ConexaoFirebird, $data);
			$Disciplinas = new ImportarDisciplinasComponent($this->ConexaoFirebird, $data);
			//$Parametros = new ImportarParametrosComponent($this->ConexaoFirebird, $data);
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
			$Logos = new ImportarLogosComponent($this->ConexaoFirebird, $data);

			$this->Session->setFlash(__('Importação Finalizada. <br>' . 
				//$Programas->GerarRelatorio() .
				$PlanosDeConta->GerarRelatorio() .
				$HistoricoPadrao->GerarRelatorio() .
				$Estados->GerarRelatorio() .
				$Cidades->GerarRelatorio() .
				$Grupos->GerarRelatorio() .
				$Usuarios->GerarRelatorio() .
				$Disciplinas->GerarRelatorio() .
				//$Parametros->GerarRelatorio() .
				$FormasDePagamento->GerarRelatorio() .
				$Contas->GerarRelatorio() .
				$LancamentoContabil->GerarRelatorio() .
				$Pessoas->GerarRelatorio() .
				$Cursos->GerarRelatorio() .
				$Professor->GerarRelatorio() .
				$Aluno->GerarRelatorio() .
				$Acesso->GerarRelatorio() .
				$CursosDisciplinas->GerarRelatorio() .
				$DisciplinasProfessores->GerarRelatorio() .
				$Avisos->GerarRelatorio() .
				$AvisosCursos->GerarRelatorio() .
				$AlunosDisciplinas->GerarRelatorio() .
				$Detalhes->GerarRelatorio() .
				$Mensalidades->GerarRelatorio() .
				$Logos->GerarRelatorio()
			), 'flash/success');

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
				//$this->count($this->ConexaoFirebird, $dados, 'Estado', 'TEstado');
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
				$this->count($this->ConexaoFirebird, $dados, 'Logo', 'TNetworking');

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

/*
delete from acesso;
delete from detalhe;
delete from conta_pagar;
delete from lancamento_contabil;
delete from mensalidade;
delete from disciplina_professor;
delete from curso_disciplinas;
delete from aviso_grupos;
delete from aviso_cursos;
delete from avisos;
delete from aluno_disciplinas;
delete from aluno;
delete from curso;
delete from professor;
delete from pessoa;
where id not in (select pessoa_id from user) 
and id not in (select diretor_id from instituto)
and id not in (select empresa_id from instituto);
delete from cidade where id not in (select cidade_id from pessoa);

ALTER TABLE acesso AUTO_INCREMENT = 1;
ALTER TABLE detalhe AUTO_INCREMENT = 1;
ALTER TABLE mensalidade AUTO_INCREMENT = 1;
ALTER TABLE aluno_disciplinas AUTO_INCREMENT = 1;
ALTER TABLE disciplina_professor AUTO_INCREMENT = 1;
ALTER TABLE curso_disciplinas AUTO_INCREMENT = 1;
ALTER TABLE aviso_grupos AUTO_INCREMENT = 1;
ALTER TABLE aviso_cursos AUTO_INCREMENT = 1;

update logo set logo = CONCAT('logo', pessoa_id, '.jpg');

*/