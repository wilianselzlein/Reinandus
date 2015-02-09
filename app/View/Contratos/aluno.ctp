<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Contrato'); ?>
         <small><?php echo __('Gerar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons('Mensalidades', 'add'); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Mensalidades form">
         <?php echo $this->Form->create('Contrato', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
<?php echo $this->element('FormContrato'); ?>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Gerar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
