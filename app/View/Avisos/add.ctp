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
                        array('type' => 'text', 'class' => 'form-control datepicker-start', 
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
                <!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->file('arq',
                        array('class' => 'form-control', 
                         'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 
                         'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                </div>
                <!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('Grupo',array('multiple' => 'checkbox', 'class' => 'col-sm-10', 
                        'label'=>array('text' => 'Grupos'), 'div'=>'grupos', 
                        'before' => '<label for="chkgrupo" class=""><input type="checkbox" id="chkgrupo" text="Todos os grupos">Selecionar todos.</label>'));?>
                </div>
                <!-- .form-group -->
                <?php echo $this->element('MostraEsconde', 
                    array('mostra' => 'Mostrar cursos', 'esconde' => 'Fechar cursos')); ?>
                <div id="dados">
                    <div class="form-group">
                        <?php echo $this->Form->input('Curso',array('multiple' => 'checkbox', 'class' => 'col-sm-10',
                            'label'=>array('text' => 'Cursos'), 'div'=>'cursos',
                            'before' => '<label for="chkcurso" class=""><input type="checkbox" id="chkcurso" text="Todos os cursos">Selecionar todos.</label>'));?>
                    </div>
                    <!-- .form-group -->
                </div>
                <br/>
                <br/>
                <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), 
                    array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.form -->
    </div>
    <!-- /#page-content .col-sm-9 -->
</div>
<!-- /#page-container .row-fluid -->
<script>
    $(document).ready(function(){
     $('#chkgrupo').click(function () {
      var checked = $(this).is(':checked');
      $('.grupos input[type=checkbox]').each(function(){
        $(this).prop('checked', checked); 
      });
    }); 
    
     $('#chkcurso').click(function () {
      var checked = $(this).is(':checked');
      $('.cursos input[type=checkbox]').each(function(){
        $(this).prop('checked', checked); 
      });
    });
    })
</script>