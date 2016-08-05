<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('LancamentoContabil'); ?>
         <small><?php echo __('Add') ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h3>
   </div>

   <div class="panel-body">

      <div class="lancamentocontabil form">

         <?php echo $this->Form->create('LancamentoContabil', array('role' => 'form', 'class'=>'form-horizontal')); ?>

         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('id',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->

            <div class="form-group">
               <?php echo $this->Form->input('data',
                                             array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('debito_id',
                                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('credito_id',
                                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('historico_padrao_id',
                                             array('options' => $historico_padrao, 'class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('identificador',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('documento',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('valor',
                                             array('class' => 'form-control currency', 'type' => 'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('complemento',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->

            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
