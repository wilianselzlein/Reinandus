<div class="panel panel-default">
	<div class="panel-heading">
            <h3><?php echo __('PlanoConta'); ?> 
            	<small><?php echo __('Add') ?></small>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
	<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('PlanoContas'), array('action' => 'index'),array('escape'=>false)); ?></li>
                    </ul>
                </div>
            </h3>
    </div>
	<div class="panel-body">
		<div class="planocontas form">
			<?php echo $this->Form->create('PlanoConta', array('role' => 'form', 'class'=>'form-horizontal')); ?>
				<fieldset>
					<div class="form-group">
						<?php echo $this->Form->input('reduzido', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('analitico', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('descricao', 
				array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
				); ?>
					</div><!-- .form-group -->
					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
				</fieldset>
			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->		
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
