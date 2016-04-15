<ul class="list-group">
<?php foreach ($vagas as $vaga): ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading"><?php echo $vaga['vvagas']['vaga_data']; ?></h4>
    <p class="list-group-item-text">
    	<pre><?php echo $vaga['vvagas']['vaga_mensagem']; ?></pre>
    </p>
  </li>
<?php endforeach; ?>
</ul>