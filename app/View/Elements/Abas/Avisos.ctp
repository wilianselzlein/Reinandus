<div class="panel panel-default">
  <div class="panel-body">
    <?php echo $this->Ajax->Form(array('type' => 'post', 'options' => array('id' => 'form_avisos', 'model'=>'Post', 'update'=>'avisos', 'indicator' => 'loading', 'url' => array('controller' => 'portal', 'action' => 'avisos')))); ?>
      <div class="form-group">
        <?php echo $this->Form->input('grupo', array('class' => 'form-control', 'options' => $grupos, 'selected' => $alunos['Curso']['grupo_id'], 'label'=>array('text' => 'Curso:'))); ?>
      </div><!-- .form-group -->
    <?php echo $this->Form->button('<i class="fa fa-search"></i>'.' '.__('Consultar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
    <?php echo $this->Form->end() ?>
  </div>
</div>
<?php // <img id="loading" src="/img/indicator.gif" style="display: none"/> ?>
<?php echo $this->element('BarraDeProgresso'); ?>
<div id="avisos" class="list-group">
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
<script>
function load(){
document.form_avisos.submit()
}
</script>

<script type="text/javascript">
$(document).ready(function(){
     $('#form_avisos').submit();
});
</script>

<script>document.getElementById('form_avisos').submit();</script>

<script type='text/javascript'> window.onload = function(){ window.document.forms[0].submit(); }; </script>

<script type="text/javascript">
  $(document).ready(function() {
    window.document.forms[0].submit();
  });
</script>
