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
		<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'aluno_disciplinas', 'action' => 'add', $aluno_id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Add') . __('Disciplina'))); ?>
			<?php echo $this->Html->link('<i class="fa fa-graduation-cap"></i>', array('controller' => 'aluno_disciplinas', 'action' => 'adddocurso', $aluno_id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Add Disciplinas do Curso'), 'data-toggle'=>'tooltip')); ?>
		</th>
	</tr>
	<?php 
		foreach($disciplina AS $AlunoDisciplina): 
		$id = $AlunoDisciplina['AlunoDisciplina']['id'];
	?>
	<tr id="disciplina<?php echo $id; ?>">
		<td><?php echo h($id); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($AlunoDisciplina['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $AlunoDisciplina['Disciplina']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($AlunoDisciplina['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $AlunoDisciplina['Professor']['id'])); ?>
		</td>
		<td><?php echo h($AlunoDisciplina['AlunoDisciplina']['frequencia']); ?>&nbsp;</td>
		<td><?php echo h($AlunoDisciplina['AlunoDisciplina']['nota']); ?>&nbsp;</td>
		<td><?php echo h($AlunoDisciplina['AlunoDisciplina']['horas_aula']); ?>&nbsp;</td>
		<td><?php echo h($AlunoDisciplina['AlunoDisciplina']['data']); ?>&nbsp;</td>
		<td width="10%">
			<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'aluno_disciplinas', 'action' => 'edit', $id, 'modal'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#modal-dialog', 'title'=>__('Edit'))); ?>
			<?php echo $this->element('BotaoDeleteAjax', 
				array("controller" => "aluno_disciplinas", "nome" => "disciplina", "id" => $id)); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</article>
