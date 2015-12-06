<?php 
App::uses('AppHelper', 'View/Helper'); 

class DisplayFieldHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	private function GetModelByController($controller) {
		$return = Inflector::classify($controller);
		if ($return == 'Usuario')
			$return = 'User';
		return $return;

	}

	private function GetController($controller) {
		if (($controller == 'Periodo') || ($controller == 'Situacao') || ($controller == 'Tipo'))
			return 'Enumerados';
		else
			return $controller;
	}

	public function MakeLink($array, $controller, $field_id) { 
		//$controller = $this->GetController($controller);
		$model = $this->GetModelByController($controller);
		$model_controller = $this->GetModelByController($this->GetController($controller));
		$class = ClassRegistry::init($model_controller);
		//debug($array[$model]);
		if (isset($array[$model])) {
			//debug($array[$model]);
			if (isset($array[$model][$class->primaryKey])) {
				$id = $array[$model][$class->primaryKey];
			  
				echo $this->Html->link($array[$model][$class->displayField], 
					array('controller' => $this->GetController($controller), 'action' => 'view', $id), 
					array('class' => '')) . '&nbsp;';
			}
		} else {
			$id = $array[$field_id];
			if (is_null($id)) return;
			$data = $class->find('first', array('conditions' => array($this->GetModelByController($this->GetController($model)) . '.' . $class->primaryKey => $id),
				'recursive' => false, 'fields' => array($class->displayField, $class->primaryKey)));
			$display = $data[$model][$class->displayField];
			echo $this->Html->link($display, array('controller' => $this->GetController($controller), 'action' => 'view', $id), array('class' => '')) . '&nbsp;';
		}
	}
} 

?>