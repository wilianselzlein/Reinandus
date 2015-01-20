<div class="panel panel-default ">
	<div class="panel-heading">
		<h2><?php echo __('HistoricoPadrao'); ?>
			<small><?php echo __('View'); ?></small>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
		<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('HistoricoPadrao'), array('action' => 'edit', $historicopadrao['HistoricoPadrao']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('HistoricoPadrao'), array('action' => 'delete', $historicopadrao['HistoricoPadrao']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $historicopadrao['HistoricoPadrao']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('HistoricoPadraos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('HistoricoPadrao'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
					</ul>
                </div>
            </h2>
        </div>
		<div class="historicopadraos view pandel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($historicopadrao['HistoricoPadrao']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($historicopadrao['HistoricoPadrao']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		</div><!-- /.view -->
			</div><!-- /.related -->
					<div class="panel-footer">
                <h3><?php echo __('LctoContabils').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('lctocontabil'), array('controller' => 'lancamentocontabil', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($historicopadrao['LancamentoContabil'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Debito'); ?></th>
		<th><?php echo __('Credito'); ?></th>
		<th><?php echo __('Valor'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php foreach ($historicopadrao['LancamentoContabil'] as $lctocontabil): ?>
		<tr>
			<td><?php echo $lctocontabil['id']; ?></td>
			<td><?php echo $lctocontabil['data']; ?></td>
            <td><?php echo $this->Html->link($lctocontabil['Debito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lctocontabil['Debito']['id']), array('class' => '')); ?>
             &nbsp;</td>
            <td><?php echo $this->Html->link($lctocontabil['Credito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lctocontabil['Credito']['id']), array('class' => '')); ?>
             &nbsp;</td>

			<td><?php echo $this->Number->currency($lctocontabil['valor'],'BRL');?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'lancamentocontabil', 'action' => 'view', $lctocontabil['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'lancamentocontabil', 'action' => 'edit', $lctocontabil['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'lancamentocontabil', 'action' => 'delete', $lctocontabil['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are yiou sure you want to delete # %s?', $lctocontabil['id'])); ?>
			</td>
		</tr>
									<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->
			
	

</div><!-- /#page-container .row-fluid -->