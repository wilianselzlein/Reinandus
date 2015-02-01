<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-group"></span> <?php echo __('LancamentoContabil'); ?>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
    	</h3>
    </div>

	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
	            <thead>
                    <tr class="active">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('data'); ?></th>
						<th><?php echo $this->Paginator->sort('debito_id'); ?></th>
						<th><?php echo $this->Paginator->sort('credito_id'); ?></th>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($LancamentoContabil as $lancamentocontabil): ?>
	<tr>
		<td><?php echo h($lancamentocontabil['LancamentoContabil']['id']); ?>&nbsp;</td>
		<td><?php echo h($lancamentocontabil['LancamentoContabil']['data']); ?>&nbsp;</td>
            <td><?php echo $this->Html->link($lancamentocontabil['Debito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lancamentocontabil['Debito']['id']), array('class' => '')); ?>
             &nbsp;</td>
            <td><?php echo $this->Html->link($lancamentocontabil['Credito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lancamentocontabil['Credito']['id']), array('class' => '')); ?>
             &nbsp;</td>

		<td><?php echo $this->Number->currency($lancamentocontabil['LancamentoContabil']['valor'],'BRL');?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $lancamentocontabil, 'model' => 'LancamentoContabil')); ?>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
<?php echo $this->element('Paginator'); ?>
</div>
