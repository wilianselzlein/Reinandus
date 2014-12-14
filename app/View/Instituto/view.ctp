	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Instituto'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Instituto'), array('action' => 'edit', $instituto['Instituto']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Instituto'), array('action' => 'delete', $instituto['Instituto']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $instituto['Instituto']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Institutos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Instituto'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="institutos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($instituto['Instituto']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Empresa'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($instituto['Empresa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Empresa']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Diretor'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($instituto['Diretor']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Diretor']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('TIpo'); ?></strong></td>
		<td>
			<?php echo h($instituto['Tipo']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
			
	

</div><!-- /#page-container .row-fluid -->