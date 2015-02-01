<?php 
App::uses('AppHelper', 'View/Helper'); 

class ButtonsActionsHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	function AddDivider() {
		return '<li class="divider"></li>';
	}

	function GetModelByController($controller) {
		$return = Inflector::classify($controller);
		return $return;

	}

	function GetControllerByModel($model) {
		$return = Inflector::camelize(Inflector::humanize(Inflector::pluralize($model)));
		if (! strcasecmp($return, 'Professors')) 
			$return = 'Professores';
		return $return;
	}

	function MakeButtonsByAction($action, $model, $id = null) {
		$return = '';
		if ((! strcasecmp($action, 'index')) || (! strcasecmp($action, 'view')))
			$return .= 
				'<li>' . $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__($model), 
				array('action' => 'add'), array('class' => '', 'escape'=>false)) . '</li>';
		if ((! strcasecmp($action, 'edit')) || (! strcasecmp($action, 'view')))
			$return .= 
				'<li>' . $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete').' '.__($model), array('action' => 'delete', $this->Form->value($model . '.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $this->Form->value($model . '.id'))) . '</li>';
		if ((! strcasecmp($action, 'edit')) || (! strcasecmp($action, 'add')) || (! strcasecmp($action, 'view')))
			$return .=
				'<li>' . $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__($this->GetControllerByModel($model)), array('action' => 'index'),array('escape'=>false)) . '</li>';
		if (! strcasecmp($action, 'view'))
			$return .= 
				'<li>' . $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('Edit').' '.__($model), 
				array('action' => 'edit', $id), array('class' => '', 'escape'=>false)) . '</li>';

		return $return;
	}

	function MakeButtonsByArray($array) {
		if (! is_array($array))
			return '';
		$return = '';
		foreach ($array as $model => $className):

			$controller = $this->GetControllerByModel($className['className']);

			$return .= $this->AddDivider() . 
				'<li>' .
	$this->Html->link(
		'<i class="fa fa-list-alt"></i>'.' '. __('List').' '.__($controller), 
		array('controller' => $controller, 'action' => 'index'), 
		array('class' => '','escape'=>false)
	) .
				'</li>' .
				'<li>' .
	$this->Html->link(
		'<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__($className['className']), 
		array('controller' => $controller, 'action' => 'add'), 
		array('class' => '','escape'=>false)
	) .
				'</li>';
		endforeach;

		return $return;
	}

	public function MakeButtons($controller, $action, $id = null) { 

		$model = $this->GetModelByController($controller);
		$class = ClassRegistry::init($model);

		return 
'<div class="btn-group pull-right">' .
	'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">' . __('Actions') . 
		'<span class="caret"></span>' .
	'</button>' .
	'<ul class="dropdown-menu" role="menu">' .
		$this->MakeButtonsByAction($action, $model, $id) .
		$this->MakeButtonsByArray($class->belongsTo) .
		$this->MakeButtonsByArray($class->hasMany) .
	'</ul>' .
'</div>';

	}
} 

?>