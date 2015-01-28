<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-sitemap"></span> <?php echo __('PlanoContas'); ?>
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<?php echo __('Actions');?><span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>   
						<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('PlanoConta'), 
								array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				</ul>
			</div>
    	</h3>
    </div>

	<div class="panel-body">
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
