<h1>Change Your Password</h1>
<?php echo $this->form->create(null, array('action' => 'reset_password_token', 'id' => 'web-form')); ?>
    <?php echo $this->form->hidden('Aluno.reset_password_token'); ?>
	<?php echo $this->form->input('Aluno.new_passwd',  array('type' => 'password', 'label' => 'Password', 'between' => '<br />', 'type' => 'password') ); ?>
	<?php echo $this->form->input('Aluno.confirm_passwd',  array('type' => 'password', 'label' => 'Confirm Password', 'between' => '<br />', 'type' => 'password') ); ?>
	<?php echo $this->form->submit('Change Password', array('class' => 'submit', 'id' => 'submit')); ?>
<?php echo $this->form->end(); ?>