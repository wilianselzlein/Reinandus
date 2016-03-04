<ul class="list-group">
<?php foreach ($materiais as $material): ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading">
      <?php echo $material['Aviso']['data']; ?>
    </h4>
    <p class="list-group-item-text">
      <pre><?php echo $material['Aviso']['mensagem']; ?></pre>
    </p>
    <br>
    <a href="/arqs/<?php echo basename($material['Aviso']['caminho']); ?>">
      <button type="button" class="btn btn-default btn-lg">
        <i class="fa fa-download"></i> Baixar 
      </button>
    </a>
    <small>
      <?php
        $tamanho = $material['Aviso']['tamanho'];
        if ($tamanho > 0)
          echo round($tamanho / 1024 / 1024, 2) . 'mb'; ?> 
    </small>
  </li>
  <br>
  <br>
<?php endforeach; ?>
</ul>