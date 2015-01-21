<div class="alert alert-info">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <?php 
echo $message;
echo $this->Html->link($link_text, $link_url, array("escape" => false));
   ?>
</div><!-- /.alert alert-info -->