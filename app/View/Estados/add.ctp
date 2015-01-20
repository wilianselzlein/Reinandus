



    <div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Estado'); ?>                    <small><?php echo __('Add') ?></small>


                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Estados'), array('action' => 'index'),array('escape'=>false)); ?></li>
                              <li class="divider"></li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'),array('escape'=>false)); ?> </li>
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'),array('escape'=>false)); ?> </li>
                    </ul>
                </div>
            </h3>
        </div>



	
	<div class="panel-body">

		

		<div class="estados form">
		
			<?php echo $this->Form->create('Estado', array('role' => 'form', 'class'=>'form-horizontal')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('pais', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('nome', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('sigla', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
