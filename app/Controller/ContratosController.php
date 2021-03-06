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
  public function contrato(&$aluno_id = null, $professor = false) {
    
    if ($this->request->is('post') || $this->request->is('put')) {
        //$this->layout = false; 
        $data = $this->request->data;

        if (($aluno_id == null) && (isset($data['Contrato']['aluno_id']))) {
            $aluno_id = $data['Contrato']['aluno_id'];
        }

        if (($professor) || (! (bool) $data['Contrato']['selecionou'])) {
            $this->GeraContrato->setData($data);

            //header('Content-type: Application/rtf');
            //header('Content-Disposition: inline, filename=Contrato.rtf');

            $contrato = $this->GeraContrato->Gerar();

            $caminho = 'arqs/';
            if (isset($data['Contrato']['aluno_id'])) 
                $arquivo = $data['Contrato']['aluno_id'] . ' - ' . $data['Contrato']['modelo'];
            else
                $arquivo = $data['Contrato']['professor_id'] . ' - ' . $data['Contrato']['modelo'];

            if (file_exists($caminho . $arquivo))
                unlink($caminho . $arquivo);

            $files = glob($caminho . '/*.rtf'); //get all file names
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //delete file
            }

            $fp = fopen($caminho . $arquivo, 'a');
            if (! $fp) { //if (!is_writable($tempfile)) {
                throw new Exception(__('PERMISSAO_ARQ'));
            }
            $escreve = fwrite($fp, $contrato);
            fclose($fp);

            $this->downloadarq($caminho, $arquivo);
            //echo $contrato; 
            //die;
        }
    }
  }

/**
 * aluno method
 *
 * @return void
 */
	public function aluno($aluno_id = null) {
        $this->contrato($aluno_id);
        $curso = $this->Contrato->Aluno->RetornarDadosCursoFormContrato($aluno_id);
        $contas = $this->Contrato->Conta->findAsCombo();
        $alunos = $this->Contrato->Aluno->findAsComboCampo('Aluno.id', $aluno_id);
        $formapgtos = $this->Contrato->Formapgto->findAsCombo('asc', 'tipo <> "I"');
        $users = $this->Contrato->User->findAsCombo();
        $this->set(compact('contas', 'formapgtos', 'users', 'alunos', 'aluno_id', 'curso'));

	}

/**
 * professor method
 *
 * @return void
 */
	public function professor() {
        $this->contrato($aluno_id, true);
        $professores = $this->Contrato->Professor->findAsCombo('asc', 'Professor.cidade_id > 0');
        $disciplinas = $this->Contrato->Disciplina->findAsCombo();
        $this->set(compact('professores', 'disciplinas'));
	}

/**
 * gerencias method
 *
 * @return void
 */
	public function gerenciar() {
        if ($this->request->is('post')) {
            
            $data = $this->request->data;
            $data = $data['Cabecalho'];
            $data = $data['arquivo'];
            /*
            'name' => 'nome.rtf',
			'type' => 'application/rtf',
			'tmp_name' => '/tmp/phpxPOzQ7',
			'error' => (int) 0,
			'size' => (int) 62330
			*/
    		App::uses('File', 'Utility');
    		$nome = "contratos/".$data['name'];
    		$arquivo = new File($data['tmp_name']);
            $arquivo->copy($nome);
    		$arquivo->close();

			$this->Session->setFlash(__('The record has been saved') . ' Arquivo: ' . $nome . ' Tamanho: ' . filesize($nome) . 'b .', "flash/success");
			$this->redirect(array('action' => 'gerenciar'));
		}
	}

}
