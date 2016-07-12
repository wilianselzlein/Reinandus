<?php if (! $this->PermissaoRelated->Verificar(20)) return; ?>
<?php if (!isset($id)) $id = 'divAviso'; ?>
<div class="panel-footer">
      <h3><?php echo __('Avisos').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aviso'), array('controller' => 'avisos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
            </ul>       
         </div>
      </h3>
   </div>
<div id="<?php echo $id; ?>">
   <div class="panel-body">
      <?php if (!empty($array['Aviso'])): ?>

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
               <?php foreach ($array['Aviso'] as $aviso): ?>
               <tr>
                  <td><?php echo $aviso['id']; ?></td>
                  <td><?php echo h($aviso['data']); ?></td>
                  <td><?php echo $this->DisplayField->MakeLink($aviso, 'User', 'user_id'); ?></td>
                  <td><?php echo $aviso['arquivo']; ?></td>
                  <td><?php echo $aviso['mensagem']; ?></td>
                  <td><?php echo $this->DisplayField->MakeLink($aviso, 'Tipo', 'tipo_id'); ?></td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $aviso, 'model' => '', 'controller' => 'avisos')); ?>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->
      <?php endif; ?>
   </div><!-- /.related -->
</div>