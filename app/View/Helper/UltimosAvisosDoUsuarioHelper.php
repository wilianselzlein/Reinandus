<?php 
App::uses('AppHelper', 'View/Helper'); 

class UltimosAvisosDoUsuarioHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	public function GerarLista($user_id) { 

		$aviso = ClassRegistry::init('Aviso');
		$avisos = $aviso->find('all', array('recursive' => 0, 'limit' => 5, 'order' => array('Aviso.data DESC'),
			'conditions' => array('Aviso.user_id' => $user_id, 'Aviso.tipo_id' => 24),
			'fields' => array('Aviso.id', 'Aviso.data', 'Aviso.mensagem', 'User.username')
			));
		
		$return = '';
		for ($i = 0; $i < count($avisos); $i++){

			$texto = 
				'<div class="media">' .
			      '<span class="pull-left">' .
			         '<img class="media-object" src="http://placehold.it/50x50" alt="">' .
			      '</span>' . 
			      '<div class="media-body">' .
			         '<h5 class="media-heading"><strong>' . $avisos[$i]['User']['username'] . '</strong>' .
			         '</h5>' .
			         '<p class="small text-muted"><i class="fa fa-clock-o"></i> ' . $avisos[$i]['Aviso']['data'] . '</p>' .
			         '<p>' . $avisos[$i]['Aviso']['mensagem'] . '</p>' .
			      '</div>' .
				'</div>';

			$return .=  
				'<li class="message-preview">' .
					 $this->Html->link($texto, array('controller' => 'avisos', 'action' => 'view', $avisos[$i]['Aviso']['id']), array('class' => '', 'escape'=>false)) .
				'</li>';

		}
		return $return;
	}
} 

?>


