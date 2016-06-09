
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">
		
		<div class="relatoriodatasets view">
<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-print"></span> <?php echo __('RelatorioDataset');?> <small> <?php echo __('View');?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h3>
   </div>
</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('relatorio_id'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($relatoriodataset['Relatorio']['nome'], array('controller' => 'relatorios', 'action' => 'view', $relatoriodataset['Relatorio']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('nome'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('sql'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['sql']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('order'); ?></strong></td>
		<td>
			<?php echo h($relatoriodataset['RelatorioDataset']['order']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
