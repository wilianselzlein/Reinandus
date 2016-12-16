<div class="form-group">
<?php
	$alias = Inflector::classify($this->params['controller']);
	if (! isset($this->data[$alias]['modified'])) 
		return;

	echo $this->Form->input('modified2',
     array('type' => 'hidden', 'value' => $this->data[$alias]['modified'], 'class' => 'form-control date', 
     	'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
    ); ?>
</div>
<!-- .form-group -->
