<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-building"></span> <?php echo __('Instituto'); ?>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">

			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
							<th><?php echo $this->Paginator->sort('diretor_id'); ?></th>
							<th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($institutos as $instituto): ?>
	<tr>
		<td><?php echo h($instituto['Instituto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($instituto['Empresa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Empresa']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($instituto['Diretor']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Diretor']['id'])); ?>
		</td>
		<td><?php echo h($instituto['Tipo']['valor']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $instituto, 'model' => 'Instituto')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
