<?php

App::uses('Component', 'Controller');

class FuncoesComponent extends Component {

	//var $CaminhoBanco;
	//private static $Usuario = 'SYSDBA';
    
/**
 * PegarMaiorNivel method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string
 * @return integer
 */
	public function PegarMaiorNivel() {
		$options = array('recursive' => false, 'fields' => array('Max(PlanoConta.Nivel) as Nivel'));
		$PlanoConta = ClassRegistry::init('PlanoConta');
		$nivel = $PlanoConta->find('first', $options);
		if (! is_null($nivel[0]['Nivel']))
			$nivel = $nivel[0]['Nivel'];
		else
			$nivel = 1;

		return $nivel;
	}

}

?>
