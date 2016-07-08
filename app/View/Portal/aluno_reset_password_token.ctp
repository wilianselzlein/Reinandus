<h1>Trocar senha</h1>
<?php echo $this->form->create(null, array('action' => 'reset_password_token', 'id' => 'web-form')); ?>
    <?php echo $this->form->hidden('Aluno.reset_password_token'); ?>
	<?php echo $this->form->input('Aluno.new_passwd',  array('type' => 'password', 'label' => 'Senha', 'between' => '<br />', 'type' => 'password') ); ?>
	<?php echo $this->form->input('Aluno.confirm_passwd',  array('type' => 'password', 'label' => 'Confirmar Senha', 'between' => '<br/>', 'type' => 'password') ); ?>
	<br/>
	<?php echo $this->form->submit('Trocar Senha', array('class' => 'submit', 'id' => 'submit')); ?>
<?php echo $this->form->end(); ?>