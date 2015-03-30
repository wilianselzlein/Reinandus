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

}

