<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarUsuariosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['username'] = $this->FormatarValorEncode($parametro['USULOGIN']);
		$dados['password'] = $this->FormatarValorEncode($parametro['USUSENHA']);
		$dados['pessoa_id'] = 1;
		$dados['role_id'] = 1;
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('User');
		$this->setSqlConsulta('Select * from Tusuario');
		$this->setCheckBox('Usuarios');
	}

}

?>


