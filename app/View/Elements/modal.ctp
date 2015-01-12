<!-- Modal -->
<div class="modal fade modal-lg" id="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">           
         <div class="modal-body">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
         </div>            
      </div>
   </div>
</div>