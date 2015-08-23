<div class="panel panel-default">
  <div class="panel-body">
    <div class="form-group">
      <?php echo $this->Form->input('grupo', array('class' => 'form-control', 'options' => $grupos, 'label'=>array('text' => 'Curso:'))); ?>
    </div><!-- .form-group -->
  </div>
</div>
<div class="list-group">

<?php 
  $i = 0; 
  foreach ($avisos as $aviso): 
?>
  <?php if ($i === 0) { ?>
  <a href="#" class="list-group-item active">
  <?php } else { ?>
  <a href="#" class="list-group-item">
  <?php } ?>
    <h4 class="list-group-item-heading"><?php echo $aviso['Aviso']['data']; ?></h4>
    <p class="list-group-item-text"><pre><?php echo $aviso['Aviso']['mensagem']; ?></pre></p>
  </a>
<?php $i++; endforeach; ?>
</div>