<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Evento'); ?>
         <small><?php echo __('Add') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], 'Add', $this->params['pass'][0]); ?>
      </h3>
   </div>

   <div class="panel-body">
       
        <div class="calendarios form">
     
            <fieldset>
                <?php echo $this->form->create('Calendario', array('target' => '_parent', 'role' => 'form', 'class'=>'form-horizontal')); 
                    //echo $this->Form->input('curso_id', array('label' => 'Curso', 'class' => 'form-control')); ?>
                    <div class="form-group">
                       <?php echo $this->Form->input('curso_id',
                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-9">', 'after'=>'</div>')); ?>
                    </div><!-- .form-group -->
                    <div class="form-group">
                       <?php echo $this->Form->input('disciplina_id',
                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-9">', 'after'=>'</div>')); ?>
                    </div><!-- .form-group -->
                                <div class="form-group">
                       <?php echo $this->Form->input('data',
                             array('type' => 'text', 'value' => $data . ' ' . $hora, 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
                    </div><!-- .form-group -->
        
                    <?php 
                    /*echo '<br/>At: ' . $displayTime;
                    echo $form->input('start', array('type'=>'hidden','value'=>$event['Event']['start']));
                    echo $form->input('end', array('type'=>'hidden','value'=>$event['Event']['end']));
                    echo $form->input('allday', array('type'=>'hidden','value'=>$event['Event']['allday']));
                    echo $form->end(array('label'=>'Save' ,'name' => 'save')); */
        
                    echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary '));
                    echo $this->Form->end();
                ?>
            </fieldset>
        </div>
    </div>
</div>