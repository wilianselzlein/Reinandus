<div class="panel panel-default">
  <div class="panel-body">
    <?php echo $this->Ajax->Form(array('type' => 'post', 'options' => array('id' => 'form_materiais', 'model'=>'Post', 'update'=>'div_materiais', 'indicator' => 'barra_materiais', 'url' => array('controller' => 'portal', 'action' => 'materiais')))); ?>
      <div class="form-group">
        <?php echo $this->Form->input('grupo', array('class' => 'form-control', 'options' => $grupos, 'selected' => $alunos['Curso']['grupo_id'], 'label'=>array('text' => 'Curso:'))); ?>
      </div><!-- .form-group -->
    <?php echo $this->Form->button('<i class="fa fa-search"></i>'.' '.__('Consultar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btn_materiais')); ?>
    <?php echo $this->Form->end() ?>
  </div>
</div>
<?php echo $this->element('BarraDeProgresso', array('nome' => 'barra_materiais')); ?>

<div id="div_materiais" class="list-group">
</div>

<script>document.getElementById('btn_materiais').click();</script>
