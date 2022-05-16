<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarProgramasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['PROCOD'];
		$dados['nome'] = $this->FormatarNome($parametro['PRONOME']);
		$dados['is_cadastro'] = True;

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Programa');
		$this->setSqlConsulta('Select * from TPrograma');
		$this->setCheckBox('Programas');
	}

	private function FormatarNome($nome){
		$enc = new FormatarEncode($nome);
		$min = new FormatarMinusculo($nome);
		$hum = new FormatarHumanize($nome);
		$ret = new FormatarRetirar($nome);
		$nome = $ret->Retirar('Cadastro De ');
		$nome = $ret->Retirar('Cadastro Do ');
		return $nome;
	}

}

?>


