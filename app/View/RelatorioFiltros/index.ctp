
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">

		<div class="filtros index">
		
<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-print"></span> <?php echo __('RelatorioFiltros');?>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']) ?>
      </h3>
   </div>
</div>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('relatorio_dataset_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('campo'); ?></th>
                            <th><?php echo $this->Paginator->sort('campo_alias'); ?></th>
                            <th><?php echo $this->Paginator->sort('tipo_filtro'); ?></th>
                            <th><?php echo $this->Paginator->sort('is_obrigatorio', 'Obrigatório'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($relatoriofiltros as $filtro): ?>
	<tr>
		<td><?php echo h($filtro['RelatorioFiltro']['id']); ?>&nbsp;</td>
		<td>
                    <?php echo $this->Html->link($filtro['RelatorioDataset']['nome'], array('controller' => 'RelatorioDatasets', 'action' => 'view', $filtro['RelatorioDataset']['id'])); ?>
		</td>
        <td><?php echo h($filtro['RelatorioFiltro']['campo']); ?>&nbsp;</td>
        <td><?php echo h($filtro['RelatorioFiltro']['campo_alias']); ?>&nbsp;</td>
        <td>
			<?php echo $this->Html->link($filtro['Tipo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $filtro['Tipo']['id'])); ?>
        </td>
		<td><i class="<?php echo ($filtro['RelatorioFiltro']['is_obrigatorio'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $filtro['RelatorioFiltro']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $filtro['RelatorioFiltro']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $filtro['RelatorioFiltro']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $filtro['RelatorioFiltro']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->