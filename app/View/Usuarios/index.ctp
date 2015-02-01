<!--teste-->
<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-users"></span> <?php echo __('Users'); ?>                
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
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
                  <td>
                     <?php echo $this->Html->link($usuario['Pessoa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $usuario['Pessoa']['id'])); ?>
                  </td>
                  <td>
                     <?php echo $this->Html->link($usuario['Role']['nome'], array('controller' => 'roles', 'action' => 'view', $usuario['Role']['id'])); ?>
                  </td> 
                  <td><?php echo h($usuario['User']['created']); ?>&nbsp;</td>
                  <td><?php echo h($usuario['User']['modified']); ?>&nbsp;</td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $usuario, 'model' => 'User')); ?>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div><!-- /.table-responsive -->

   </div>
<?php echo $this->element('Paginator'); ?>
	
</div>
