	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Detalhe'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
			
		<div class="detalhes view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Aluno'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($detalhe['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $detalhe['Aluno']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Foto'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['foto']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ocorrencias'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['ocorrencias']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Hist Escolar'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['hist_escolar']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Neg Financeira'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['neg_financeira']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Egresso'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['egresso']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

</div><!-- /#page-container .row-fluid -->