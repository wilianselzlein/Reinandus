<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('ContaPagar'); ?>
         <small><?php echo __('Add') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="ContaPagars form">
         <?php echo $this->Form->create('ContaPagar', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
            <?php echo $this->element('FormContaPagar'); ?>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
