<?php echo $this->Html->css('chosen'); ?>
<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'chosen.html'; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3><?php echo __('Aviso'); ?>
            <small><?php echo __('Add') ?></small>
            <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="avisos form">
            <?php echo $this->Form->create('Aviso', array('role' => 'form', 'class'=>'form-horizontal', 'type' => 'file')); ?>
            <fieldset>
                <div class="form-group">
                    <?php echo $this->Form->input('data',
                        array('type' => 'text', 'autofocus' => 'autofocus', 'class' => 'form-control datepicker-start', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div>
                <!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('user_id',
                        array('class' => 'form-control combobox', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div>
                <!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('mensagem',
                        array('class' => 'form-control', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div>
                <!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('tipo_id',
                        array('class' => 'form-control combobox', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('video',
                        array('class' => 'form-control', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div>
                <!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->file('arq',
                        array('class' => 'form-control', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-8">', 'after'=>'</div>')); ?>
                </div>
                <div class="form-group">
                  <?php echo $this->Form->input('Grupo', array('label' => array('class'=>'col-sm-2 control-label', 'text' => 'Grupos'), 'class' => 'form-control chzn-select', 'multiple' => true, 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                  <?php echo $this->Form->input('Curso', array('label' => array('class'=>'col-sm-2 control-label', 'text' => 'Cursos'), 'class' => 'form-control chzn-select', 'multiple' => true, 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), 
                    array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.form -->
    </div>
    <!-- /#page-content .col-sm-9 -->
</div>

<?php echo $this->Html->script('chosen.jquery.js'); ?>
<?php include dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'chosenjs.html'; ?>