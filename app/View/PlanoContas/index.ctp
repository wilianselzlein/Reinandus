<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-sitemap"></span> <?php echo __('PlanoContas'); ?>
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
						<th><?php echo $this->Paginator->sort('reduzido'); ?></th>
						<th><?php echo $this->Paginator->sort('analitico'); ?></th>
						<th><?php echo $this->Paginator->sort('descricao'); ?></th>
						<th><?php echo $this->Paginator->sort('nivel'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($planocontas as $planoconta): ?>
	<tr>
		<td><?php echo h($planoconta['PlanoConta']['id']); ?>&nbsp;</td>
		<td><?php echo h($planoconta['PlanoConta']['reduzido']); ?>&nbsp;</td>
		<td><?php echo h($planoconta['PlanoConta']['analitico']); ?>&nbsp;</td>
		<td><?php echo h($planoconta['PlanoConta']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($planoconta['PlanoConta']['nivel']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $planoconta, 'model' => 'PlanoConta')); ?>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
<?php echo $this->element('Paginator'); ?>
</div>
