	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Programa'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Programa'), array('action' => 'edit', $programa['Programa']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Programa'), array('action' => 'delete', $programa['Programa']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $programa['Programa']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Programas'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Programa'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Permissaos'), array('controller' => 'permissaos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Permissao'), array('controller' => 'permissaos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="programas view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($programa['Programa']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($programa['Programa']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Is Cadastro'); ?></strong></td>
		<td>
			<?php echo h($programa['Programa']['is_cadastro']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					<div class="panel-footer">
                <h3><?php echo __('Permissaos').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Permissao'), array('controller' => 'permissaos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($programa['Permissao'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Programa Id'); ?></th>
		<th><?php echo __('Index'); ?></th>
		<th><?php echo __('View'); ?></th>
		<th><?php echo __('Edit'); ?></th>
		<th><?php echo __('Add'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($programa['Permissao'] as $permissao): ?>
		<tr>
			<td><?php echo $permissao['id']; ?></td>
			<td><?php echo $permissao['user_id']; ?></td>
			<td><?php echo $permissao['programa_id']; ?></td>
			<td><?php echo $permissao['index']; ?></td>
			<td><?php echo $permissao['view']; ?></td>
			<td><?php echo $permissao['edit']; ?></td>
			<td><?php echo $permissao['add']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'permissaos', 'action' => 'view', $permissao['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'permissaos', 'action' => 'edit', $permissao['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'permissaos', 'action' => 'delete', $permissao['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $permissao['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			
	

</div><!-- /#page-container .row-fluid -->