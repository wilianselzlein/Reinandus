<div class="form-group">
<?php echo $this->Form->input('aluno_id', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('numero', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('vencimento', 
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('valor', 
     array('class' => 'form-control currency', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
<?php echo $this->Form->input('desconto', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('acrescimo', 
     array('class' => 'form-control currency', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
<?php echo $this->Form->input('liquido', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('pago', 
     array('class' => 'form-control currency', 'label'=>array('text' => 'Valor Pago', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
<?php echo $this->Form->input('pagamento', 
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('bolsa', 
     array('class' => 'form-control currency', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')); ?>
<?php echo $this->Form->label('renegociacao', null, array('text' => 'Renegociado', 'class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;')); 
echo $this->Form->input('renegociacao', 
	array('type' => 'checkbox', 'class' => 'form-control checkbox2',
	'before'=>'<div class="col-sm-3">', 
	'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('formapgto_id', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('conta_id', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('user_id', 
     array('class' => 'form-control', 'label'=>array('text' => 'Recebido por', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('documento', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('obs', 
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->