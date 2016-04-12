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
        //$this->layout = false;
      
        $data = $this->request->data;
        $this->GeraContrato->setData($data);

        //header('Content-type: application/rtf');
        //header('Content-Disposition: inline, filename=Contrato.rtf');

        $contrato = $this->GeraContrato->Gerar();
        
        $caminho = 'arqs/';
        if (isset($data['Contrato']['aluno_id'])) 
            $arquivo = $data['Contrato']['aluno_id'] . ' - ' . $data['Contrato']['modelo'];
        else
            $arquivo = $data['Contrato']['professor_id'] . ' - ' . $data['Contrato']['modelo'];

        $fp = fopen($caminho . $arquivo, 'a');
        $escreve = fwrite($fp, $contrato);
        fclose($fp);

        $this->download($caminho, $arquivo);
        //echo $contrato; 
        //die;
    }
  }

/**
 * aluno method
 *
 * @return void
 */
	public function aluno() {
        $this->contrato();
		$contas = $this->Contrato->Conta->findAsCombo();
		$alunos = $this->Contrato->Aluno->findAsCombo();
        $formapgtos = $this->Contrato->Formapgto->findAsCombo('asc', 'tipo <> "I"');
		$users = $this->Contrato->User->findAsCombo();
		$this->set(compact('contas', 'formapgtos', 'users', 'alunos'));
	}

/**
 * professor method
 *
 * @return void
 */
	public function professor() {
        $this->contrato();
        $professores = $this->Contrato->Professor->findAsCombo('asc', 'Professor.cidade_id > 0');
        $disciplinas = $this->Contrato->Disciplina->findAsCombo();
        $this->set(compact('professores', 'disciplinas'));
	}


/**
 * download method
 *
 * @return void
 */
	public function download($caminho, $arquivo) {
        $this->response->file($caminho . $arquivo, array('download' => true, 'name' => $arquivo));
        return $this->response;
	}

}
