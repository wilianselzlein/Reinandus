<?php 
  $i = 0;
  foreach ($materiais as $material): 
?>
  <?php if ($i === 0) { ?>
  <a href="#" class="list-group-item active">
  <?php } else { ?>
  <a href="#" class="list-group-item">
  <?php } ?>
    <h4 class="list-group-item-heading">
      <?php echo $material['Aviso']['data']; ?>
    </h4>
    <p class="list-group-item-text">
      <pre><?php echo $material['Aviso']['mensagem']; ?></pre>
    </p>
  </a>
<br>
<a href="/arqs/<?php echo basename($material['Aviso']['caminho']); ?>">
  <button type="button" class="btn btn-default btn-lg">
    <i class="fa fa-download"></i> Baixar 
  </button>
</a>
<br>
<br>
<?php $i++; endforeach; ?>
