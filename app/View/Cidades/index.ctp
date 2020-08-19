<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-map-marker"></span> <?php echo __('Cidades'); ?>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
		</h3>
	</div>

<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('estado_id'); ?></th>
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('cep'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($cidades as $cidade): ?>
	<tr>
		<td><?php echo h($cidade['Cidade']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cidade['Estado']['nome'], array('controller' => 'estados', 'action' => 'view', $cidade['Estado']['id'])); ?>
		</td>
		<td><?php echo h($cidade['Cidade']['nome']); ?>&nbsp;</td>
		<td><?php echo h($cidade['Cidade']['cep']); ?>&nbsp;</td>

		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $cidade, 'model' => 'Cidade')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
