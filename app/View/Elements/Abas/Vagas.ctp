<ul class="list-group">
<?php foreach ($vagas as $vaga): ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading"><?php echo $vaga['Aviso']['data']; ?></h4>
    <p class="list-group-item-text">
    	<pre><?php echo $vaga['Aviso']['mensagem']; ?></pre>
    </p>
  </li>
<?php endforeach; ?>
</ul>