<div class="panel panel-default ">
   <div class="panel-heading">
      <h2>
         <?php echo __('Usuario'); ?>&nbsp;<small><?php echo __('View'); ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?><span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">		
               <li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'     .' '.__('Edit') .' '.__('Usuario'),        array('action' => 'edit',        $usuario['User']['id']), array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete') .' '.__('Usuario'),        array('action' => 'delete',      $usuario['User']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $usuario['User']['id'])); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'   .' '.__('List') .' '.__('Usuarios'),       array('action' => 'index'),      array('class' => '','escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Usuario'),        array('action' => 'add'),        array('class' => '','escape'=>false)); ?> </li>
               <li class="divider"></li>		
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Roles'),          array('controller' => 'roles',         'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Role'),           array('controller' => 'roles',         'action' => 'add'),     array('escape'=>false)); ?>   </li>
               <!--<li><php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Permissoes'),     array('controller' => 'permissoes',    'action' => 'index'),   array('escape'=>false)); ?>   </li>-->
               <!--<li><php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Permissao'),      array('controller' => 'permissoes',    'action' => 'add'),     array('escape'=>false)); ?>   </li>-->
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Pessoas'),        array('controller' => 'pessoas',       'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Pessoa'),         array('controller' => 'pessoas',       'action' => 'add'),     array('escape'=>false)); ?>   </li>
               <!--<li><php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Mensalidades'),   array('controller' => 'mensalidades',  'action' => 'index'),   array('escape'=>false)); ?>   </li>-->
               <!--<li><php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Mensalidade'),    array('controller' => 'mensalidades',  'action' => 'add'),     array('escape'=>false)); ?>   </li>-->
               <!--<li><php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Avisos'),         array('controller' => 'avisos',        'action' => 'index'),   array('escape'=>false)); ?>   </li>-->
               <!--<li><php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Aviso'),          array('controller' => 'avisos',        'action' => 'add'),     array('escape'=>false)); ?>   </li>-->

            </ul>
         </div>

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
                  <td><?php echo h($usuario['User']['pessoa_id']); ?>&nbsp;</td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Role'); ?></strong></td>
                  <td><?php echo h($usuario['User']['role_id']); ?>&nbsp;</td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Created'); ?></strong></td>
                  <td><?php echo h($usuario['User']['created']); ?>&nbsp;</td>
               </tr>
               <tr>		
                  <td><strong><?php echo __('Modified'); ?></strong></td>
                  <td><?php echo h($usuario['User']['modified']); ?>&nbsp;</td>
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
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 0; foreach ($usuario['Permissao'] as $permissao): ?>
               <tr>
                  <td><?php echo $permissao['id']; ?></td>                  
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

   <div class="panel-footer">
      <h3><?php echo __('Mensalidades').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Mensalidades'),          array('controller' => 'mensalidades',         'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Mensalidade'),           array('controller' => 'mensalidades',         'action' => 'add'),     array('escape'=>false)); ?>   </li>
            </ul>       
         </div>
      </h3>
   </div>   
   <div class="panel-body">
      <?php if (!empty($usuario['Mensalidade'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>                  
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 0; foreach ($usuario['Mensalidade'] as $mensalidade): ?>
               <tr>
                  <td><?php echo $mensalidade['id']; ?></td>                  
                  <td class="actions text-center">
                     <?php echo $this->Html->link(    '<i class="fa fa-eye"></i>',     array('controller' => 'mensalidades', 'action' => 'view',   $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link(    '<i class="fa fa-pencil"></i>',  array('controller' => 'mensalidades', 'action' => 'edit',   $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',   array('controller' => 'mensalidades', 'action' => 'delete', $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'),   'data-toggle'=>'tooltip'), 
                           __('Are you sure you want to delete # %s?', $mensalidade['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>
   </div><!-- /.related MENSALIDADES -->

   <div class="panel-footer">
      <h3><?php echo __('Avisos').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Avisos'),          array('controller' => 'avisos',         'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Aviso'),           array('controller' => 'avisos',         'action' => 'add'),     array('escape'=>false)); ?>   </li>
            </ul>       
         </div>
      </h3>
   </div>   
   <div class="panel-body">
      <?php if (!empty($usuario['Aviso'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>                  
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 0; foreach ($usuario['Aviso'] as $aviso): ?>
               <tr>
                  <td><?php echo $aviso['id']; ?></td>                  
                  <td class="actions text-center">
                     <?php echo $this->Html->link(    '<i class="fa fa-eye"></i>',     array('controller' => 'avisos', 'action' => 'view',   $aviso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link(    '<i class="fa fa-pencil"></i>',  array('controller' => 'avisos', 'action' => 'edit',   $aviso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',   array('controller' => 'avisos', 'action' => 'delete', $aviso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'),   'data-toggle'=>'tooltip'), 
                           __('Are you sure you want to delete # %s?', $aviso['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>
   </div><!-- /.related AVISOS -->



</div><!-- /#page-container .row-fluid -->