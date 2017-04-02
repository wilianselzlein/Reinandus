<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed" >
		<thead>
			<tr class="active">
				<th>Id</th>
				<th><span class="badge"><?php echo count($mensalidades); ?></span>&nbsp;Aluno(s)</th>
				<th>Email</th>
				<th>Vencimento</th>
				<th>Valor</th>
				<th>Desconto</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mensalidades as $mensalidade): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($mensalidade['Mensalidade']['id'], array('controller' => 'mensalidades', 'action' => 'view', $mensalidade['Mensalidade']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($mensalidade['Aluno']['id'] . ' - ' . $mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id'])); ?>
				</td>
				<td><?php echo h($mensalidade['Aluno']['email']); ?>&nbsp;</td>
				<td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?>&nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'],'BRL'); ?>&nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'],'BRL'); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php echo $this->Form->button('<i class="fa fa-envelope"></i>'.' '.__('Enviar'), array('id' => 'EnviarEmail', 'class' => 'btn btn-large btn-primary', 'type'=>'submit','escape' => false, 'disabled' => 'disabled')); ?>	
</div>
<!-- /.table-responsive -->