<div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Programa'); ?> 
            	<small><?php echo __('Edit') ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h3>
        </div>
	
	<div class="panel-body">

		<div class="programas form">
		
			<?php echo $this->Form->create('Programa', array('role' => 'form', 'class'=>'form-horizontal')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('nome', 
				array('class' => 'form-control', 'autofocus' => 'autofocus', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->label(__('is_cadastro'), null, array('text' => 'Cadastro', 'class'=>'col-sm-2 control-label')); 
							echo $this->Form->input('is_cadastro', 
								array('type' => 'checkbox', 'class' => 'form-control  checkbox2',
								'before'=>'<div class="col-sm-10">', 
								'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); 
						?>
					</div><!-- .form-group -->

					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
