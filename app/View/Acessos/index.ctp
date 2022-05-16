<div class="panel panel-default">

   <div class="panel-heading">
      <h3>
         <span class="fa fa-power-off"></span> <?php echo __('Acessos');?>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
      </h3>
   </div>

   <div class="panel-body">
      <?php echo $this->element('pesquisa/simples');?>
      <div class="table-responsive">
         <table class="table table-bordered table-hover table-condensed" >
            <thead>
               <tr class="active">
                  <th><?php echo $this->Paginator->sort('id'); ?></th>
                  <th><?php echo $this->Paginator->sort('aluno_id'); ?></th>
                  <th><?php echo $this->Paginator->sort('datahora'); ?></th>
                  <th><?php echo $this->Paginator->sort('aplicativo'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($acessos as $acesso): ?>
               <tr>
                  <td><?php echo h($acesso['Acesso']['id']); ?>&nbsp;</td>
                  <td>
                     <?php echo $this->Html->link($acesso['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $acesso['Aluno']['id'])); ?>
                  </td>
                  <td><?php echo h($acesso['Acesso']['datahora']); ?>&nbsp;</td>
                  <td><i class="<?php echo ($acesso['Acesso']['aplicativo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $acesso, 'model' => 'Acesso')); ?>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div><!-- /.table-responsive -->

   </div>
   <?php echo $this->element('Paginator'); ?>
</div>
