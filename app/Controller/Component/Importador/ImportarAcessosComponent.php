<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarAcessosComponent extends ImportadorBaseComponent {

	var $Alunos;

	public function PassaValores($parametro) {

		$dados = [];
		$dados['aluno_id'] = $this->VerificarAlunoExiste($parametro['ALUACEALUNO']);
		$dados['datahora'] = $parametro['ALUACEDATA'] . ' ' . $parametro['ALUACEHORA'];
		$this->SalvarDados($dados);
	}
	public function Configurar() {
		$this->setModel('Acesso');
		$this->setSqlConsulta('Select * from TAlunoAcesso');
		$this->setCheckBox('Acessos');
		$this->CarregarArrayDeAlunos();
	}

	private function CarregarArrayDeAlunos() {
		$Aluno = ClassRegistry::init('Aluno');
		$this->Alunos = $Aluno->find('list', array('fields' => 'id', 'order' => 'id'));
	}

	private function VerificarAlunoExiste($parametro) {
		if (in_array($parametro, $this->Alunos) && (! is_null($parametro)))
			return $parametro;
		else
			return $this->Alunos[1];
	}


}

?>
