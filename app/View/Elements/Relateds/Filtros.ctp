<?php if (! $this->PermissaoRelated->Verificar(17)) return; ?>
<?php if (!isset($model)) $model = 'Filtros'; ?>
<div class="panel-footer">
      <h3><?php echo __('RelatorioFiltro').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('RelatorioFiltro'), array('controller' => 'reltoriofiltros', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
               </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Relatorio'), array('controller' => 'relatorios', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
               </li>
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
                  <th><?php echo __('relatorio_dataset_id'); ?></th>
                  <th><?php echo __('campo'); ?></th>
                  <th><?php echo __('campo_alias'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($array[$model] as $filtro): ?>
               <tr>
                  <td><?php echo $filtro['id']; ?></td>
                  <td><?php echo $this->DisplayField->MakeLink($filtro, 'RelatoriosDatasets', 'relatorio_dataset_id'); ?></td>
                  <td><?php echo $filtro['campo']; ?></td>
                  <td><?php echo $filtro['campo_alias']; ?></td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $filtro, 'model' => '', 'controller' => 'relatoriofiltros')); ?>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>

   </div><!-- /.related -->
