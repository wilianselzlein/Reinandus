<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed" >
		<thead>
			<tr class="active">
				<th>Id</th>
				<th>Aluno</th>
				<th>Responsável</th>
				<th>Vencimento</th>
				<th>Valor</th>
				<th>Desconto</th>
				<th class="actions text-center"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mensalidades as $mensalidade): ?>
			<tr>
				<td><?php echo h($mensalidade['Mensalidade']['id']); ?>&nbsp;</td>
				<td>
					<?php echo $this->Html->link($mensalidade['Aluno']['id'] . ' - ' . $mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($mensalidade['Responsavel']['Id'] . ' - ' . $mensalidade['Responsavel']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $mensalidade['Responsavel']['Id'])); ?>
				</td>
				<td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?>&nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'],'BRL'); ?>&nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'],'BRL'); ?>&nbsp;</td>
				<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $mensalidade, 'model' => 'Mensalidade', 'controller' => 'Mensalidades')); ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->