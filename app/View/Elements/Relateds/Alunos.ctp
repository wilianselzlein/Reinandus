<?php if (! $this->PermissaoRelated->Verificar(1)) return; ?>
<?php if (!isset($model)) $model = 'Aluno'; ?>
<div class="panel-footer">
      <h3><?php echo __('Alunos').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
            </ul>       
         </div>
      </h3>
   </div>
   <div class="panel-body">
      <?php if (!empty($array[$model])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Nome'); ?></th>
                  <th><?php echo __('Situacao Id'); ?></th>
                  <th><?php echo __('Tel Celular'); ?></th>
                  <th><?php echo __('Email'); ?></th>
                  <th><?php echo __('Curso Início'); ?></th>
                  <th><?php echo __('Curso Fim'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($array[$model] as $aluno): ?>
               <tr>
                  <td><?php echo $aluno['id']; ?></td>
                  <td><?php echo $aluno['nome']; ?></td>
                  <td><?php echo $this->DisplayField->MakeLink($aluno, 'Situacao', 'situacao_id'); ?></td>
                  <td><?php echo $aluno['celular']; ?></td>
                  <td><?php echo $aluno['email']; ?></td>
                  <td><?php echo h($aluno['curso_inicio']); ?></td>
                  <td><?php echo h($aluno['curso_fim']); ?></td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $aluno, 'model' => '', 'controller' => 'alunos')); ?>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>

   </div><!-- /.related -->