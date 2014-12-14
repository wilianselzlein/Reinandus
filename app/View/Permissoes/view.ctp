	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Permissao'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Permissao'), array('action' => 'edit', $permissao['Permissao']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Permissao'), array('action' => 'delete', $permissao['Permissao']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $permissao['Permissao']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Permissaos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Permissao'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Programas'), array('controller' => 'programas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Programa'), array('controller' => 'programas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="permissaos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($permissao['Permissao']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($permissao['User']['username'], array('controller' => 'users', 'action' => 'view', $permissao['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Programa'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($permissao['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $permissao['Programa']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Index'); ?></strong></td>
		<td>
			<i class="<?php echo ($permissao['Permissao']['index'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('View'); ?></strong></td>
		<td>
			<i class="<?php echo ($permissao['Permissao']['view'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Edit'); ?></strong></td>
		<td>
			<i class="<?php echo ($permissao['Permissao']['edit'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Add'); ?></strong></td>
		<td>
			<i class="<?php echo ($permissao['Permissao']['add'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	

</div><!-- /#page-container .row-fluid -->