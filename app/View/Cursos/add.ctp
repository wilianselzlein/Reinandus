<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Curso'); ?>
         <small><?php echo __('Add') ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
      </h3>
   </div>

   <div class="panel-body">

      <div class="cursos form">

         <?php echo $this->Form->create('Curso', array('role' => 'form', 'class'=>'form-horizontal', 
             'inputDefaults' => array( 'label' => array('class'=>'col-sm-2 control-label'), 'div' => true, 'class' => 'form-control', 'after'=>'</div>', 'between'=>'<div class="col-sm-10">'))); ?>
         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('nome', array('autofocus' => 'autofocus')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('area'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('turma'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('num_turma'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sigla'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('carga'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('pessoa_id', array('class' => 'form-control combobox', 'label'=>array('text' => 'Secretário(a)'))); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('professor_id', array('class' => 'form-control combobox', 'label'=>array('text' => 'Coordenador'))); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('horario'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('valor',
                                             array('class' => 'form-control currency calc', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap'=>false,'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('percentual',
                                             array('class' => 'form-control currency calc', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">%</span>', 'after'=>'</div></div></div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('desconto',
                                             array('class' => 'form-control currency calc','type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false,  'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('liquido',
                                             array('class' => 'form-control currency','type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false,'wrap'=>false,  'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')); ?>
            </div><!-- .form-group -->
             <div class="form-group">
               <?php echo $this->Form->input('dia_vencimento',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10"><div class="col-sm-10"><div class="input-group">', 'after'=>'<span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></div>', 'wrap'=>false)); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('inicio', array('type' => 'text', 'class' => 'form-control datepicker-start')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fim',
                                             array('type' => 'text', 'class' => 'form-control datepicker-end', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sistema_aval'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('criterios_aval'); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('grupo_id', array('class' => 'form-control combobox')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('tipo_id', array('class' => 'form-control combobox')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('periodo_id'); ?>
            </div><!-- .form-group -->
            <div class="panel panel-default">
               <div class="panel-heading"><i class="fa fa-link"></i> Links</div>
               <div class="panel-body">
                  <div class="form-group">
                     <?php echo $this->Form->input('site'); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('monografia'); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('aviso'); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('calendario' ); ?>
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
