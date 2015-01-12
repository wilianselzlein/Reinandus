<article>
<table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-condensed" style="
    margin-top: 5px;
    margin-left: 5px;
    margin-bottom: 5px;
    width: 98%;">
	<tr  class="active">
		<th>
			<?php echo __('Numero'); if (empty($mensalidade)) { ?>
			  	&nbsp; <span class="label label-danger">Nenhuma mensalidade para esse aluno.</span>
			<?php } ?>
		</th>
		<th> Vencimento </th>
		<th> Líquido </th>
		<th> Pagamento </th>
		<th> Forma </th>
		<th width="7%">			
			<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>', array('controller' => 'mensalidades', 'action' => 'add', $aluno_id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Add') . __('Mensalidade'), 'data-toggle'=>'tooltip')); ?>
		</th>
	</tr>
	<?php foreach($mensalidade AS $AlunoMensalidade): ?>
	<tr>
		<td><?php echo h($AlunoMensalidade['Mensalidade']['numero']); ?>&nbsp;</td>
		<td><?php echo h($AlunoMensalidade['Mensalidade']['vencimento']); ?>&nbsp;</td>
		<td><?php echo h($AlunoMensalidade['Mensalidade']['liquido']); ?>&nbsp;</td>
		<td><?php echo h($AlunoMensalidade['Mensalidade']['pagamento']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($AlunoMensalidade['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $AlunoMensalidade['Formapgto']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'aviso_cursos', 'action' => 'delete', $AlunoMensalidade['Mensalidade']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $AlunoMensalidade['Mensalidade']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</article>
