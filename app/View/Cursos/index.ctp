<div class="panel panel-default">

   <div class="panel-heading"><h3><span class="fa fa-graduation-cap"></span> <?php echo __('Cursos'); ?>                
      <div class="btn-group pull-right">
         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <?php echo __('Actions');?><span class="caret"></span>
         </button>
         <ul class="dropdown-menu" role="menu">
            <li>   
               <?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), 
                                            array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
            <li class="divider"></li>				
            <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
            <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
            <li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
            <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
            <li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
            <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
         </ul>
      </div>
      </h3></div>
   <div class="panel-body">
         <div class="table-responsive">
             <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
                     <th><?php echo $this->Paginator->sort('id'); ?></th>
                     <th><?php echo $this->Paginator->sort('sigla'); ?></th>
                     <th><?php echo $this->Paginator->sort('nome'); ?></th>
                     <th><?php echo $this->Paginator->sort('turma'); ?></th>
                     <th><?php echo $this->Paginator->sort('carga', 'Carga Horaria'); ?></th>
                     <th><?php echo $this->Paginator->sort('professor_id', 'Coordenador'); ?></th>
                     <th><?php echo $this->Paginator->sort('pessoa_id', 'Secretaria'); ?></th>
                     <th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
                  </tr>
               </thead>
               <tbody>
<?php foreach ($cursos as $curso): ?>
   <tr>
      <td><?php echo h($curso['Curso']['id']); ?>&nbsp;</td>
      <td><?php echo h($curso['Curso']['sigla']); ?>&nbsp;</td>
      <td><?php echo h($curso['Curso']['nome']); ?>&nbsp;</td>
      <td><?php echo h($curso['Curso']['turma']); ?>&nbsp;</td>
      <td><?php echo h($curso['Curso']['carga']); ?>&nbsp;</td>
      <td>
         <?php echo $this->Html->link($curso['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $curso['Professor']['id'])); ?>
      </td>
      <td>
         <?php echo $this->Html->link($curso['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $curso['Pessoa']['id'])); ?>
      </td>
      <td class="actions text-center">
         <?php echo $this->element('BotaoAjax', array("controller" => "Cursos", "nome" => "disciplina", "id" => h($curso['Curso']['id']), "icone" => "puzzle-piece")); ?>
      </td>
      <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $curso, 'model' => 'Curso')); ?>
   </tr>
   <?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "disciplina", "id" => h($curso['Curso']['id']), "colspan" => 9)); ?>
<?php endforeach; ?>
               </tbody>
            </table>
            <?php echo $this->element('BarraDeProgresso'); ?>

         </div><!-- /.table-responsive -->

   </div>
   <div class="panel-footer">
      <p><small>
         <?php
echo $this->Paginator->counter(array(
   'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
         ?>
         </small></p>

</div>
<?php echo $this->element('ShowHide'); ?>
