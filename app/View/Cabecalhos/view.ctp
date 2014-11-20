	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Cabecalho'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Cabecalho'), array('action' => 'edit', $cabecalho['Cabecalho']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Cabecalho'), array('action' => 'delete', $cabecalho['Cabecalho']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $cabecalho['Cabecalho']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cabecalhos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cabecalho'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="cabecalhos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Logo'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['logo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cabecalho'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['cabecalho']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Rodape'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['rodape']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Figura'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['figura']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	

</div><!-- /#page-container .row-fluid -->