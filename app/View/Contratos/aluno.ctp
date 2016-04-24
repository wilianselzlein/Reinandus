<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Contrato'); ?>
         <small><?php echo __('Gerar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons('Mensalidades', 'add'); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Contrato form">
            <?php echo $this->element('FormContrato', array('form' => 'Contrato', 'contrato' => true)); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->