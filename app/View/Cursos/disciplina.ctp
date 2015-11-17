<article>
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-condensed" style="
	margin-top: 5px;
	margin-left: 5px;
	margin-bottom: 5px;
	width: 98%;">
	<tr  class="active">
		<th width="7%"><?php echo 'Id'; ?></th>
		<th>
			<?php echo 'Disciplina'; if (empty($disciplina)) { ?>
			&nbsp; <span class="label label-danger">Nenhuma disciplina para esse curso.</span>
			<?php } ?>
		</th>
		<th><?php echo 'Professor'; ?></th>
		<th width="15%"><?php echo 'Horas Aula'; ?></th>
		<th width="7%">			
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'curso_disciplinas', 'action' => 'add', $curso_id, 'modal'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#modal-dialog', 'title'=>__('Add').' '. __('Disciplina'))); ?>
		</th>
	</tr>
	<?php foreach($disciplina AS $Disciplina): ?>
		<tr>
			<td><?php echo h($Disciplina['CursoDisciplina']['id']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($Disciplina['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $Disciplina['Disciplina']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($Disciplina['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $Disciplina['Professor']['id'])); ?>
			</td>
			<td><?php echo h($Disciplina['CursoDisciplina']['horas_aula']); ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'curso_disciplinas', 'action' => 'edit', $Disciplina['CursoDisciplina']['id'], 'modal'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#modal-dialog', 'title'=>__('Edit'))); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'curso_disciplinas', 'action' => 'delete', $Disciplina['CursoDisciplina']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $Disciplina['CursoDisciplina']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</article>
