<?php 
if (! isset($DeleteAjax)) $DeleteAjax = false;

	if ($model == '') 
		$id = $objeto['id'];
	else
		$id = $objeto[$model]['id'];

$desabilitar = array('Instituto', 'Cabecalhos', 'Permissoes', 'Acessos', 'Parametros', 'Mensalidades', 'ContasPagar', 'Boletos');
$exibir_botao_duplicar = ! in_array($this->name, $desabilitar);

?>
<?php if (isset($controller)) { ?>
<td class="actions text-center">
	<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => $controller, 'action' => 'view', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
	<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => $controller, 'action' => 'edit', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
	<?php 
		if ($DeleteAjax)
			echo $this->element('BotaoDeleteAjax', 
				array("controller" => $controller, "nome" => $controller, "id" => $id));
		else
			echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => $controller, 'action' => 'delete', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $id)); 
	?>
	<?php if ($exibir_botao_duplicar) echo $this->Form->postLink('<i class="fa fa-copy"></i>', array('controller' => $controller, 'action' => 'copy', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Duplicar'), 'data-toggle'=>'tooltip'), __('Deseja duplicar o registro # %s?', $id)); ?>
</td>
<?php } else { ?>
<td class="actions text-center">
	<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
	<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
	<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $id)); ?>
	<?php if ($exibir_botao_duplicar) echo $this->Form->postLink('<i class="fa fa-copy"></i>', array('action' => 'copy', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Duplicar'), 'data-toggle'=>'tooltip'), __('Deseja duplicar o registro # %s?', $id)); ?>
</td>
<?php }  ?>