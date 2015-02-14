<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-book"></span> <?php echo __('Empresas/Pessoas'); ?>
	<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>
<div class="panel-body">

			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
							<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
							<th><?php echo $this->Paginator->sort('endereco'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							<th><?php echo $this->Paginator->sort('fone'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($pessoas as $pessoa): ?>
	<tr>
		<td><?php echo h($pessoa['Pessoa']['id']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['razaosocial']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['endereco']) . ' ' . 
						h($pessoa['Pessoa']['numero']) . ' ' .
						h($pessoa['Pessoa']['bairro']) . ' ' . 
						h($pessoa['Pessoa']['cep']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($pessoa['Pessoa']['fone']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['email']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $pessoa, 'model' => 'Pessoa')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
