<?php 
  $i = 0; 
  foreach ($avisos as $aviso): 
  if ($i === 0) { ?>
  	<a href="#" class="list-group-item active">
  <?php } else { ?>
  	<a href="#" class="list-group-item">
  <?php } ?>
    	<h4 class="list-group-item-heading"><?php echo $aviso['Aviso']['data']; ?></h4>
   	 	<p class="list-group-item-text"><pre><?php echo $aviso['Aviso']['mensagem']; ?></pre></p>
  	</a>
<?php $i++; endforeach; ?>
