<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-slideshare "></span> <?php echo __('Professores'); ?>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">

			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('endereco'); ?></th>
							<th><?php echo $this->Paginator->sort('numero'); ?></th>
							<th><?php echo $this->Paginator->sort('bairro'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							<th><?php echo $this->Paginator->sort('cep'); ?></th>
							<th><?php echo $this->Paginator->sort('fone'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($professores as $professor): ?>
	<tr>
		<td><?php echo h($professor['Professor']['id']); ?>&nbsp;</td>
		<td><?php echo h($professor['Professor']['nome']); ?>&nbsp;</td>
		<td><?php echo h($professor['Professor']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($professor['Professor']['numero']); ?>&nbsp;</td>
		<td><?php echo h($professor['Professor']['bairro']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($professor['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $professor['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($professor['Professor']['cep']); ?>&nbsp;</td>
		<td><?php echo h($professor['Professor']['fone']); ?>&nbsp;</td>
		<td><?php echo h($professor['Professor']['email']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $professor, 'model' => 'Professor')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
