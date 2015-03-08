<?php
App::uses('AppController', 'Controller');
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

		$this->ConexaoFirebird->setCaminhoBanco($caminho);
		$this->ConexaoFirebird->Conectar();
		
		debug($this->ConexaoFirebird->getCaminhoBanco());


		/*$c1 = new $this->ConexaoFirebird(new ComponentCollection());
		$c1->setPrice(10);

		$c2 = new $this->ConexaoFirebird(new ComponentCollection());
		$c2->setPrice(20);

		$data = $this->request->data;
		$data = $c1->getPrice();
		debug($data); 
		
		$data = $c2->getPrice();
		debug($data); */


		die;

		/*$data = $data['Importador'];
		$professor = $data['professor_id'];
		$cursos = $data['Curso'];
		$disciplinas = $data['Disciplina'];

		$notas = $this->Importador->AlunoDisciplina->find('all', array('recursive' => 0, 'conditions' =>
			array(
				'AlunoDisciplina.professor_id' => $professor, 
				'Aluno.curso_id' => $cursos,
				'AlunoDisciplina.disciplina_id' => $disciplinas)
		));
		$this->set(compact('notas'));*/
	}

/**
 * gravar method
 *
 * @return void
 */
	public function gravar() {
		if ($this->request->is('post') || $this->request->is('put')) {

			$data = $this->request->data;
			foreach ($data as $item) {
				
				$this->Importador->AlunoDisciplina->create();
				$this->Importador->AlunoDisciplina->save($item['AlunoDisciplina']);

				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
			}
		} 
		$this->redirect(array('action' => 'index'));
	}

}

