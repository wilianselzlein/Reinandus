<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Contrato'); ?>
         <small><?php echo __('Gerar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons('Mensalidades', 'add'); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Mensalidades form">
         <?php echo $this->Form->create('Contrato', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
<div class="form-group">
<?php echo $this->Form->input('professor_id', 
     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('disciplina_id', 
     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('horas_aula', 
     array('class' => 'form-control', 'autofocus' => 'autofocus', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('valor_aula', 
     array('class' => 'form-control currency', 'label'=>array('class'=>'col-sm-2 control-label', 'text' => 'Valor Módulo'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('datas', 
     array('class' => 'form-control', 'label'=>array('text' => 'Data(s)', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php 
$modelos = $this->Contratos->PegarArquivosDeModelos('Professor');
echo $this->Form->input('modelo', array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'options' => $modelos));
?>
</div><!-- .form-group -->
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Gerar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
