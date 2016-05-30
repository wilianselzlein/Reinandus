<ul class="list-group">
<?php if (count($materiais) == 0) { ?> 
  <div class="alert alert-info" role="alert">
    <b>Nenhum material cadastrado.</b>
  </div>
<?php } ?>

<?php foreach ($materiais as $material): ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading">
      <?php echo date('d/m/Y', strtotime($material['vavisos']['aviso_data'])); ?>
    </h4>
    <p class="list-group-item-text">
      <pre><?php echo $material['vavisos']['aviso_mensagem']; ?></pre>
    </p>
    <br>
    <a href="/arqs/<?php echo basename($material['vavisos']['aviso_caminho']); ?>">
      <button type="button" class="btn btn-default btn-lg">
        <i class="fa fa-download"></i> Baixar 
      </button>
    </a>
    <small>
      <?php
        $tamanho = $material['vavisos']['aviso_tamanho'];
        if ($tamanho > 0)
          echo round($tamanho / 1024 / 1024, 2) . 'mb'; ?> 
    </small>
  </li>
  <br>
  <br>
<?php endforeach; ?>
</ul>