<div class="modal-header">      

   <button type="button" class="close" data-dismiss="modal" data-toggle="tooltip" data-original-title="Fechar" data-placement="left">
      <span aria-hidden="true">&times;</span><span class="sr-only"><?php echo __('Close');?></span>
   </button>   

   <h4 class="modal-title" id="myModalLabel">Tela Modal
      &nbsp;
      <button type="button" class="form-reset btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Limpar campos">
         <i class="fa fa-fw fa-recycle"></i>
      </button>
   </h4>
</div>
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>
<script>
   $('.modal-header .form-reset').click(function(){
      $('.modal-content [role="form"]')[0].reset();
   });

   $(document).ready(function(){ $('[data-toggle=tooltip]').tooltip()});
</script>