<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Curso'); ?>
         <small><?php echo __('Edit') ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h3>
   </div>

   <div class="panel-body">

      <div class="cursos form">

         <?php echo $this->Form->create('Curso', array('role' => 'form', 'class'=>'form-horizontal')); ?>

         <fieldset>

            <div class="form-group">
               <?php echo $this->Form->input('id',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('nome',
                                             array('class' => 'form-control', 'autofocus' => 'autofocus', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('turma',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('num_turma',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sigla',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('carga',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('pessoa_id',
                                             array('class' => 'form-control combobox', 'label'=>array('text' => 'Secretário(a)', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('professor_id',
                                             array('class' => 'form-control combobox', 'label'=>array('text' => 'Coordenador', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('horario',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('valor',
                                             array('class' => 'form-control currency calc', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('percentual',
                                             array('class' => 'form-control currency calc', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('desconto',
                                             array('class' => 'form-control currency calc','type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('liquido',
                                             array('class' => 'form-control currency','type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('dia_vencimento',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group">', 'after'=>'<span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('inicio',
                                             array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fim',
                                             array('type' => 'text', 'class' => 'form-control datepicker-end', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sistema_aval',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('criterios_aval',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('grupo_id',
                                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('tipo_id',
                                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('periodo_id',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="panel panel-default">
               <div class="panel-heading"><i class="fa fa-link"></i> Links</div>
               <div class="panel-body">
                  <div class="form-group">
                     <?php echo $this->Form->input('site',
                                                   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('monografia',
                                                   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('aviso',
                                                   array('type' => 'text', 'class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('calendario',
                                                   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
               </div>
            </div>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

<?php echo $this->Html->script('Curso-Calc');?>
