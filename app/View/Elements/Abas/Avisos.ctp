<div class="panel panel-default">
  <div class="panel-body">
    <?php echo $this->Ajax->Form(array('type' => 'post', 'options' => array('id' => 'form_avisos', 'model'=>'Post', 'update'=>'div_avisos', 'indicator' => 'loading', 'url' => array('controller' => 'portal', 'action' => 'avisos')))); ?>
      <?php echo $this->Form->input('cursos', array('id' => 'txt_cursos', 'default' =>  implode(',', $avisoscurso))); ?>
      <div class="form-group">
        <?php echo $this->Form->input('grupo', array('class' => 'form-control', 'options' => $grupos, 'selected' => $alunos['Curso']['grupo_id'], 'label'=>array('text' => 'Curso:'))); ?>
      </div><!-- .form-group -->
    <?php echo $this->Form->button('<i class="fa fa-search"></i>'.' '.__('Consultar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btn_Avisos')); ?>
    <?php echo $this->Form->end() ?>
  </div>
</div>
<?php echo $this->element('BarraDeProgresso'); ?>

<div id="div_avisos" class="list-group">
</div>

<script>document.getElementById('btn_Avisos').click();</script>
<script>
$('#btn_Avisos').click(function(){
    document.getElementById('txt_cursos').value = "";
});
</script>
