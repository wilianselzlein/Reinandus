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
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'aviso_grupos', 'action' => 'add', $aviso_id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Add') . __('Grupo'), 'data-toggle'=>'tooltip')); ?>
		</th>
	</tr>
	<?php foreach($grupo AS $Grupo): ?>
	<tr>
		<td><?php echo h($Grupo['AvisoGrupo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($Grupo['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $Grupo['Grupo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'aviso_grupos', 'action' => 'delete', $Grupo['AvisoGrupo']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $Grupo['AvisoGrupo']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</article>
