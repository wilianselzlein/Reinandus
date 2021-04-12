<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Cidade'); ?>
         <small><?php echo __('Edit') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h3>
   </div>

   <div class="panel-body">

      <div class="cidades form">
         <?php echo $this->Form->create('Cidade', array('role' => 'form', 'class'=>'form-horizontal', 
             'inputDefaults' => array( 'label' => array('class'=>'col-sm-2 control-label'), 'div' => true, 'class' => 'form-control', 'after'=>'</div>', 'between'=>'<div class="col-sm-10">'))); ?>
         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('id'); ?>
            </div>
            <div class="form-group">
               <?php echo $this->Form->input('estado_id', array('class' => 'form-control combobox')); ?>
            </div>
            <div class="form-group">
               <?php echo $this->Form->input('nome', array('autofocus' => 'autofocus')); ?>
            </div>
            <div class="form-group">
               <?php echo $this->Form->input('cep', array('class' => 'form-control')); ?>
            </div>
            <?php echo $this->element('CampoModified'); ?>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
