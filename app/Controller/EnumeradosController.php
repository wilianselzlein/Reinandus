<?php
App::uses('AppController', 'Controller');
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
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enumerado->recursive = 0;
    	$this->Paginator->settings = array('limit' => 50);
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
		$options = array('recursive' => 2, 'conditions' => array('Enumerado.' . $this->Enumerado->primaryKey => $id));
		$this->set('enumerado', $this->Enumerado->find('first', $options));
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
			$options = array('conditions' => array('Enumerado.' . $this->Enumerado->primaryKey => $id));
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
 	$this->AdicionarEnumeradoSeNaoExistir(15, 'aluno', 'situacao_id', 'Término de Curso de Extensão');
 	$this->AdicionarEnumeradoSeNaoExistir(16, 'aluno', 'indicacao_id', 'Site');
 	$this->AdicionarEnumeradoSeNaoExistir(17, 'aluno', 'indicacao_id', 'Facebook');
 	$this->AdicionarEnumeradoSeNaoExistir(18, 'aluno', 'indicacao_id', 'Amigo(a)');
 	$this->AdicionarEnumeradoSeNaoExistir(19, 'aluno', 'indicacao_id', 'Folder/Panfleto');
 	$this->AdicionarEnumeradoSeNaoExistir(20, 'aviso', 'tipo_id', 'Aviso');
 	$this->AdicionarEnumeradoSeNaoExistir(21, 'aviso', 'tipo_id', 'Material');
 	$this->AdicionarEnumeradoSeNaoExistir(22, 'aviso', 'tipo_id', 'Notícia');
 	$this->AdicionarEnumeradoSeNaoExistir(23, 'aviso', 'tipo_id', 'Vaga');
 	$this->AdicionarEnumeradoSeNaoExistir(24, 'aviso', 'tipo_id', 'Interno');
 	$this->AdicionarEnumeradoSeNaoExistir(25, 'curso', 'tipo_id', 'Pós');
 	$this->AdicionarEnumeradoSeNaoExistir(26, 'curso', 'tipo_id', 'Extensão');
	$this->AdicionarEnumeradoSeNaoExistir(27, 'curso', 'periodo_id', 'Manhã');
	$this->AdicionarEnumeradoSeNaoExistir(28, 'curso', 'periodo_id', 'Tarde');
	$this->AdicionarEnumeradoSeNaoExistir(29, 'curso', 'periodo_id', 'Vespertino');
	$this->AdicionarEnumeradoSeNaoExistir(30, 'curso', 'periodo_id', 'Noite');
	$this->AdicionarEnumeradoSeNaoExistir(31, 'instituto', 'tipo_id', 'Instituto');
	$this->AdicionarEnumeradoSeNaoExistir(32, 'instituto', 'tipo_id', 'Instituição');

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

}

