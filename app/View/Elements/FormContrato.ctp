<?php echo $this->Form->create($form, array('role' => 'form', 'class'=>'form-horizontal')); ?>
     <fieldset>
          <div class="form-group">
               <?php echo $this->Form->input('aluno_id',
                    array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 
                    'div' => true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'value' => $aluno_id)); ?>
          </div><!-- .form-group -->
     <?php if ($aluno_id == null) { ?>
          <?php echo $this->Form->hidden('selecionou', array('value' => '1')); ?>
          <?php echo $this->Form->button('<i class="fa fa-arrow-right"></i>'.' '.__('Selecionar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
     <?php } else { ?>
          <?php echo $this->Form->hidden('selecionou', array('value' => '0')); ?>
          <?php if (! $contrato) { ?>
               <div class="form-group">
               <?php echo $this->Form->input('formapgto_id',
                    array('class' => 'form-control combobox', 'value' => (isset($formapgto_id) ? $formapgto_id : ''),
                         'label'=>array('class'=>'col-sm-2 control-label'), 
                         'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('conta_id',
                    array('class' => 'form-control combobox', 'value' => (isset($conta_id) ? $conta_id : ''),
                         'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 
                         'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
               </div><!-- .form-group -->
               <div class="form-group">
               <?php echo $this->Form->input('obs',
                    array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
               </div><!-- .form-group -->
          <?php } ?>
          <div class="form-group">
          <?php echo $this->Form->input('valor',
               array('class' => 'form-control currency calc', 'type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'),'div'=>false, 'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>', 'value' => $this->Number->currency($curso['valor'],''))); ?>
          <?php echo $this->Form->input('desconto',
               array('class' => 'form-control currency calc', 'type'=>'text', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>', 'value' => $this->Number->currency($curso['desconto'], ''))); ?>
          </div><!-- .form-group -->
          <div class="form-group">
          <?php echo $this->Form->input('bolsa',
               array('class' => 'form-control currency calc', 'type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'),'div'=>false, 'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
          <?php echo $this->Form->input('liquido',
               array('class' => 'form-control currency', 'type'=>'text', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-4"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>', 'value' => $this->Number->currency($curso['liquido'],''))); ?>
          </div><!-- .form-group -->
          <div class="form-group">
          <?php echo $this->Form->input('quantidade',
               array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
          <?php echo $this->Form->input('vencimento',
               array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
          </div><!-- .form-group -->

          <?php if ($contrato) { ?>

               <div class="form-group">
               <?php
                    $modelos = $this->Contratos->PegarArquivosDeModelos('Alunos');
                    asort($modelos);
                    echo $this->Form->input('modelo', array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'options' => $modelos)); ?>
               </div><!-- .form-group -->
          <?php } ?>
          <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Gerar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
     <?php } ?>
     </fieldset>
<?php echo $this->Form->end(); ?>

<?php echo $this->Html->script('Contrato-Calc');?>
