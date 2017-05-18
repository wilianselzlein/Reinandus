<?php if (! $this->PermissaoRelated->Verificar(31)) return; ?>
<?php if (!isset($id)) $id = 'divPermissao'; ?>
   <div class="panel-footer">
      <h3><?php echo __('Permissoes').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <span class="badge"><?php echo (isset($array['Permissao']) ? count($array['Permissao']) : '0'); ?></span>
         <div class="btn-group pull-right">
            <?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
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
<div id="<?php echo $id; ?>">
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
                  <th><?php echo __('Delete'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($array['Permissao'] as $permissao): ?>
               <?php $id = $permissao['id']; ?>
               <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $this->Html->link($permissao['User']['username'], array('controller' => 'users', 'action' => 'view', $permissao['user_id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $this->Html->link($permissao['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $permissao['programa_id']), array('class' => '')); ?>
                     &nbsp;</td>

<?php 
   $liberado = 'fa fa-check-square-o';
   $bloqueado = 'fa fa-square-o';

   $colunas = ['index', 'view', 'edit', 'add', 'delete'];
   foreach ($colunas as $item) {
      echo '<td>';
      $icone = $permissao[$item] == true ? $liberado : $bloqueado;
      $icone = '<i class="' . $icone . '"></i>';

      echo '<i class="fa fa-refresh fa-spin fa-1x fa-fw indicator" id="loading' . $item . '_' . $id . '" style="display: none"></i>';
      $visivel = $permissao[$item] == true ? '' : ' invisible hide';
      echo $this->Ajax->link('<i class="' . $liberado . '"></i>', 
         array('controller' => 'permissoes', 'action' => 'bloquear', $item, $id), 
         array('id' => 'bloq' . $item . '_' . $id, 
            //'update' => 'post' . $id, 
            'indicator' => 'loading' . $item . '_' . $id,
            'class' => 'btn btn-default btn-xs' . $visivel, 'escape'=> false, 
            'title'=> 'Bloquear permissão', 'data-toggle'=>'tooltip',
            'before' => '$("#bloq' . $item . '_' . $id . '").css("display", "block").css("visibility", "hidden")',
            'complete' => 
                '$("#bloq' . $item . '_' . $id . '").css("display", "none").css("visibility", "hidden");
                 $("#lib' . $item . '_' . $id . '").css("visibility", "visible").removeClass("hide");'));

      $visivel = $permissao[$item] == true ? ' invisible hide' : '';
      echo $this->Ajax->link('<i class="' . $bloqueado . '"></i>', 
         array('controller' => 'permissoes', 'action' => 'liberar', $item, $id), 
         array('id' => 'lib' . $item . '_' . $id, 
            //'update' => 'post' . $id, 
            'indicator' => 'loading' . $item . '_' . $id,
            'class' => 'btn btn-default btn-xs' . $visivel, 'escape'=> false, 
            'title'=> 'Liberar permissão', 'data-toggle'=>'tooltip',
            'before' => '$("#lib' . $item . '_' . $id . '").css("display", "block").css("visibility", "hidden")',
            'complete' => 
                '$("#bloq' . $item . '_' . $id . '").css("display", "inline").css("visibility", "visible").removeClass("hide");
                 $("#lib' . $item . '_' . $id . '").css("visibility", "hidden");'));
      echo '</td> &nbsp;';
   }
?>
<?php if (false) { ?>
                  <td><i class="<?php echo ($permissao['index'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['view'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['edit'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['add'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <td><i class="<?php echo ($permissao['delete'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
<?php } ?>
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
</div>