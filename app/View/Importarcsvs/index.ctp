<div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Importar');?>
            	<small><?php echo __('Registros') ?></small>
				<?php echo $this->ButtonsActions->MakeButtons('Aluno', $this->params['action']); ?>
            </h3>
        </div>
	
	<div class="panel-body">

		<div class="importarcsv form">
		
			<?php echo $this->Form->create('Importarcsv', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'importar')); ?>

				<fieldset>

<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Importar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
