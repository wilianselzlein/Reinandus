	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('LancamentoContabil'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>

		<div class="lancamentocontabils view pandel-body">

			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo $lancamentocontabil['LancamentoContabil']['data']; ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Debito'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lancamentocontabil['Debito']['reduzido'] . ' - ' . $lancamentocontabil['Debito']['analitico'] . ' - ' . $lancamentocontabil['Debito']['descricao'], array('controller' => 'PlanoContas', 'action' => 'view', $lancamentocontabil['Debito']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Credito'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lancamentocontabil['Credito']['reduzido'] . ' - ' . $lancamentocontabil['Credito']['analitico'] . ' - ' . $lancamentocontabil['Credito']['descricao'], array('controller' => 'PlanoContas', 'action' => 'view', $lancamentocontabil['Credito']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('HistoricoPadrao'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lancamentocontabil['HistoricoPadrao']['nome'], array('controller' => 'HistoricoPadrao', 'action' => 'view', $lancamentocontabil['HistoricoPadrao']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Identificador'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['identificador']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Documento'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['documento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($lancamentocontabil['LancamentoContabil']['valor'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Complemento'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['complemento']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->

		</div><!-- /.view -->

<?php echo $this->element('Relateds/Mensalidades', array('array' => $mensalidades)); ?>
</div><!-- /#page-container .row-fluid -->
