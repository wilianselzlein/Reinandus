<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarGruposComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {
		$dados = [];
		$dados['id'] = $parametro['GRUCOD'];
		$dados['nome'] = $this->FormatarValorEncode($parametro['GRUNOME']);
		
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Grupo');
		$this->setSqlConsulta('Select * from TGrupoCurso');
		$this->setCheckBox('Grupos');
	}

}

?>


