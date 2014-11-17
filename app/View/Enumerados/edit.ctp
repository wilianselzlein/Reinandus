



    <div class="panel panel-default">

<div class="panel-heading">
            <h3>Enumerado                    <small><?php echo __('Edit') ?></small>


                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Actions <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    				<li><?php echo $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete'), array('action' => 'delete', $this->Form->value('Enumerado.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $this->Form->value('Enumerado.id'))); ?></li>
				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Enumerados'), array('action' => 'index'),array('escape'=>false)); ?></li>
                    </ul>
                </div>
            </h3>
        </div>



	
	<div class="panel-body">

		

		<div class="enumerados form">
		
			<?php echo $this->Form->create('Enumerado', array('role' => 'form', 'class'=>'form-horizontal')); ?>

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
						<?php echo $this->Form->input('referencia', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('valor', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('is_ativo', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
