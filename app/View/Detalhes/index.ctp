<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-info"></span> <?php echo __('Detalhes'); ?>
	<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
			
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('aluno_id'); ?></th>
							<th><?php echo $this->Paginator->sort('foto'); ?></th>
							<th><?php echo $this->Paginator->sort('ocorrencias'); ?></th>
							<th><?php echo $this->Paginator->sort('hist_escolar'); ?></th>
							<th><?php echo $this->Paginator->sort('neg_financeira'); ?></th>
							<th><?php echo $this->Paginator->sort('egresso'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($detalhes as $detalhe): ?>
	<tr>
		<td><?php echo h($detalhe['Detalhe']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalhe['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $detalhe['Aluno']['id'])); ?>
		</td>
		<td><?php echo h($detalhe['Detalhe']['foto']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['ocorrencias']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['hist_escolar']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['neg_financeira']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['egresso']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $detalhe, 'model' => 'Detalhe')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
