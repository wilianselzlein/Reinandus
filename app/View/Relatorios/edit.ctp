
<div id="page-container" class="row">
	
	<div id="page-content" class="col-sm-12">

		<div class="panel panel-default">
		   <div class="panel-heading">
		      <h3>
		         <span class="fa fa-print"></span> <?php echo __('Relatórios');?> <small><?php echo __('Edit') ?></small>
		         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
		      </h3>
		   </div>
		</div>

		<div class="relatorios form">
		
			<?php echo $this->Form->create('Relatorio', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('nome', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
                                        <div class="form-group">
						<?php echo $this->Form->input('tipo', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('arquivo', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
		            <div class="form-group">
		               <?php echo $this->Form->input('programa_id', array('class' => 'form-control combobox')); ?>
		            </div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('icone', array('class' => 'form-control')); ?>
						<a href='http://fortawesome.github.io/Font-Awesome/icons/'>Mais ícones</a>
					</div><!-- .form-group -->

					<?php echo $this->Form->button(__('Submit'), array('type' => 'button', 'id' => 'btn_', 'class' => 'btn btn-large btn-primary', 'onclick'=>'this.disabled=true; form.submit(); return true;')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->