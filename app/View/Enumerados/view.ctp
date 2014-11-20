	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Enumerado'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Enumerado'), array('action' => 'edit', $enumerado['Enumerado']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Enumerado'), array('action' => 'delete', $enumerado['Enumerado']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $enumerado['Enumerado']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Enumerados'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Enumerado'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="enumerados view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Referencia'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['referencia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['valor']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Is Ativo'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['is_ativo']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	

</div><!-- /#page-container .row-fluid -->