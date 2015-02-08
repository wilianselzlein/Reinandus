<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Mensalidade'); ?>
         <small><?php echo __('Baixar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], 'view', $this->params['pass'][0]); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Mensalidades form">
         <?php echo $this->Form->create('Mensalidade', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
         <div class="form-group">
			<?php echo $this->Form->input('id', 
		     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
		</div><!-- .form-group -->
            <?php echo $this->element('FormMensalidade', array('baixa' => True)); ?>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
