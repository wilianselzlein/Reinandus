<?php 
App::uses('AppHelper', 'View/Helper');
App::uses('ButtonsActionsHelper', 'View/Helper'); 

class ButtonsActionsEnumeradosHelper extends ButtonsActionsHelper { 
    
	public function VisualizacaoEnumerados() {
	return
        '<div class="btn-group pull-right">' .
        	'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">' . __('Actions') . 
        		'<span class="caret"></span>' .
        	'</button>' .
              '<ul class="dropdown-menu">' .
                 	'<li><a tabindex="-1" href="#">Regular link <span class="label label-warning">1</span> </a> </li>' .
                 	'<li><a tabindex="-1" href="#">Regular link <span class="label label-success">2</span> </a> </li>' .
              '</ul>' .
        '</div>';
	}
}

?>