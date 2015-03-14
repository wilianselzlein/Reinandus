<?php
App::uses('AppController', 'Controller');
App::import('Controller/Component/Importador', 
	array('ImportarProgramasComponent', 'ImportarPlanosDeContaComponent', 'ImportarHistoricoPadraoComponent',
		'ImportarEstadosComponent', 'ImportarCidadesComponent', 'ImportarGruposComponent', 'ImportarUsuariosComponent',
		'ImportarDisciplinasComponent', 'ImportarParametrosComponent', 'ImportarFormasDePagamentoComponent',
		'ImportarContasComponent', 'ImportarLancamentoContabilComponent'));

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
			
			$ImportarProgramas = new ImportarProgramasComponent($this->ConexaoFirebird, $data); //new ComponentCollection()
			$ImportarPlanosDeConta = new ImportarPlanosDeContaComponent($this->ConexaoFirebird, $data);
			$ImportarHistoricoPadrao = new ImportarHistoricoPadraoComponent($this->ConexaoFirebird, $data);
			$ImportarEstados = new ImportarEstadosComponent($this->ConexaoFirebird, $data);
			$ImportarCidades = new ImportarCidadesComponent($this->ConexaoFirebird, $data);
			$ImportarGrupos = new ImportarGruposComponent($this->ConexaoFirebird, $data);
			$ImportarUsuarios = new ImportarUsuariosComponent($this->ConexaoFirebird, $data);
			$ImportarDisciplinas = new ImportarDisciplinasComponent($this->ConexaoFirebird, $data);
			$ImportarParametros = new ImportarParametrosComponent($this->ConexaoFirebird, $data);
			$ImportarFormasDePagamento = new ImportarFormasDePagamentoComponent($this->ConexaoFirebird, $data);
			$ImportarContas = new ImportarContasComponent($this->ConexaoFirebird, $data);
			$ImportarLancamentoContabil = new ImportarLancamentoContabilComponent($this->ConexaoFirebird, $data);

			$this->Session->setFlash(__('Importação Finalizada.'), 'flash/success');

		} catch(Exception $e) {
			$this->Session->setFlash(__('Erro na Importação: ' . $e->getMessage()), 'flash/error');
		} 
		unset($this->ConexaoFirebird);
		$this->redirect(array('action' => 'index'));

	}

}

