<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-usd"></span> <?php echo __('FormasPagamentos');?> 
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
			
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('tipo'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($formapgtos as $formapgto): ?>
	<tr>
		<td><?php echo h($formapgto['Formapgto']['id']); ?>&nbsp;</td>
		<td><?php echo h($formapgto['Formapgto']['nome']); ?>&nbsp;</td>
		<td><?php echo h($formapgto['Formapgto']['tipo']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $formapgto, 'model' => 'Formapgto')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
