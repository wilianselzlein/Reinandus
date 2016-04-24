<?php
App::uses('AppController', 'Controller');
/**
 * Parametros Controller
 *
 * @property Parametro $Parametro
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ParametrosController extends AppController {

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
		$this->Filter->addFilters(array('filter1' => array('OR' => $this->AdicionarFiltrosLike($this->Parametro))));
		$this->Filter->setPaginate('order', array('Parametro.id' => 'desc')); 
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		$this->Parametro->recursive = 0;
		$this->set('parametros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parametro->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Parametro.' . $this->Parametro->primaryKey => $id));
		$this->set('parametro', $this->Parametro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parametro->create();
			if ($this->Parametro->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Parametro->id
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
        $this->Parametro->id = $id;
		if (!$this->Parametro->exists($id)) {
			throw new NotFoundException(__('The record could not be found.?>'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Parametro->save($this->request->data)) {
				$this->Session->setFlash(__('The record has been saved'), "flash/linked/success", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(                  
                  "action" => "view",
                  $this->Parametro->id
               )
            ));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Parametro.' . $this->Parametro->primaryKey => $id));
			$this->request->data = $this->Parametro->find('first', $options);
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
		$this->Parametro->id = $id;
		if (!$this->Parametro->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Parametro->delete()) {
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
		$this->AdicionarPararametrosSeNecessario();
		$this->redirect(array('action' => 'index'));
	}

/**
 * AdicionarParametrosSeNecessario method
 *
 * @return void
 */
 private function AdicionarPararametrosSeNecessario() {
 	$this->AdicionarParametroSeNaoExistir(1, 'Bloquear Alunos Com Codigo Menores', '0');
 	$this->AdicionarParametroSeNaoExistir(2, 'Bloq Alteracoes Antes Da Data', '01/01/2016');
 	$this->AdicionarParametroSeNaoExistir(3, 'Dia Limite Desconto', '12');
 	$this->AdicionarParametroSeNaoExistir(4, 'Mascara Plano De Contas?', '9.9.99.99.999');
 	$this->AdicionarParametroSeNaoExistir(5, 'Filtro Data Inicial Lctocontabil?', '01/01/2015');
    $this->AdicionarParametroSeNaoExistir(6, 'Filtro Data Final Lctocontabil?', '01/01/2016');
 	$this->AdicionarParametroSeNaoExistir(7, 'Nome Sistema', 'Sistema Reinandus de Gestão');
 	$this->AdicionarParametroSeNaoExistir(8, 'Habilitar permissoes', 'S');
 	$this->AdicionarParametroSeNaoExistir(9, 'Debugar Relatorios', 'N');
 	$this->AdicionarParametroSeNaoExistir(10, 'Link Manual', 'http://www.facet.br/pos/espaco_aluno/download/manual_aluno_2014.pdf');
 	$this->AdicionarParametroSeNaoExistir(11, 'Habilitar pesquisa no portal', 'S');
 	$this->AdicionarParametroSeNaoExistir(12, 'Bloquer mensalidades com valor maior que', '500');
 	$this->AdicionarParametroSeNaoExistir(13, 'Habilitar SQL Debug', 'S');
 	$this->AdicionarParametroSeNaoExistir(14, 'Conta Credito Padrao', '14');
 	$this->AdicionarParametroSeNaoExistir(15, 'Histórico Padrao', '50');
 	/*$this->AdicionarParametroSeNaoExistir(16, '', '');
 	$this->AdicionarParametroSeNaoExistir(17, '', '');
 	$this->AdicionarParametroSeNaoExistir(18, '', '');
 	$this->AdicionarParametroSeNaoExistir(19, '', '');
 	$this->AdicionarParametroSeNaoExistir(20, '', '');
 	$this->AdicionarParametroSeNaoExistir(21, '', '');
 	$this->AdicionarParametroSeNaoExistir(22, '', '');*/
	$this->Session->setFlash(__('Os parametros foram atualizados.'), 'flash/success');
 }

/**
 * AdicionarParametrSoeNaoExistir method
 * @param int $id
 * @param string $nome
 * @param string $valor
 * @return void
 */
 	private function AdicionarParametroSeNaoExistir($id, $nome, $valor) {
        
        $cadastro=[];
        $cadastro['Parametro']['id'] = $id;
        $cadastro['Parametro']['nome'] = $nome;
		$cadastro['Parametro']['valor'] = $valor;

		$this->Parametro->create();
		$this->Parametro->save($cadastro);

		if (! $this->Parametro->save($cadastro)) {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'), "flash/linked/error", array(
               "link_text" => __('GO_TO'),
               "link_url" => array(
                  "action" => "view",
                  $this->Parametro->id
           		)
        	));
			$this->redirect(array('action' => 'index'));
		}
 	}

}