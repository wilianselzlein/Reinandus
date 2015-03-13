<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component', 'ImportadorBaseComponent');

App::import('Controller/Component/DecoratorFormatador', 
	array('FormatarEncode', 'FormatarMinusculo', 'FormatarHumanize', 'FormatarRetirar'));

class ImportarProgramasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['PROCOD'];

		$nome = $parametro['PRONOME'];
		$enc = new FormatarEncode($nome);
		$min = new FormatarMinusculo($nome);
		$hum = new FormatarHumanize($nome);
		$ret = new FormatarRetirar($nome);
		$nome = $ret->Retirar('Cadastro De ');
		$nome = $ret->Retirar('Cadastro Do ');

		$dados['nome'] = $nome;
		$dados['is_cadastro'] = True;

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Programa');
		$this->setSqlConsulta('Select * from TPrograma');
		$this->setCheckBox('Programas');
	}

}

?>


