<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-cogs"></span> <?php echo __('Validação Arquivo Retorno'); ?>                
		</h3>
	</div>

	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
						<th>Mensalidade</th>
						<th>Aluno</th>
						<th>Retorno</th>
						<th>Data</th>
						<th>Forma Pagamento</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($validacoes as $validacao): ?>
					<tr>
						<td>
							<?php echo $this->Html->link($validacao['id'], array('controller' => 'Mensalidades', 'action' => 'view', $validacao['id'])); ?>
						</td>
						<td><?php echo h($validacao['aluno']); ?>&nbsp;</td>
						<td><?php echo h($validacao['retorno']); ?>&nbsp;</td>
						<td><?php echo h($validacao['pagamento']); ?>&nbsp;</td>
						<td><?php echo h($validacao['formapagamento']); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
</div>
