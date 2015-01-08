<article>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-condensed" style="
    margin-top: 5px;
    margin-left: 5px;
    margin-bottom: 5px;
    width: 98%;">
	<tr  class="active">
		<th width="7%"><?php echo 'Id'; ?></th>
		<th>
			<?php echo __('Disciplina'); if (empty($disciplina)) { ?>
			  	&nbsp; <span class="label label-danger">Nenhuma disciplina para esse aluno.</span>
			<?php } ?>
		</th>
		<th> Professor </th>
		<th> Frequência </th>
		<th> Nota </th>
		<th> HA </th>
		<th> Data </th>
		<th width="7%">			
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'disciplinas', 'action' => 'add', $aluno_id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Add') . __('Disciplina'), 'data-toggle'=>'tooltip')); ?>
		</th>
	</tr>
	<?php foreach($disciplina AS $Disciplina): ?>
	<tr>
		<td><?php echo h($Disciplina['Disciplina']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($Disciplina['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $Disciplina['Disciplina']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($Disciplina['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $Disciplina['Professor']['id'])); ?>
		</td>
		<td><?php echo h($Disciplina['AlunoDisciplina']['frequencia']); ?>&nbsp;</td>
		<td><?php echo h($Disciplina['AlunoDisciplina']['nota']); ?>&nbsp;</td>
		<td><?php echo h($Disciplina['AlunoDisciplina']['ha']); ?>&nbsp;</td>
		<td><?php echo h($Disciplina['AlunoDisciplina']['data']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'aviso_cursos', 'action' => 'delete', $Disciplina['AlunoDisciplina']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $Disciplina['AlunoDisciplina']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</article>
