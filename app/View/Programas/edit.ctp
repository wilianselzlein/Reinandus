



    <div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Programa'); ?>                    <small><?php echo __('Edit') ?></small>


                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    				<li><?php echo $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete'), array('action' => 'delete', $this->Form->value('Programa.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $this->Form->value('Programa.id'))); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Programas'), array('action' => 'index'),array('escape'=>false)); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Permissaos'), array('controller' => 'permissaos', 'action' => 'index'),array('escape'=>false)); ?> </li>
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Permissao'), array('controller' => 'permissaos', 'action' => 'add'),array('escape'=>false)); ?> </li>
                    </ul>
                </div>
            </h3>
        </div>



	
	<div class="panel-body">

		

		<div class="programas form">
		
			<?php echo $this->Form->create('Programa', array('role' => 'form', 'class'=>'form-horizontal')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('nome', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php    echo $this->Form->label(__('is_cadastro'), null, array('text' => 'Cadastro', 'class'=>'col-sm-2 control-label')); 
                           echo $this->Form->input('is_cadastro', 
                                                array('type' => 'checkbox', 'class' => 'form-control  checkbox2',                                              
                                                      'before'=>'<div class="col-sm-10">', 
                                                      'after'=>'</div>',
                                                      'div'=>false, 
                                                      'label'=>false, 
                                                      'checked'=>true)); 
                  ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
