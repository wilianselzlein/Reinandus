<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarLogosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['empsa_id'] = $this->VerificarAlunoExiste($parametro['EMPCOD']);
		$dados['logo'] = $parametro['NETLOGO'];
		
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Logo');
		$this->setSqlConsulta(
			'Select TNetworking.NetCod, TNetworking.NetLogo
			from TNetworking
			where NetLogo is not null');
		$this->setCheckBox('Logo');
		$this->CarregarArrayDeAlunos();
	}

}

?>


