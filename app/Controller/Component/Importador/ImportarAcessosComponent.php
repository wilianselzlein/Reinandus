<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarAcessosComponent extends ImportadorBaseComponent {

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
/*
ALTER TABLE TALUNOACESSO ADD ALUACECODIGO INTEGER;
update tALUNOACESSO set ALUACEcodigo = 0;
update tALUNOACESSO set ALUACEcodigo = (select coalesce(max(aluacecodigo), 0) + 1 from talunoacesso);
*/
}

?>
