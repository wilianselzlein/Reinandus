	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Orcamento'); ?>
            <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>

		<div class="orcamentos view pandel-body">

			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($orcamento['Orcamento']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo $orcamento['Orcamento']['data']; ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Plano Conta'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($orcamento['PlanoConta']['reduzido'] . ' - ' . $orcamento['PlanoConta']['analitico'] . ' - ' . $orcamento['PlanoConta']['descricao'], array('controller' => 'PlanoContas', 'action' => 'view', $orcamento['PlanoConta']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('HistoricoPadrao'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($orcamento['HistoricoPadrao']['nome'], array('controller' => 'HistoricoPadrao', 'action' => 'view', $orcamento['HistoricoPadrao']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($orcamento['Orcamento']['valor'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Complemento'); ?></strong></td>
		<td>
			<?php echo h($orcamento['Orcamento']['complemento']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->

		</div><!-- /.view -->

<?php echo $this->element('Relateds/LancamentosContabeis', array('array' => $LancamentosContabeis)); ?>
</div><!-- /#page-container .row-fluid -->
