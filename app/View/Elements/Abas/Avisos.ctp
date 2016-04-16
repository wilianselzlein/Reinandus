<div class="panel panel-default">
  <div class="panel-body">
    <?php echo $this->Ajax->Form(array('type' => 'post', 'options' => array('id' => 'form_avisos', 'model'=>'Post', 'update'=>'div_avisos', 'indicator' => 'barra_avisos', 'url' => array('controller' => 'portal', 'action' => 'avisos')))); ?>
    <div style="float: left; width: 70%;">
      <div class="form-group">
        <?php echo $this->Form->input('grupo', array('class' => 'form-control', 'options' => $grupos, 'selected' => $alunos['valuno']['curso_grupo_id'], 'label'=>array('text' => 'Curso:'))); ?>
      </div><!-- .form-group -->
    </div>
    <div style="float: left; width: 30%;"> <br/> &nbsp; 
    <?php echo $this->Form->button('<i class="fa fa-search"></i>'.' '.__('Consultar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btn_Avisos')); ?>
    </div>
    <?php echo $this->Form->end() ?>
  </div>
</div>
<?php echo $this->element('BarraDeProgresso', array('nome' => 'barra_avisos')); ?>

<div id="div_avisos" class="list-group">
</div>

<script>document.getElementById('btn_Avisos').click();</script>
