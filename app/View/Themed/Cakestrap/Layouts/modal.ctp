<div class="modal-header" style=" padding-top: 5px; padding-left: 15px; padding-right: 5px; padding-bottom: 5px; ">      

   <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-original-title="Fechar" data-placement="left">
      <span aria-hidden="true">&times;</span><span class="sr-only"><?php echo __('Close');?></span>
   </button>   

   <h5 class="modal-title" id="myModalLabel">Sistema Pós-Graduação &nbsp;
      <button type="button" class="form-reset btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Limpar campos">
         <i class="fa fa-fw fa-recycle"></i>
      </button>
   </h5>
</div>
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
<script>
   $('.modal-header .form-reset').click(function(){
      $('.modal-content [role="form"]')[0].reset();
   });
   $(document).ready(function(){ $('[data-toggle=tooltip]').tooltip()});
   $(document).ready(function(){ $('[data-tt=tooltip]').tooltip()});   
   $(document).ready(function(){ $('.combobox').combobox(); });
</script>
<?php echo $this->Html->script('cfg-datepicker');?>
<?php echo $this->Html->script('cfg-currency');?>
<?php echo $this->Html->script('cfg-percentage');?>
<?php echo $this->Html->script('cfg-cep');?>
<?php echo $this->Html->script('cfg-cpf');?>
<?php echo $this->Html->script('cfg-cnpj');?>
<?php echo $this->Html->script('cfg-dddphone');?>