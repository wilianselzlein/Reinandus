<h1>Digite seu login</h1>
<?php echo $this->Form->create(null, array('action' => 'forgot_password', 'id' => 'web-form')); ?>
	<?php echo $this->Form->input('Aluno.id.username', array('label' => 'Matrícula:', 'between'=>'<br />', 'type'=>'text')); ?>
	<?php echo $this->Form->submit('Enviar senha para email', array('class' => 'submit', 'id' => 'submit')); ?>
<?php echo $this->Form->end(); ?>