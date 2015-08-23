<div class="list-group">
<?php $i = 0; foreach ($vagas as $vaga): ?>
  <?php if ($i === 0) { ?>
  <a href="#" class="list-group-item active">
  <?php } else { ?>
  <a href="#" class="list-group-item">
  <?php } ?>
    <h4 class="list-group-item-heading"><?php echo $vaga['Aviso']['data']; ?></h4>
    <p class="list-group-item-text">
    	<pre><?php echo $vaga['Aviso']['mensagem']; ?></pre>
    </p>
  </a>
<?php $i++; endforeach; ?>
</div>