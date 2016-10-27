<?php
App::uses('AppController', 'Controller');

/**
 * Boletos Controller
 *
 * @property Boleto $Boleto
 * @property SessionComponent $Session
 */
 
class BoletosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session', 'GeraArquivoIntegracaoBancaria');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		/*$cursos = $this->Nota->Curso->findAsCombo();
		$this->set(compact('cursos', ''));*/
	}

/**
 * remessa method
 *
 * @return void
 */
	public function remessa($remessa) {

        $caminho = 'arqs/';
        $arquivo = 'NOME.TST';

        if (file_exists($caminho . $arquivo))
            unlink($caminho . $arquivo);

        $fp = fopen($caminho . $arquivo, 'a');
        if (! $fp) { //if (!is_writable($tempfile)) {
            throw new Exception(__('PERMISSAO_ARQ'));
        }
        $escreve = fwrite($fp, $remessa);
        fclose($fp);

        $this->download($caminho, $arquivo);
	}

/**
 * gerar method
 *
 * @return void
 */
	public function gerar() {
		$data = $this->request->data;
		//debug($data); die;

		if (! isset($data['Boleto']))
			$this->redirect(array('action' => 'index'));

		$mensalidades = $this->Boleto->Mensalidade->find('all', array('recursive' => false, 
			'conditions' =>	array('Mensalidade.vencimento >= ' => $data['Boleto']['vencimento_inicial'], 'Mensalidade.vencimento <= ' => $data['Boleto']['vencimento_final'], 'Mensalidade.pago' => 0.00),
			'fields' => array('Mensalidade.id', 'Aluno.id', 'Aluno.nome'),
			'order' => array('Mensalidade.Id')));

		if (count($mensalidades) == 0) {
			$this->Session->setFlash(
				__('Nenhuma mensalidade para o período informado.'), 'flash/error');
			$this->redirect(array('action' => 'index'));
		}

		$this->GeraArquivoIntegracaoBancaria->setData($mensalidades);
		$remessa = $this->GeraArquivoIntegracaoBancaria->gerar();
		$this->remessa($remessa);

		$this->Session->setFlash(__('Arquivo gerado com sucesso! ' . count($mensalidades) . ' mensalidade(s).'), 
			'flash/success');
		$this->redirect(array('action' => 'index'));
	}


/**
 * retorno method
 *
 * @return void
 */
	public function retorno() {
		/*$data = $this->request->data;
		if (! isset($data['Nota']))
			$this->redirect(array('action' => 'index'));
		$data = $data['Nota'];
		//$professor = $data['professor_id'];
		$cursos = $data['Curso'];
		$disciplinas = $data['Disciplina'];

		$ativos_id = 7;

		$notas = $this->Nota->AlunoDisciplina->find('all', array('recursive' => false, 'conditions' =>
			array('Aluno.curso_id' => $cursos, 'AlunoDisciplina.disciplina_id' => $disciplinas, 'Aluno.situacao_id' => $ativos_id),
			'fields' => array('AlunoDisciplina.id', 'AlunoDisciplina.aluno_id', 'AlunoDisciplina.disciplina_id', 'AlunoDisciplina.professor_id', 'AlunoDisciplina.frequencia', 
				'AlunoDisciplina.nota', 'AlunoDisciplina.horas_aula', 'AlunoDisciplina.data', 'Aluno.id', 'Aluno.nome', 'Disciplina.id', 'Disciplina.nome', 'Professor.id', 'Professor.nome'),
				'order' => array('Aluno.Nome')));
		if (count($notas) == 0) {
			$this->Session->setFlash(
				__('Nenhum aluno ativo para a(s) disciplina(s) e curso(s) selecionado(s).'), 'flash/error');
			$this->redirect(array('action' => 'index'));
		}
		$professores = $this->Nota->Professor->findAsCombo();
		$this->set(compact('notas', 'professores', 'cursos', 'disciplinas')); //'professor',*/
	}

/**
 * processar method
 *
 * @return void
 */
	public function processar() {
		if ($this->request->is('post') || $this->request->is('put')) {

			$data = $this->request->data;
			/*//debug($data); die;
			foreach ($data as $item) {
				//debug($item['AlunoDisciplina']); die;
				$this->Nota->AlunoDisciplina->create();
				$this->Nota->AlunoDisciplina->save($item['AlunoDisciplina']);

				$this->Session->setFlash(__('The record has been saved'), 'flash/success');
			}*/
		} 
		$this->redirect(array('action' => 'index'));
	}

}

