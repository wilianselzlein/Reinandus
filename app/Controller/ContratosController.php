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
 * aluno method
 *
 * @return void
 */
	public function aluno() {
    if ($this->request->is('post') || $this->request->is('put')) {
        $data = $this->request->data;
 
        header('Content-type: application/msword');
        header('Content-Disposition: inline, filename=Contrato');

        $this->GeraContrato->setData($data);
        echo $this->GeraContrato->Gerar();
		}
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
    if ($this->request->is('post') || $this->request->is('put')) {
        /*$data = $this->request->data;
        $data = $data['Mensalidade'];

        $numero = 1;
        $quantidade = (float)$data['quantidade'];
        while ($numero <= $quantidade) {
          $mensalidade = $data;
          $mensalidade['numero'] = $numero;

          $this->Mensalidade->create();
          $this->Mensalidade->save($mensalidade);
          $numero++;
        }
        $this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
          "link_text" => __('GO_TO'),
          "link_url" => array(                  
          "action" => "view",
          $this->Acesso->id
        )));
        $this->redirect(array('action' => 'index'));*/
      $this->Session->setFlash(__('Contrato gerado.'), 'flash/success');
    }
    $professores = $this->Contrato->Professor->find('list');
    $disciplinas = $this->Contrato->Disciplina->find('list');
    $this->set(compact('professores', 'disciplinas'));
	}

}
