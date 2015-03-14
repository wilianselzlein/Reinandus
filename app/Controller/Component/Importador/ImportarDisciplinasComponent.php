<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarDisciplinasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['DISCOD'];
		$dados['nome'] = $this->FormatarValorEncode($parametro['DISNOME']);
		$dados['valor'] = $parametro['DISVALOR'];
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Disciplina');
		$this->setSqlConsulta('Select * from TDisciplina');
		$this->setCheckBox('Disciplinas');
	}

}

?>


