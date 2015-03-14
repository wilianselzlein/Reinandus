<?php
App::uses('AppController', 'Controller');
App::import('Controller/Component/Importador', 
	array('ImportarProgramasComponent', 'ImportarPlanosDeContaComponent', 'ImportarHistoricoPadraoComponent'));

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

		$this->ConexaoFirebird->setCaminhoBanco($caminho);
		$this->ConexaoFirebird->Conectar();
		
		$ImportarProgramas = new ImportarProgramasComponent(new ComponentCollection());
		$ImportarPlanosDeConta = new ImportarPlanosDeContaComponent(new ComponentCollection());
		$ImportarHistoricoPadrao = new ImportarHistoricoPadraoComponent(new ComponentCollection());

		$ImportarProgramas->Importar($this->ConexaoFirebird, $data);
		$ImportarPlanosDeConta->Importar($this->ConexaoFirebird, $data);
		$ImportarHistoricoPadrao->Importar($this->ConexaoFirebird, $data);

		unset($this->ConexaoFirebird);

		$this->Session->setFlash(__('Importação Finalizada.'), 'flash/success');
		$this->redirect(array('action' => 'index'));
	}

}

