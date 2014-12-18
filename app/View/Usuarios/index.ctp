<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-users"></span> <?php echo __('Usuarios'); ?>                
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Usuario'),        array('action' => 'add'),                                      array('escape'=>false)); ?></li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Roles'),          array('controller' => 'roles',         'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Role'),           array('controller' => 'roles',         'action' => 'add'),     array('escape'=>false)); ?>   </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Permissoes'),     array('controller' => 'permissoes',    'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Permissao'),      array('controller' => 'permissoes',    'action' => 'add'),     array('escape'=>false)); ?>   </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Pessoas'),        array('controller' => 'pessoas',       'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Pessoa'),         array('controller' => 'pessoas',       'action' => 'add'),     array('escape'=>false)); ?>   </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Mensalidades'),   array('controller' => 'mensalidades',  'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Mensalidade'),    array('controller' => 'mensalidades',  'action' => 'add'),     array('escape'=>false)); ?>   </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Avisos'),         array('controller' => 'avisos',        'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Aviso'),          array('controller' => 'avisos',        'action' => 'add'),     array('escape'=>false)); ?>   </li>
            </ul>
         </div>
      </h3>
   </div>
   <div class="panel-body">			
      <div class="table-responsive">
         <table class="table table-bordered table-hover table-condensed" >
            <thead>
               <tr class="active">
                  <th><?php echo $this->Paginator->sort('id'); ?></th>
                  <th><?php echo $this->Paginator->sort('username'); ?></th>
                  <th><?php echo $this->Paginator->sort('pessoa_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('role_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('created'); ?></th>
                  <th><?php echo $this->Paginator->sort('modified'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($usuarios as $usuario): ?>
               <tr>
                  <td><?php echo h($usuario['User']['id']); ?>&nbsp;</td>
                  <td><?php echo h($usuario['User']['username']); ?>&nbsp;</td>
                  <td><?php echo h($usuario['User']['pessoa_id']); ?>&nbsp;</td>
                  <td><?php echo h($usuario['User']['role_id']); ?>&nbsp;</td>
                  <td><?php echo h($usuario['User']['created']); ?>&nbsp;</td>
                  <td><?php echo h($usuario['User']['modified']); ?>&nbsp;</td>
                  <td class="actions text-center">
                     <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $usuario['User']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $usuario['User']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $usuario['User']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $usuario['User']['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div><!-- /.table-responsive -->

   </div>
   <div class="panel-footer">
      <p><small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small></p>
      <ul class="pagination  pagination-sm">
         <?php echo $this->Paginator->prev('<i class="fa fa-backward"></i>'.' '. __('Previous'), array('tag' => 'li','escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a','escape'=>false));
               echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
               echo $this->Paginator->next(__('Next') .' '.'<i class="fa fa-forward"></i>', array('tag' => 'li','escape'=>false), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a','escape'=>false));
         ?>
      </ul><!-- /.pagination -->
   </div>
	
</div>
