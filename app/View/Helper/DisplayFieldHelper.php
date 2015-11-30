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

	public function MakeLink($array, $controller, $field_id) { 

		if (($controller == 'periodo') || ($controller == 'situacao'))
			$controller = 'Enumerados';

		$model = $this->GetModelByController($controller);
		$class = ClassRegistry::init($model);
		if (isset($array[$model])) {
			if (isset($array[$model][$class->primaryKey])) {
				$id = $array[$model][$class->primaryKey];
				echo $this->Html->link($array[$model][$class->displayField], 
					array('controller' => $controller, 'action' => 'view', $id), 
					array('class' => '')) . '&nbsp;';
			}
		} else {
			$id = $array[$field_id];
			if (is_null($id)) return;
			
			$data = $class->find('first', array('conditions' => array($model . '.' . $class->primaryKey => $id),
				'recursive' => false, 'fields' => array($class->displayField, $class->primaryKey)));
			
			$display = $data[$model][$class->displayField];
			echo $this->Html->link($display, array('controller' => $controller, 'action' => 'view', $id), array('class' => '')) . '&nbsp;';
			
		}
	}
} 

?>