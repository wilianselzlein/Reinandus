
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">

		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3>
		         <span class="fa fa-print"></span> <?php echo __('RelatorioFiltro');?> <small><?php echo __('Add') ?></small>
		         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
		      </h3>
		   </div>
		</div>

		<div class="relatoriofiltros form">
		
			<?php echo $this->Form->create('RelatorioFiltro', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('relatorio_dataset_id', array('class' => 'form-control', 'options' => $relatoriodatasets)); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('campo', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('campo_alias', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('tipo_filtro', array('class' => 'form-control', 'options' => $tipos)); ?>
					</div><!-- .form-group -->
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->