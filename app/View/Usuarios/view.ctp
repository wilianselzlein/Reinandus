<div class="panel panel-default ">
   <div class="panel-heading">
      <h2>
         <?php echo __('User'); ?>&nbsp;<small><?php echo __('View'); ?></small>
 <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h2>
   </div>
   <div class="usuarios view pandel-body">
      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <tbody>
               <tr>		
                  <td><strong><?php echo __('Id'); ?></strong></td>
                  <td><?php echo h($usuario['User']['id']); ?>&nbsp;</td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Username'); ?></strong></td>
                  <td><?php echo h($usuario['User']['username']); ?>&nbsp;</td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Pessoa'); ?></strong></td>
                  <td>
                  <?php echo $this->Html->link($usuario['Pessoa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $usuario['Pessoa']['id']), array('class' => '')); ?>
                  &nbsp;
                  </td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Role'); ?></strong></td>
                  <td>
                  <?php echo $this->Html->link($usuario['Role']['nome'], array('controller' => 'roles', 'action' => 'view', $usuario['Role']['id']), array('class' => '')); ?>
                  &nbsp;
                  </td>
               </tr>
               <tr>
                  <td><strong><?php echo __('Created'); ?></strong></td>
                  <td><?php echo h($usuario['User']['created']); ?>&nbsp;</td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Modified'); ?></strong></td>
                  <td><?php echo h($usuario['User']['modified']); ?>&nbsp;</td>
               </tr>
               <tr>
                  <td><strong><?php echo __('Assinatura'); ?></strong></td>
                  <td>
                     <?php if ($usuario['User']['assinatura'] != '') { ?> 
                        <img src="data:image/jpeg;base64,
                           <?php echo h($usuario['User']['assinatura']); ?>" 
                     <?php } ?> &nbsp;
                  </td>
               </tr>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

   </div><!-- /.view -->
   
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
      <?php if (!empty($usuario['Permissao'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th> 
                  <th><?php echo __('Programa'); ?></th>
                  <th><?php echo __('Index'); ?></th> 
                  <th><?php echo __('View'); ?></th> 
                  <th><?php echo __('Edit'); ?></th> 
                  <th><?php echo __('Add'); ?></th> 
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 0; foreach ($usuario['Permissao'] as $permissao): ?>
               <tr>
                  <td><?php echo $permissao['id']; ?></td>
                  <td><?php echo $this->Html->link($permissao['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $permissao['Programa']['id']), array('class' => '')); ?>
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

  <?php echo $this->element('ViewRelatedsMensalidades', array('array' => $usuario)); ?>
  <?php echo $this->element('ViewRelatedsAvisos', array('array' => $usuario)); ?>

</div><!-- /#page-container .row-fluid -->