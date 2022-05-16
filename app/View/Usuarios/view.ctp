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

<?php
echo $this->element('Relateds/Permissoes', array('array' => $p_ermissoes));
echo $this->element('Relateds/Mensalidades', array('array' => $mensalidades));
echo $this->element('Relateds/Avisos', array('array' => $avisos));
echo $this->element('Relateds/ContasPagar', array('array' => $pagar));
?>

</div><!-- /#page-container .row-fluid -->