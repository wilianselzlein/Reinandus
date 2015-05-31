<?php
App::uses('AppController', 'Controller');
App::import('Component', 'GeraContratoComponent');

/**
 * Contratos Controller
 *
 * @property Contrato $Contrato
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContratosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'GeraContrato');


/**
 * contrato method
 *
 * @return void
 */
  public function contrato() {
    if ($this->request->is('post') || $this->request->is('put')) {
        $data = $this->request->data;
        $this->GeraContrato->setData($data);

        header('Content-type: application/rtf');
        header('Content-Disposition: inline, filename=Contrato.rtf');

        echo $this->GeraContrato->Gerar();
    }
  }
/**
 * aluno method
 *
 * @return void
 */
	public function aluno() {
    $this->contrato();
		$contas = $this->Contrato->Conta->find('list');
		$alunos = $this->Contrato->Aluno->find('list');
		$formapgtos = $this->Contrato->Formapgto->find('list');
		$users = $this->Contrato->User->find('list');
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * professor method
 *
 * @return void
 */
	public function professor() {
    $this->contrato();
    $professores = $this->Contrato->Professor->find('list');
    $disciplinas = $this->Contrato->Disciplina->find('list');
    $this->set(compact('professores', 'disciplinas'));
	}

}
