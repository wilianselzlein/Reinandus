<div class="panel panel-default ">
   <div class="panel-heading">
      <h2><?php echo __('Curso'); ?>                <small><?php echo __('View'); ?></small>

         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">		
               <li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Curso'), array('action' => 'edit', $curso['Curso']['id']), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Curso'), array('action' => 'delete', $curso['Curso']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $curso['Curso']['id'])); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
               <li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>

            </ul>
         </div>

      </h2>
   </div>



   <div class="cursos view pandel-body">

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <tbody>
               <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                  <td>
                     <?php echo h($curso['Curso']['id']); ?>
                     &nbsp;
                  </td>
               </tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['nome']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Turma'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['turma']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Num_turma'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['num_turma']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Sigla'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['sigla']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Carga'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['carga']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Secretaria'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($curso['Pessoa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $curso['Pessoa']['id']), array('class' => '')); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Coordenador'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($curso['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $curso['Professor']['id']), array('class' => '')); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Horario'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['horario']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
               <td>
                  <?php echo $this->Number->currency($curso['Curso']['valor'],'BRL'); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Percentual'); ?></strong></td>
               <td>
                  <?php echo $this->Number->toPercentage($curso['Curso']['percentual']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Desconto'); ?></strong></td>
               <td>
                  <?php echo $this->Number->currency($curso['Curso']['desconto'],'BRL'); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Liquido'); ?></strong></td>
               <td>
                  <?php echo $this->Number->currency($curso['Curso']['liquido'],'BRL'); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('dia_vencimento'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['dia_vencimento']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('inicio'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['inicio']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('fim'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['fim']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('sistema_aval'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['sistema_aval']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('criterios_aval'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['criterios_aval']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Grupo'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($curso['Grupo']['nome'], array('controller' => 'grupod', 'action' => 'view', $curso['Grupo']['id']), array('class' => '')); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
               <td>
                  <?php echo h($curso['Tipo']['nome']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Periodo'); ?></strong></td>
               <td>
                  <?php echo h($curso['Periodo']['nome']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Site'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['site']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Monografia'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['monografia']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Aviso'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['aviso']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Calendario'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['calendario']); ?>
                  &nbsp;
               </td>
               </tr>					</tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

   </div><!-- /.view -->

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
      <?php if (!empty($curso['Aluno'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Ativo'); ?></th>
                  <th><?php echo __('Nome'); ?></th>
                  <th><?php echo __('Situacao Id'); ?></th>
                  <th><?php echo __('Cidade'); ?></th>
                  <th><?php echo __('Tel Celular'); ?></th>
                  <th><?php echo __('Email'); ?></th>
                  <th><?php echo __('Curso Inicio'); ?></th>
                  <th><?php echo __('Curso Fim'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
$i = 0;
foreach ($curso['Aluno'] as $aluno): ?>
               <tr>
                  <td><?php echo $aluno['id']; ?></td>
                  <td><?php echo $aluno['is_ativo']; ?></td>
                  <td><?php echo $aluno['nome']; ?></td>
                  <td><?php echo $aluno['Situacao']['nome']; ?></td>
                  <td><?php echo $this->Html->link($aluno['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $aluno['Cidade']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $aluno['tel_celular']; ?></td>
                  <td><?php echo $aluno['email']; ?></td>
                  <td><?php echo $aluno['curso_inicio']; ?></td>
                  <td><?php echo $aluno['curso_fim']; ?></td>
                  <td class="actions text-center">
                     <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'alunos', 'action' => 'view', $aluno['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'alunos', 'action' => 'edit', $aluno['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'alunos', 'action' => 'delete', $aluno['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $aluno['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>


   </div><!-- /.related -->

   <div class="panel-footer">
      <h3><?php echo __('Avisos').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aviso'), array('controller' => 'avisos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
            </ul>       
         </div>
      </h3>
   </div>
   <div class="panel-body">
      <?php if (!empty($curso['Aviso'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Data'); ?></th>
                  <th><?php echo __('User'); ?></th>
                  <th><?php echo __('Arquivo'); ?></th>
                  <th><?php echo __('Mensagem'); ?></th>
                  <th><?php echo __('Tipo'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
$i = 0;
foreach ($curso['Aviso'] as $aviso): ?>
               <tr>
                  <td><?php echo $aviso['id']; ?></td>
                  <td><?php echo $aviso['data']; ?></td>
                  <td><?php echo $this->Html->link($aviso['User']['username'], array('controller' => 'users', 'action' => 'view', $aviso['User']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $aviso['arquivo']; ?></td>
                  <td><?php echo $aviso['mensagem']; ?></td>
                  <td><?php echo $aviso['Tipo']['nome']; ?></td>
                  <td class="actions text-center">
                     <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'avisos', 'action' => 'view', $aviso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'avisos', 'action' => 'edit', $aviso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'avisos', 'action' => 'delete', $aviso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $aviso['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>


   </div><!-- /.related -->

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
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
               </li>
            </ul>       
         </div>
      </h3>
   </div>
   <div class="panel-body">
      <?php if (!empty($curso['CursoDisciplina'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Disciplina'); ?></th>
                  <th><?php echo __('Professor'); ?></th>
                  <th><?php echo __('Horas Aula'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
$i = 0;
foreach ($curso['CursoDisciplina'] as $disciplina): ?>
               <tr>
                  <td><?php echo $disciplina['id']; ?></td>
                  <td><?php echo $this->Html->link($disciplina['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $disciplina['Disciplina']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $this->Html->link($disciplina['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $disciplina['Professor']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $disciplina['horas_aula']; ?></td>
                  <td class="actions text-center">
                     <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'curso_disciplinas', 'action' => 'view', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'curso_disciplinas', 'action' => 'edit', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'curso_disciplinas', 'action' => 'delete', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $disciplina['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>


   </div><!-- /.related -->




</div><!-- /#page-container .row-fluid -->