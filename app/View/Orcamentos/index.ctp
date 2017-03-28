<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-tasks"></span> <?php echo __('Orcamentos'); ?>
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
						<th><?php echo $this->Paginator->sort('data'); ?></th>
						<th><?php echo $this->Paginator->sort('plano_conta_id'); ?></th>
						<th><?php echo $this->Paginator->sort('historico_padrao_id'); ?></th>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th><?php echo $this->Paginator->sort('complemento'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($Orcamentos as $Orcamento): ?>
	<tr>
		<td><?php echo h($Orcamento['Orcamento']['id']); ?>&nbsp;</td>
		<td><?php echo $Orcamento['Orcamento']['data']; ?>&nbsp;</td>
        <td><?php echo $this->Html->link($Orcamento['PlanoConta']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $Orcamento['PlanoConta']['id']), array('class' => '')); ?>
             &nbsp;</td>
        <td><?php echo $this->Html->link($Orcamento['HistoricoPadrao']['nome'], array('controller' => 'historico_padrao', 'action' => 'view', $Orcamento['HistoricoPadrao']['id']), array('class' => '')); ?>
             &nbsp;</td>
		<td><?php echo $this->Number->currency($Orcamento['Orcamento']['valor'],'BRL');?>&nbsp;</td>
		<td><?php echo $Orcamento['Orcamento']['complemento']; ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $Orcamento, 'model' => 'Orcamento')); ?>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
<?php echo $this->element('Paginator'); ?>
</div>
