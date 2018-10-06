<?php 
if ($ajax) {
   echo $this->Html->css('datepicker3');
   //echo $this->Html->css('bootstrap-combobox');
   echo $this->Html->script('cfg-datepicker');
?>
   <script>
      $(document).ready(function(){ $('.combobox').combobox(); });
   </script>
<?php } ?>
<div class="panel panel-default">
   <div class="panel-heading">
      <h3><?php echo __('Calendario'); ?>
         <small><?php echo __('Add') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="calendarios form">
         <?php echo $this->Form->create('Calendario', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('curso_id',
                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('disciplina_id',
                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('data',
                     array('type' => 'text', 'value' => $data . ' ' . $hora, 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            
            <table id="mytable" border="0" width="100%">
               <tr id="data0" style="display:none;">
                  <td>
                        <?php echo $this->Form->input('unused.data',
                                 array('type' => 'text', 'class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                        <br><br>
                  </td>
                  <td>
                        <?php echo $this->Html->image('minus.png', array('alt' => 'Remover Data')) ?>
                     
                  </td>
               </tr>
               <tr id="trAdd" >
                  <td colspan="2">
                     <div align="center">
                     <?php echo $this->Form->button('Adicionar Data',array('type'=>'button','title'=>'Adicionar Data','onclick'=>'addData()'));?>
                     </div>
                  </td>
               </tr>
            </table>
            <?php /*echo '<br/>At: ' . $displayTime;
           echo $form->input('start', array('type'=>'hidden','value'=>$event['Event']['start']));
           echo $form->input('end', array('type'=>'hidden','value'=>$event['Event']['end']));
           echo $form->input('allday', array('type'=>'hidden','value'=>$event['Event']['allday']));
           echo $form->end(array('label'=>'Save' ,'name' => 'save')); */?>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->

 <script type='text/javascript'>
    var lastRow=0;
    
    function addData() {
        lastRow++;
        $("#mytable>tbody>tr#data0").clone(true).attr('id','data'+lastRow).removeAttr('style').insertBefore("#mytable>tbody>tr#trAdd");
        $("#data"+lastRow+" img").attr('onclick','removeData('+lastRow+')');
        $("#data"+lastRow+" input").attr('name','data[Calendario][dataA]['+lastRow+']').attr('id','Calendario'+lastRow+'data');
        $("#data"+lastRow+" label").attr('for','Calendario'+lastRow+'data');
        $("#Calendario"+lastRow+"data").mask("99/99/9999"); 
        $("#Calendario"+lastRow+"data").focus();
        //$("#data"+lastRow+" li").attr('id','CalendarioData'+lastRow+'Id_chzn_o_1');
        //$("#Calendario"+lastRow+"data").attr('style','width: 400px;');
    }
    function removeData(x) {
        $("#data"+x).remove();
    }
</script
