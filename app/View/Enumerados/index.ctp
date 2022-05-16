<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-list-ol"></span> <?php echo __('Enumerados'); ?> 
<?php echo $this->Html->link('<i class="fa fa-refresh"></i>', array('action' => 'atualizar'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Atualizar Enumerados'), 'data-toggle'=>'tooltip')); ?>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>
<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('referencia'); ?></th>
							<th><?php echo $this->Paginator->sort('valor'); ?></th>
							<th><?php echo $this->Paginator->sort('is_ativo', 'Ativo'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($enumerados as $enumerado): ?>
	<tr>
		<td><?php echo h($enumerado['Enumerado']['id']); ?>&nbsp;</td>
		<td><?php echo h($enumerado['Enumerado']['nome']); ?>&nbsp;</td>
		<td><?php echo h($enumerado['Enumerado']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($enumerado['Enumerado']['valor']); ?>&nbsp;</td>
		<td><i class="<?php echo ($enumerado['Enumerado']['is_ativo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $enumerado, 'model' => 'Enumerado')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
