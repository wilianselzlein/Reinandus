<div class="panel panel-default">

   <div class="panel-heading">
      <h3>
         <span class="fa fa-list"></span> <?php echo __('Notas e Frequências');?>
         <?php echo $this->ButtonsActions->MakeButtons('Alunos', 'index'); ?>
      </h3>
   </div>
   
   <ul class="list-group">
     <?php // <li class="list-group-item">Professor:&nbsp; echo $professor; </li> ?>
     <li class="list-group-item">Apenas alunos ativos.</li>
     <li class="list-group-item">Apenas alunos sem notas.</li>
     <li class="list-group-item">Curso(s):&nbsp;<?php if (is_array($cursos)) echo implode(",", $cursos); ?></li>
     <li class="list-group-item">Disciplina(s):&nbsp;<?php if (is_array($disciplinas)) echo implode(",", $disciplinas); ?></li>
   </ul>

   <div class="panel-body">
      <?php echo $this->Form->create('Notas', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'gravar')); ?>
         <table class="table table-bordered table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th>Id</th>
                  <th>Disciplina</th>
                  <th>Professor</th>
                  <th>Aluno</th>
                  <th>Nota</th>
                  <th>Frequência</th>
                  <th>Data</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $conta = -1;
                  foreach ($notas as $nota):
                  $id = $nota['AlunoDisciplina']['id']; 
                  $conta++;
               ?>
               <tr>
                  <td>
                     <?php echo h($nota['AlunoDisciplina']['id']); ?>&nbsp;
      <?php echo $this->Form->hidden('nota', array('type' => 'text', 'label'=>false, 'div'=>true, 
         'value' => $id, 'name' => 'data[' . $conta . '][AlunoDisciplina][id]')); ?>
                  </td>
                  <td>
                     <?php echo $this->Html->link($nota['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $nota['Disciplina']['id'])); ?>
                  </td>
                  <td>
                        <?php echo $this->Form->input('professor_id', array('class' => 'form-control combobox', 
                              'label' => false, 'div'=>true, 'value' =>  $nota['Professor']['id'], 
                              'name' => 'data[' . $conta . '][AlunoDisciplina][professor_id]')); ?>
                  </td>
                  <td>
                     <?php echo $this->Html->link($nota['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $nota['Aluno']['id'])); ?>
                  </td>
                  <td>
                     <div class="form-group">
      <?php echo $this->Form->input('nota', array('type' => 'text','label'=>false, 'div'=>true, 
         'value' => $nota['AlunoDisciplina']['nota'], 'name' => 'data[' . $conta . '][AlunoDisciplina][nota]')); ?>
                     </div><!-- .form-group -->
                  </td>
                  <td>
                     <div class="form-group">
      <?php echo $this->Form->input('frequencia', array('label'=>false, 'div'=>true, 
         'value' => $nota['AlunoDisciplina']['frequencia'], 'name' => 'data[' . $conta . '][AlunoDisciplina][frequencia]')); ?>
                     </div><!-- .form-group -->
                  </td>
                  <td>
                     <div class="form-group">
      <?php echo $this->Form->input('data',  array('class' => 'form-control datepicker-start', 'label'=>false, 
         'value' => $nota['AlunoDisciplina']['data'], 'div'=>false, 
         'name' => 'data[' . $conta . '][AlunoDisciplina][data]')
                  ); ?>
                     </div><!-- .form-group -->
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
         <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
      <?php echo $this->Form->end(); ?>
   </div>
</div>

