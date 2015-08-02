
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">
		
		<div class="relatoriofiltros view">

		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3>
		         <span class="fa fa-print"></span> <?php echo __('RelatorioFiltro');?> <small><?php echo __('View') ?></small>
		         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
		      </h3>
		   </div>
		</div>

			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('relatorio_dataset_id'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($relatoriofiltro['RelatorioDataset']['nome'], array('controller' => 'RelatorioDatasets', 'action' => 'view', $relatoriofiltro['RelatorioDataset']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('campo'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['campo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('campo_alias'); ?></strong></td>
		<td>
			<?php echo h($relatoriofiltro['RelatorioFiltro']['campo_alias']); ?>
			&nbsp;
		</td>
</tr>
<tr>
	<td><strong><?php echo __('Tipo'); ?></strong></td>
	<td><?php echo $this->Html->link($relatoriofiltro['Tipo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $relatoriofiltro['Tipo']['id']), array('class' => '')); ?>&nbsp;</td>
</tr><tr>		<td><strong><?php echo __('Obrigatório'); ?></strong></td>
		<td><i class="<?php echo ($relatoriofiltro['RelatorioFiltro']['is_obrigatorio'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr>

   					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
