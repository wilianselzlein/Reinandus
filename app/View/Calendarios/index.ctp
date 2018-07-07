<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-calendar"></span> <?php echo __('Calendário'); ?>
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
							<th><?php echo $this->Paginator->sort('disciplina_id'); ?></th>
							<th><?php echo $this->Paginator->sort('curso_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($calendarios as $calendario): ?>
	<tr>
		<td><?php echo h($calendario['Calendario']['id']); ?>&nbsp;</td>
		<td><?php echo h($calendario['Calendario']['data']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calendario['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $calendario['Disciplina']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($calendario['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $calendario['Curso']['id'])); ?>
		</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $calendario, 'model' => 'Calendario')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
