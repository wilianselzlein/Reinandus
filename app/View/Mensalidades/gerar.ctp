<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Mensalidade'); ?>
         <small><?php echo __('Gerar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], 'add'); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Mensalidades form">
         <?php echo $this->element('FormContrato', array('form' => 'Mensalidade', 'contrato' => false)); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
