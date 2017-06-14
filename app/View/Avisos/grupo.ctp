<article>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-condensed" style="
    margin-top: 5px;
    margin-left: 5px;
    margin-bottom: 5px;
    width: 98%;">
	<tr  class="active">
		<th width="7%"><?php echo 'Id'; ?></th>
		<th>
			<?php echo 'Grupo'; if (empty($grupo)) { ?>
			  	&nbsp; <span class="label label-danger">Nenhum grupo para esse aviso.</span>
			<?php } ?>
		</th>
		<th width="7%">			
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'aviso_grupos', 'action' => 'add', $aviso_id, 'modal'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#modal-dialog', 'title'=>__('Add') . __('Grupo'))); ?>
		</th>
	</tr>
	<?php foreach($grupo AS $Grupo): 
		$id = $Grupo['AvisoGrupo']['id']; ?>
	<tr id="grupo<?php echo $id; ?>">
		<td><?php echo h($id); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($Grupo['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $id)); ?>
		</td>
		<td>
			<?php echo $this->element('BotaoDeleteAjax', 
				array("controller" => "aviso_grupos", "nome" => "grupo", "id" => $id)); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</article>
