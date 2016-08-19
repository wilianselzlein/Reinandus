<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Aviso'); ?>
			<small><?php echo __('Edit') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
		</h3>
	</div>
	<div class="panel-body">
		<div class="avisos form">
			<?php echo $this->Form->create('Aviso', array('role' => 'form', 'class'=>'form-horizontal')); ?>
			<fieldset>
				<div class="form-group">
					<?php echo $this->Form->input('id',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 
						'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('data',
						array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 
						'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('user_id',
						array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 
						'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('mensagem',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 
						'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('tipo_id',
						array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 
						'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php //echo $this->Form->input('Grupo',array('multiple' => 'checkbox', /*'class' => 'form-control',*/ 
						//'label'=>array('text' => 'Grupos', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>'));?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php //echo $this->Form->input('Curso',array('multiple' => 'checkbox', /*'class' => 'form-control',*/ 
						//'label'=>array('text' => 'Cursos', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>'));?>
				</div>
				<!-- .form-group -->
				<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
			</fieldset>
			<?php echo $this->Form->end(); ?>
		</div>
		<!-- /.form -->
		<?php
		   $data = $this->request->data;
		   echo $this->element('Avisos/Cursos', array('array' => $data['Curso']));
   		echo $this->element('Avisos/Grupos', array('array' => $data['Grupo'])); 
		?>
	</div>
	<!-- /#page-content .col-sm-9 -->
</div>
<!-- /#page-container .row-fluid -->