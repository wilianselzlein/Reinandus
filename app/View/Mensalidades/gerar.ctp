<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Mensalidade'); ?>
         <small><?php echo __('Gerar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], 'add'); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Mensalidades form">
         <?php echo $this->Form->create('Mensalidade', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
<div class="form-group">
<?php echo $this->Form->input('aluno_id', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('formapgto_id', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('conta_id', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('obs', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('valor', 
     array('class' => 'form-control currency', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
<?php echo $this->Form->input('desconto', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('bolsa', 
     array('class' => 'form-control currency', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
<?php echo $this->Form->input('liquido', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('quantidade', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('vencimento', 
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->

            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
