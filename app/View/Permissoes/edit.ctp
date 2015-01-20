



    <div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Permissao'); ?>                    <small><?php echo __('Edit') ?></small>


                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    				<li><?php echo $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete'), array('action' => 'delete', $this->Form->value('Permissao.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $this->Form->value('Permissao.id'))); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Permissaos'), array('action' => 'index'),array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'),array('escape'=>false)); ?> </li>
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'),array('escape'=>false)); ?> </li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Programas'), array('controller' => 'programas', 'action' => 'index'),array('escape'=>false)); ?> </li>
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Programa'), array('controller' => 'programas', 'action' => 'add'),array('escape'=>false)); ?> </li>
                    </ul>
                </div>
            </h3>
        </div>

	<div class="panel-body">

		<div class="permissaos form">
		
			<?php echo $this->Form->create('Permissao', array('role' => 'form', 'class'=>'form-horizontal')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('user_id', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('programa_id', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->

					<?php echo $this->element('ChecksPermissao'); ?>

					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
