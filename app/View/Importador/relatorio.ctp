<div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Relatório');?>
            	<small><?php echo __('Registros') ?></small>
				<?php echo $this->ButtonsActions->MakeButtons('Aluno', $this->params['action']); ?>
            </h3>
        </div>
	
	<div class="panel-body">

		<div class="importador form">

			<?php echo $this->Form->create('Importador', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'relatorio')); ?>

				<fieldset>

<?php echo $this->Form->input('Caminho', array('value' => 'D:\\Delphi\\PosGraduacao\\exe\\BANCO.FDB')); ?>

<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Gerar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

<?php if(count($dados) > 0) debug($dados); ?>

<?php echo $this->Html->link('<i class="fa fa-edit"></i> Importar', array('controller' => 'importador', 'action' => 'index'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Importar'), 'data-toggle'=>'tooltip')); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
