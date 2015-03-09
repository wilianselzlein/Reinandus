<?php

//App::uses('Component', 'Controller', 'ImportadorBase', 'ImportadorBaseComponent');
App::uses('Component', 'Controller/Component');

App::import('Component', 'ImportadorBaseComponent', 'ImportadorBase');

//use app\Controller\Component\ImportadorBaseComponent;

class ImportarProgramasComponent extends ImportadorBaseComponent {

 protected $_mergeParent = 'ImportadorBaseComponent';

	public function PassaValores($parametro) {
		debug($parametro);
	}

	public function Configurar() {
		$this->setModel('Programas');
		$this->setSqlConsulta('Select * from TPrograma');
		$this->setCheckBox('Programas');
			
	}

}

?>


