<div class="panel panel-default ">
	<div class="panel-heading">
		<h2><?php echo __('PlanoConta'); ?>
			<small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
		<div class="planocontas view pandel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Reduzido'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['reduzido']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Analitico'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['analitico']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Descricao'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['descricao']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		</div><!-- /.view -->
	
	<?php echo  $this->element('LancamentosContabeisViewPlanoContas', array('array' => $debitos, "nome" => "")); ?>
	<?php echo $this->element('LancamentosContabeisViewPlanoContas', array('array' => $creditos, "nome" => "")); ?>
</div><!-- /#page-container .row-fluid -->