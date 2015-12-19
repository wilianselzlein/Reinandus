<div class="form-group">
	<?php echo $this->Form->label('index', null, array('text' => 'Index', 'class'=>'col-sm-2 control-label')); 
		echo $this->Form->input('index', 
			array('type' => 'checkbox', 'class' => 'form-control  checkbox2',
			'before'=>'<div class="col-sm-10">', 
			'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
	<?php echo $this->Form->label('view', null, array('text' => 'Visualizar', 'class'=>'col-sm-2 control-label')); 
		echo $this->Form->input('view', 
			array('type' => 'checkbox', 'class' => 'form-control  checkbox2',
			'before'=>'<div class="col-sm-10">', 
			'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
	<?php echo $this->Form->label('edit', null, array('text' => 'Alterar', 'class'=>'col-sm-2 control-label')); 
		echo $this->Form->input('edit', 
			array('type' => 'checkbox', 'class' => 'form-control  checkbox2',
			'before'=>'<div class="col-sm-10">', 
			'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
	<?php echo $this->Form->label('add', null, array('text' => 'Add', 'class'=>'col-sm-2 control-label')); 
		echo $this->Form->input('add', 
			array('type' => 'checkbox', 'class' => 'form-control  checkbox2',
			'before'=>'<div class="col-sm-10">', 
			'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
</div><!-- .form-group -->