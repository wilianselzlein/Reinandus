<?php if (! isset($baixa)) $baixa = False; ?>
<div class="form-group">
<?php echo $this->Form->input('aluno_id',
     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('numero',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('vencimento',
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('valor',
     array('class' => 'form-control currency calc', 'type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
<?php echo $this->Form->input('desconto',
     array('class' => 'form-control currency calc', 'type'=>'text', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'wrap'=>false,'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('acrescimo',
     array('class' => 'form-control currency calc', 'type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
<?php echo $this->Form->input('liquido',
     array('class' => 'form-control currency', 'type'=>'text', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
</div><!-- .form-group -->
<?php if ($baixa) { ?>
<div class="panel panel-default">
  <div class="panel-body">
<?php } ?>
<div class="form-group">
<?php echo $this->Form->input('pago',
     array('class' => 'form-control currency', 'type'=>'text', 'label'=>array('text' => 'Valor Pago', 'class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
<?php echo $this->Form->input('pagamento',
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<?php if (! $baixa) { ?>
<div class="form-group">
     <?php echo $this->Form->input('bolsa',
          array('class' => 'form-control currency', 'type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
     <?php echo $this->Form->label('renegociacao', null, array('text' => 'Renegociado', 'class'=>'col-sm-2 control-label', 'style' => 'padding-left: 0px;'));
     echo $this->Form->input('renegociacao',
     	array('type' => 'checkbox', 'class' => 'form-control checkbox2',
     	'before'=>'<div class="col-sm-2">',
     	'after'=>'</div>', 'div'=>false, 'label'=>false)); ?>
     </div><!-- .form-group -->
<?php } ?>
<div class="form-group">
<?php echo $this->Form->input('formapgto_id',
     array('class' => 'form-control combobox', 'value' => (isset($formapgto_id) ? $formapgto_id : ''), 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('conta_id',
     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('user_id',
     array('class' => 'form-control combobox', 'value' => (isset($user_id) ? $user_id : ''), 'label'=>array('text' => 'Recebido por', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('documento',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<?php if ($baixa) { ?>
</div>
  </div>
<?php } ?>
<?php if (! $baixa) { ?>
     <div class="form-group">
     <?php echo $this->Form->input('obs',
          array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-7">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
     <div class="form-group">
     <?php echo $this->Form->label('remessa', null, array('text' => 'Remessa Enviada', 'class'=>'col-sm-2 control-label'));
          echo $this->Form->input('remessa',
               array('type' => 'checkbox', 'class' => 'form-control checkbox2',
                    'before'=>'<div class="col-sm-1">',
                    'after'=>'</div>Desmarque para (re)enviar a remessa.', 'div'=>false, 'label'=>false)); ?>
     </div><!-- .form-group -->
<?php } ?>

<?php echo $this->Html->script('Mensalidade-Calc');?>
