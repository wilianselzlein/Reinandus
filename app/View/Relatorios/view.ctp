<div id="page-container" class="row">
	<div id="page-content" class="col-sm-12">
		<div class="relatorios view">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>
						<span class="fa fa-print"></span> <?php echo __('Relatório');?> <small><?php echo __('View') ?></small>
						<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
					</h3>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($relatorio['Relatorio']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('nome'); ?></strong></td>
							<td>
								<?php echo h($relatorio['Relatorio']['nome']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('arquivo'); ?></strong></td>
							<td>
								<?php echo h($relatorio['Relatorio']['arquivo']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('tipo'); ?></strong></td>
							<td>    
								<?php echo h($relatorio['Relatorio']['tipo']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Ícone'); ?></strong></td>
							<td>    
								<i class="fa <?php echo h($relatorio['Relatorio']['icone']); ?> fa-4x"></i>&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
				<!-- /.table table-striped table-bordered -->
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.view -->
		<div class="related">
			<h3><?php echo __('RelatorioDatasets'); ?></h3>
			<?php if (!empty($relatorio['RelatorioDataset'])): ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo __('Id'); ?></th>
							<th><?php echo __('Nome'); ?></th>
							<th><?php echo __('Sql'); ?></th>
							<th><?php echo __('Order'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($relatorio['RelatorioDataset'] as $dataset): ?>
						<tr>
							<td><?php echo $dataset['id']; ?></td>
							<td><?php echo $dataset['nome']; ?></td>
							<td>
								<pre><?php echo $dataset['sql']; ?></pre>
							</td>
							<td><?php echo $dataset['order']; ?></td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('controller' => 'RelatorioDatasets', 'action' => 'view', $dataset['id']), array('class' => 'btn btn-default btn-xs')); ?>
								<?php echo $this->Html->link(__('Edit'), array('controller' => 'RelatorioDatasets', 'action' => 'edit', $dataset['id']), array('class' => 'btn btn-default btn-xs')); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'RelatorioDatasets', 'action' => 'delete', $dataset['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $dataset['id'])); ?>
							</td>
						</tr>
						<?php if (!empty($dataset['RelatorioFiltro'])): ?>
						<tr>
							<td colspan="5">
								<div class="related">
									<h3><?php echo __('RelatorioFiltros'); ?></h3>
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th><?php echo __('Id'); ?></th>
													<th><?php echo __('Campo'); ?></th>
													<th><?php echo __('campo_alias'); ?></th>
													<th><?php echo __('tipo_filtro'); ?></th>
													<th class="actions"><?php echo __('Actions'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($dataset['RelatorioFiltro'] as $filtro): ?>
												<tr>
													<td><?php echo $filtro['id']; ?></td>
													<td><?php echo $filtro['campo']; ?></td>
													<td><?php echo $filtro['campo_alias']; ?></td>
													<td><?php echo $this->DisplayField->MakeLink($filtro, 'enumerados', 'tipo_filtro'); ?></td>
													<td class="actions">
														<?php echo $this->Html->link(__('View'), array('controller' => 'RelatorioFiltros', 'action' => 'view', $filtro['id']), array('class' => 'btn btn-default btn-xs')); ?>
														<?php echo $this->Html->link(__('Edit'), array('controller' => 'RelatorioFiltros', 'action' => 'edit', $filtro['id']), array('class' => 'btn btn-default btn-xs')); ?>
														<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'RelatorioFiltros', 'action' => 'delete', $filtro['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $filtro['id'])); ?>
													</td>
												</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
										<!-- /.table table-striped table-bordered -->
									</div>
									<!-- /.table-responsive -->
									<div class="actions">
										<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('Filtro'), 
											array('controller' => 'RelatorioFiltros', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				
									</div>
									<!-- /.actions -->
								</div>
								<!-- /.related -->
							</td>
						</tr>
						<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
				<!-- /.table table-striped table-bordered -->
			</div>
			<!-- /.table-responsive -->
			<?php endif; ?>
			<div class="actions">
				<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New').' '.__('RelatorioDatasets'), 
					array('controller' => 'relatoriodatasets', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
			</div>
			<!-- /.actions -->
		</div>
		<!-- /.related -->
	</div>
	<!-- /#page-content .span9 -->
</div>
<!-- /#page-container .row-fluid -->