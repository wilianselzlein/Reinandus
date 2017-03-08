<div class="panel panel-default">
  <div class="panel-body">
    <?php echo $this->Ajax->Form(array('type' => 'post', 'options' => array('id' => 'form_materiais', 'model'=>'Post', 'update'=>'div_materiais', 'indicator' => 'barra_materiais', 'url' => array('controller' => 'portal', 'action' => 'materiais')))); ?>
    <div style="float: left; width: 70%;">
      <div class="form-group">
        <?php echo $this->Form->input('grupo', array('class' => 'form-control', 'options' => $grupos, 'selected' => $alunos['valuno']['curso_grupo_id'], 'label'=>array('text' => 'Curso:'))); ?>
      </div><!-- .form-group -->
    </div>
    <div style="float: left; width: 30%;"> <br/> &nbsp; 
    <?php echo $this->Form->button('<i class="fa fa-search"></i>'.' '.__('Consultar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btn_materiais')); ?>
    </div>
    <?php echo $this->Form->end() ?>
  </div>
</div>
<i id="barra_materiais" class="fa fa-refresh fa-spin fa-2x fa-fw"></i>

<div id="div_materiais" class="list-group">
</div>

<script>document.getElementById('btn_materiais').click();</script>
