<div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Usuario'); ?>
            <small><?php echo __('Add') ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3>
        </div>

	<div class="panel-body">

		<div class="grupos form">

			<?php echo $this->Form->create('User', array('role' => 'form', 'class'=>'form-horizontal')); ?>

				<fieldset>
					<div class="form-group">
						<?php echo $this->Form->input('username',    array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('password',    array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('re-password', array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'type'=>'password')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('pessoa_id combobox',   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('role_id',     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('assinatura',     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
	<a href='http://www.freeformatter.com/base64-encoder.html'>Gerar Base64</a>
					</div><!-- .form-group -->

					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->

	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
