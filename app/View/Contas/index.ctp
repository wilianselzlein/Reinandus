<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-briefcase"></span> <?php echo __('Contas'); ?>
	<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('banco', 'Descrição'); ?></th>
							<th><?php echo $this->Paginator->sort('agencia'); ?></th>
							<th><?php echo $this->Paginator->sort('conta'); ?></th>
							<th><?php echo $this->Paginator->sort('contato'); ?></th>
							<th><?php echo $this->Paginator->sort('fone'); ?></th>
							<th><?php echo $this->Paginator->sort('formapgto_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($conta as $contum): ?>
	<tr>
		<td><?php echo h($contum['Contum']['id']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['banco']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['agencia'] . '-' . $contum['Contum']['agencia_dig']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['conta'] . '-' . $contum['Contum']['conta_dig']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['contato']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['fone']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contum['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $contum['Formapgto']['id'])); ?>
		</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $contum, 'model' => 'Contum')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
