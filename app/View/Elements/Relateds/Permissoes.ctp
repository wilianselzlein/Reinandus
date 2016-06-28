<?php if (! $this->PermissaoRelated->Verificar(31)) return; ?>
   <div class="panel-footer">
      <h3><?php echo __('Permissoes').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Permissoes'),          array('controller' => 'permissoes',         'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Permissao'),           array('controller' => 'permissoes',         'action' => 'add'),     array('escape'=>false)); ?>   </li>
            </ul>       
         </div>
      </h3>
   </div>   
   <div class="panel-body">
      <?php if (!empty($array['Permissao'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th> 
                  <th><?php echo __('User'); ?></th>
                  <th><?php echo __('Programa'); ?></th>
                  <th><?php echo __('Index'); ?></th> 
                  <th><?php echo __('View'); ?></th> 
                  <th><?php echo __('Edit'); ?></th> 
                  <th><?php echo __('Add'); ?></th> 
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($array['Permissao'] as $permissao): ?>
               <tr>
                  <td><?php echo $permissao['id']; ?></td>
                  <td><?php echo $this->Html->link($permissao['User']['username'], array('controller' => 'users', 'action' => 'view', $permissao['user_id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $this->Html->link($permissao['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $permissao['programa_id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><i class="<?php echo ($permissao['index'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['view'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['edit'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['add'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td class="actions text-center">
                     <?php echo $this->Html->link(    '<i class="fa fa-eye"></i>',     array('controller' => 'permissoes', 'action' => 'view',   $permissao['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link(    '<i class="fa fa-pencil"></i>',  array('controller' => 'permissoes', 'action' => 'edit',   $permissao['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',   array('controller' => 'permissoes', 'action' => 'delete', $permissao['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'),   'data-toggle'=>'tooltip'), 
                           __('Are you sure you want to delete # %s?', $permissao['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>
   </div><!-- /.related PERMISSOES -->
