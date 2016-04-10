<?php if (!isset($model)) $model = 'Disciplina'; ?>
<?php if (!isset($controller)) $controller = 'disciplinas'; ?>
<div class="panel-footer">
      <h3><?php echo __('Disciplinas').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Disciplina'), array('controller' => 'disciplinas', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
               </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professores', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
               </li>
            </ul>       
         </div>
      </h3>
   </div>
   <div class="panel-body">
      <?php if (!empty($array[$model])): ?>
      <?php 
         $TemAluno = isset($array[$model][0]['Aluno']);
         $TemCurso = isset($array[$model][0]['Curso']);
      ?>
      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Disciplina'); ?></th>
                  <th><?php echo __('Professor'); ?></th>
                  <?php if ($TemCurso) { ?>
                     <th><?php echo __('Curso'); ?></th>
                  <?php } ?>
                  <?php if ($TemAluno) { ?>
                     <th><?php echo __('Aluno'); ?></th>
                  <?php } ?>
                  <th><?php echo __('Horas Aula'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($array[$model] as $disciplina): ?>
               <tr>
                  <td><?php echo $disciplina['id']; ?></td>
                  <td><?php echo $this->DisplayField->MakeLink($disciplina, 'disciplinas', 'id'); ?></td>
                  <td><?php echo $this->DisplayField->MakeLink($disciplina, 'professores', 'professor_id'); ?></td>
                  <?php if ($TemCurso) { ?>
                     <td><?php echo $this->DisplayField->MakeLink($disciplina, 'cursos', 'curso_id'); ?></td>
                  <?php } ?>
                  <?php if ($TemAluno) { ?>
                     <td><?php echo $this->DisplayField->MakeLink($disciplina, 'alunos', 'aluno_id'); ?></td>
                  <?php } ?>
                  <td><?php if (isset($disciplina['horas_aula'])) echo $disciplina['horas_aula']; ?></td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $disciplina, 'model' => '', 'controller' => $controller)); ?>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>

   </div><!-- /.related -->
