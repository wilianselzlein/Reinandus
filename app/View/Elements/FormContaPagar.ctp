<?php if (! isset($baixa)) $baixa = False; ?>
<?php if (! isset($add)) $add = False; ?>
<?php if (! $baixa) { ?>
     <?php if (! $baixa) { ?>
            <div class="form-group">
               <?php 
                    /*echo $this->Form->input('simplificado',
                         array('type' => 'checkbox', 'class' => 'form-control checkbox2',
                         'before'=>'<div class="col-sm-10">',
                         'after'=>'</div>', 'div'=>false, 'checked'=>true));*/
                    echo $this->Form->input('simplificado', array('type' => 'checkbox', 'checked'=>true));
               ?>
            </div><!-- .form-group -->
     <?php } ?>
     <div class="form-group">
     <?php echo $this->Form->input('pessoa_id',
          array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
     <div class="form-group cad-simplificado hidden">
     <?php echo $this->Form->input('formapgto_id',
          array('class' => 'form-control combobox', 'value' => (isset($formapgto_id) ? $formapgto_id : ''), 'label'=>array('class'=>'col-sm-2 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
     <div class="form-group cad-simplificado hidden">
     <?php echo $this->Form->input('cadastro',
          array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
     <?php echo $this->Form->input('emissao',
          array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
     <div class="form-group">
     <?php echo $this->Form->input('documento',
          array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
     <?php echo $this->Form->input('serie',
          array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
     <div class="form-group">
     <?php echo $this->Form->input('tipo_id',
          array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
     <?php echo $this->Form->input('conta_id',
          array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
<?php } ?>
<div class="form-group">
<?php echo $this->Form->input('vencimento',
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('pagamento',
     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label cad-simplificado hidden', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4 cad-simplificado hidden">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group">
<?php echo $this->Form->input('valor',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
<?php echo $this->Form->input('saldo',
     array('class' => 'form-control ', 'label'=>array('class'=>'cad-simplificado hidden col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'wrap'=>false,'between'=>'<div class="col-sm-4 cad-simplificado hidden"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group cad-simplificado hidden">
<?php echo $this->Form->input('juro',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
<?php echo $this->Form->input('multa',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
</div><!-- .form-group -->
<div class="form-group cad-simplificado hidden">
<?php echo $this->Form->input('situacao_id',
     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php 
$user_id = $this->Session->read('Auth.User');
$user_id = $user_id['id'];
echo $this->Form->input('user_id',
     array('class' => 'form-control combobox', 'value' => ($add ? $user_id : ''), 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group cad-simplificado hidden">
<?php echo $this->Form->input('cheque',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('agencia',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group cad-simplificado hidden">
<?php echo $this->Form->input('banco_deposito',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
<?php echo $this->Form->input('conta_corrente',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->
<div class="form-group cad-simplificado hidden">
<?php echo $this->Form->input('portador',
     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
</div><!-- .form-group -->


<?php if (! $baixa) { ?>
     <div class="form-group">
     <?php echo $this->Form->input('observacao',
          array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
     </div><!-- .form-group -->
     <div class="form-group">
     <?php echo $this->Form->label('liberado', null, array('text' => 'Liberado', 'class'=>'col-sm-2 control-label', 'style' => 'padding-left: 0px;'));
     echo $this->Form->input('liberado',
          array('type' => 'checkbox', 'class' => 'form-control checkbox2',
          'before'=>'<div class="col-sm-10">',
          'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>

     </div><!-- .form-group -->
<?php } ?>
<script>
   $('#ContaPagarSimplificado').change(function(){
      if($(this).is(':checked')){
         $('.cad-simplificado').addClass('hidden');
      }else{
         $('.cad-simplificado').removeClass('hidden');
      }

   });
</script>