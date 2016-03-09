<ul class="list-group">
<?php if (count($avisos) == 0) { ?> 
	<div class="alert alert-info" role="alert">
		<b>Nenhum aviso cadastrado.</b>
	</div>
<?php } ?>
<?php foreach ($avisos as $aviso): ?>
    <li class="list-group-item">
    	<h4 class="list-group-item-heading"><?php echo $aviso['Aviso']['data']; ?></h4>
   	 	<p class="list-group-item-text"><pre><?php echo $aviso['Aviso']['mensagem']; ?></pre></p>
    </li>
<?php endforeach; ?>
</ul>