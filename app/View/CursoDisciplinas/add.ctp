<div class="panel panel-default">

	<div class="panel-heading">
		<h3><?php echo __('Disciplina'); ?>
			<small><?php echo __('Add') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
		</h3>
	</div>

	<div class="panel-body">
		<?php echo $this->Form->create('CursoDisciplina', array('role' => 'form', 'class'=>'form-horizontal')); ?>

		<fieldset>
			<div class="form-group">
			<?php echo $this->Form->hidden('curso_id', array('type' => 'text', 'class' => 'form-control', 'value' => $curso_id, 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('disciplina_id', array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('professor_id', array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('horas_aula', array('class' => 'form-control', 'autofocus' => 'autofocus', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
			</div>

			<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

		</fieldset>

		<?php echo $this->Form->end(); ?>
	</div>
</div>
