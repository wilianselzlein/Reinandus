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
		if (! strcasecmp($return, 'Conta')) 
			$return = 'Contas';
		if (! strcasecmp($return, 'Lancamentocontabil')) 
			$return = 'LancamentoContabil';
		if (! strcasecmp($return, 'Contaspagar')) 
			$return = 'ContasPagar';
		if (! strcasecmp($return, 'HistoricoPadraos')) 
			$return = 'HistoricoPadrao';

		return $return;
	}

	function ControllerNotInListIgnoreds($controller) {
		return (strcasecmp($controller, 'Enumerados')) 
			&& (strcasecmp($controller, 'Acessos'))
			&& (strcasecmp($controller, 'AlunoDisciplinas'))
			&& (strcasecmp($controller, 'DisciplinaProfessors'))
			&& (strcasecmp($controller, 'CursoDisciplinas'))
			&& (strcasecmp($controller, 'RelatorioDataSets'))
			&& (strcasecmp($controller, 'AvisoCursos'));
	}

	function TestDuplicate($string, $controller) {
		return strpos($string, $controller) > 0;
	}

	function MakeButtonsByAction($action, $model, $id = null) {
		$return = '';
		$controller = $this->GetControllerByModel($model);

		if ($this->ControllerNotInListIgnoreds($controller)) {
			if ((! strcasecmp($action, 'index')) || (! strcasecmp($action, 'view')))
				$return .= 
					'<li>' . $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__($model), 
					array('action' => 'add'), array('class' => '', 'escape'=>false)) . '</li>';
			if ((! strcasecmp($action, 'edit')) || (! strcasecmp($action, 'view')))
				$return .= 
					'<li>' . $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete').' '.__($model), array('action' => 'delete', $id), array('escape'=>false), __('Are you sure you want to delete # %s?', $id)) . '</li>';
			if ((! strcasecmp($action, 'edit')) || (! strcasecmp($action, 'add')) || (! strcasecmp($action, 'view')))
				$return .=
					'<li>' . $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__($this->GetControllerByModel($model)), array('action' => 'index', 'controller' => $this->GetControllerByModel($model)),array('escape'=>false)) . '</li>';
			if (! strcasecmp($action, 'view'))
				$return .= 
					'<li>' . $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('Edit').' '.__($model), 
					array('action' => 'edit', $id), array('class' => '', 'escape'=>false)) . '</li>';
			if ((strcasecmp($action, 'edit')) && (strcasecmp($action, 'add')) && (strcasecmp($action, 'view')) && (strcasecmp($action, 'index')))
				$return .=
					'<li>' . $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__(Inflector::humanize($action)) .' '.__($this->GetControllerByModel($model)), array('action' => $action, 'controller' => $this->GetControllerByModel($model)),array('escape'=>false)) . '</li>';
		}
		return $return;
	}

	function MakeButtonsByArray($array) {
		if (! is_array($array))
			return '';
		$return = '';
		foreach ($array as $model => $className):

			$controller = $this->GetControllerByModel($className['className']);

			if (($this->ControllerNotInListIgnoreds($controller)) && (! $this->TestDuplicate($return, $controller)))
				$return .= $this->AddDivider() . 
					'<li>' .
	$this->Html->link(
		'<i class="fa fa-list-alt"></i>'.' '. __('List').' '.__($controller), 
		array('controller' => $controller, 'action' => 'index'), 
		array('class' => '','escape'=>false)
	) .
					'</li>' . '<li>' .
	$this->Html->link(
		'<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__($className['className']), 
		array('controller' => $controller, 'action' => 'add'), 
		array('class' => '','escape'=>false)
	) .
					'</li>';
		endforeach;

		return $return;
	}

	private function MakeOthersButtons($array)
	{
		if (! is_array($array))
			return '';
		$buttons = $this->AddDivider();
		foreach ($array as $button) {
			$buttons .= $this->MakeButtonsByAction($button['action'], $button['model']);
		}
		return $buttons;
	}

	public function MakeButtons($controller, $action, $id = null, $array = null) { 

		$model = $this->GetModelByController($controller);
		$class = ClassRegistry::init($model);

		return 
		$this->VisualizacaoEnumerados($model) .
'<div class="btn-group pull-right">' .
	'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">' . __('Actions') . 
		'<span class="caret"></span>' .
	'</button>' .
	'<ul class="dropdown-menu" role="menu">' .
		$this->MakeButtonsByAction($action, $model, $id) .
		$this->MakeButtonsByArray($class->belongsTo) .
		$this->MakeButtonsByArray($class->hasMany) .
		$this->MakeButtonsByArray($class->hasAndBelongsToMany) .
		$this->MakeOthersButtons($array) . 
	'</ul>' .
'</div>';

	}

	public function VisualizacaoEnumerados($model) {
		return '';
	}
} 

?>