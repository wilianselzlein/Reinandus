<?php 
App::uses('ButtonsActionsHelper', 'View/Helper'); 

class ButtonsActionsEnumeradosHelper extends ButtonsActionsHelper { 
    
	public function VisualizacaoEnumerados($model, $ignorados) {
      $enumerados = ClassRegistry::init('Enumerado');
      $options = array('recursive' => false, 'order' => 'Enumerado.referencia', 
        'conditions' => array('Enumerado.nome' => $model, 'Enumerado.is_ativo' => true, array('NOT' => array('Enumerado.referencia' => $ignorados))), 
        'fields' => array('Enumerado.id', 'Enumerado.nome', 'Enumerado.referencia', 'Enumerado.valor'));
      $enumerados = $enumerados->find('all', $options);
      
      if (is_null($enumerados))
          return '';

      $modelo = ClassRegistry::init($model);
      $retorno =
        '<div class="btn-group pull-right">' .
        	'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">' . 
            __('Visualizar') . 
        		'<span class="caret"></span>' .
        	'</button>' .
              '<ul class="dropdown-menu">';

      $ultimo = '';
      foreach ($enumerados as $index => $enumerado) {
          $referencia = $enumerado['Enumerado']['referencia'];
          $id = $enumerado['Enumerado']['id'];

          if (($ultimo !== '') && ($ultimo !== $referencia))
            $retorno .= '<li class="divider"></li>';

          $options = array('recursive' => -1, 'conditions' => array($model . '.' . $referencia => $id));
          $conta = $modelo->find('count', $options);

          $retorno .= 
            '<li>' .
              $this->Html->link('<span class="label label-info">' . $conta . '</span>'.' ' .
                $enumerado['Enumerado']['valor'], array('controller' => 'enumerados', 
                'action' => 'view',  $id), array('class' => '', 'escape'=>false)) .
            '</li>';

          $ultimo = $referencia;
      }
      $retorno .= '</ul>' . '</div>';
      return $retorno;
	}
}

?>