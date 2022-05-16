<?php echo $this->Html->css('chosen'); ?>
<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'chosen.html'; ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Notas e Frequências');?>
			<small><?php echo __('Lançar') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons('Aluno', $this->params['action']); ?>
		</h3>
	</div>	
	<div class="panel-body">
		<div class="notas form">
			<?php echo $this->Form->create('Nota', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'lancar')); ?>
			<fieldset>
				<div class="form-group" id="cursos">
	               <?php echo $this->Form->input('Curso',array('multiple' => true, 'class' => 'col-sm-10 chzn-select', 
	               	'label'=>array('text' => 'Cursos', 'class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>'));?>
	            </div><!-- .form-group -->
				<div class="form-group" id="disciplinas">
	               <?php echo $this->Form->input('Disciplina',array('multiple' => true, 'class' => 'col-sm-10 chzn-select', 
	               	'label'=>array('text' => 'Disciplinas', 'class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>'));?>
	            </div><!-- .form-group -->
				<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Consultar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

			</fieldset>
			<?php echo $this->Form->end(); ?>
		</div><!-- /.form -->
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

<?php echo $this->Html->script('chosen.jquery.js'); ?>
<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'chosenjs.html'; ?>