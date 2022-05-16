<?php echo $this->Ajax->link('<i class="fa fa-times"></i>', 
		array('controller' => $controller, 'action' => 'delete', $id), 
		array('id' => 'del' . $nome . '_' . $id, 
				//'update' => 'post' . $id, 
				'indicator' => 'loading',
				'class' => 'btn btn-default btn-xs', 'escape'=> false, 
				'confirm' => 'Confirma exclusao?',
				'title'=>__('Delete'), 'data-toggle'=>'tooltip',
				'before' => '$("#carregador_pai").css("display", "block").css("visibility", "visible")',
				'complete' => 
					 '$("#carregador_pai").css("display", "none").css("visibility", "hidden");
    				  $("#' . $nome . $id . '").css("display", "none");')
		);
?>