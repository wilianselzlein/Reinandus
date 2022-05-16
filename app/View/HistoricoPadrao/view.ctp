<div class="panel panel-default ">
	<div class="panel-heading">
		<h2><?php echo __('HistoricoPadrao'); ?>
			<small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
		<div class="historicopadraos view pandel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($historicopadrao['HistoricoPadrao']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($historicopadrao['HistoricoPadrao']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		</div><!-- /.view -->
			
<?php echo $this->element('Relateds/LancamentosContabeis', array('array' => $lancamentos)); ?>
<?php echo $this->element('Relateds/Orcamentos', array('array' => $orcamentos)); ?>
</div><!-- /#page-container .row-fluid -->