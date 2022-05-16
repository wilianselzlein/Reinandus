<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-cog"></span> <?php echo __('Parametros'); ?>
			<?php echo $this->Html->link('<i class="fa fa-refresh"></i>', array('action' => 'atualizar'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Atualizar Parametros'), 'data-toggle'=>'tooltip')); ?>
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
						<th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($parametros as $parametro): $id = $parametro['Parametro']['id']; ?>
					<tr>
						<td><?php echo h($id); ?>&nbsp;</td>
						<td><?php echo h($parametro['Parametro']['nome']); ?>&nbsp;</td>
						<td>
							<div class="edit" id="valor<?php echo $id; ?>">
								<?php echo h($parametro['Parametro']['valor']); ?>
							</div>
						</td>
						<?php
							echo $this->Ajax->editor("valor" . $id, 
							    array('controller' => 'Parametros','action' => 'valor'),
							    array(
								'indicator' => '<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>',
								'submit' => '<i class="fa fa-save fa-border"></i>',
								'submitdata' => array('id'=> h($id)),
								'tooltip' => 'Clique para editar'));
							echo $this->element('BotoesDeAcaoDoIndex', 
								array('objeto' => $parametro, 'model' => 'Parametro')); ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- /.table-responsive -->
	</div>
	<?php echo $this->element('Paginator'); ?>
</div>