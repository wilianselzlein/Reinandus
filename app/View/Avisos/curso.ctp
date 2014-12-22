<article>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-condensed" style="
    margin-top: 5px;
    margin-left: 5px;
    margin-bottom: 5px;
    width: 98%;">
	<tr  class="active">
		<th width="7%"><?php echo 'Id'; ?></th>
		<th><?php echo 'Curso';  ?></th>
		<th width="7%">			
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'aviso_cursos', 'action' => 'add', $aviso_id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Add') . __('Curso'), 'data-toggle'=>'tooltip')); ?>
		</th>
	</tr>
	<?php foreach($curso AS $Curso): ?>
	<tr>
		<td><?php echo h($Curso['AvisoCurso']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($Curso['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $Curso['Curso']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'aviso_cursos', 'action' => 'delete', $Curso['AvisoCurso']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $Curso['AvisoCurso']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</article>
