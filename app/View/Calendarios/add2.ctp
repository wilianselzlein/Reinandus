<script type="text/javascript">
    $(document).ready(function(){
        $("#header").hide();
    });
</script>
<div class="calendarios form">
    <fieldset>
        <?php
            echo $this->form->create('Calendario', array('target' => '_parent'));
            echo $this->Form->input('curso_id', array('label' => 'Curso', 'class' => 'form-control'));
            echo '<br>';
            echo $this->Form->input('disciplina_id', array('label' => 'Disciplina', 'class' => 'form-control'));
            //echo $data . $hora;
            echo $this->Form->input('data', array('value' => $data . ' ' . $hora, 'class' => 'form-control'));
            /*echo '<br/>At: ' . $displayTime;
            echo $form->input('start', array('type'=>'hidden','value'=>$event['Event']['start']));
            echo $form->input('end', array('type'=>'hidden','value'=>$event['Event']['end']));
            echo $form->input('allday', array('type'=>'hidden','value'=>$event['Event']['allday']));
            echo $form->end(array('label'=>'Save' ,'name' => 'save')); */
            echo '<br>';
            echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary '));
            echo '<br>';
            echo $this->Form->end();
            echo '<br>';
        ?>
    </fieldset>
</div>
