<style rel="stylesheet" type="text/css">
   .menu { float: left; width: 80%; }
   .conteudo { margin-left: 90%; margin-top: 20px;}
</style>
<?php echo $this->Html->css('icones'); ?>
<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa fa-print"></span> <?php echo __('Relatórios');?>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], null, 
         array(
            array('model' => 'Relatorio', 'action' => 'configurar'),
            array('model' => 'Cabecalho', 'action' => 'add')
         )); ?>
      </h3>
   </div>
   <div id="page-container" class="panel-body">
      <style>
        
      </style>
      <div>
         <div>
            <?php
   $tipo = '';
   foreach ($relatorios as $relatorio): ?>
            <?php if (! strcmp($tipo, $relatorio['Relatorio']['tipo']) == 0) { ?>
         </div>
      </div>
      <div class="panel panel-default">            
         <div class="panel-heading">
            <h3 class="panel-title"><?php echo $relatorio['Relatorio']['tipo'];?></h3>
         </div>
         <div class="panel-body">
            <?php } ?>
            <div class="dashboard-icon">
               <?php 
   echo $this->Html->link('<i class="fa ' . $relatorio['Relatorio']['icone'] .' fa-4x"></i>', array('action' => 'filter', $relatorio['Relatorio']['id']), array('class' => '', 'escape' => false, 'escape'=> false)); ?>
               <span><?php echo $relatorio['Relatorio']['nome'];?></span>
            </div>     
            <?php 
   $tipo = $relatorio['Relatorio']['tipo'];
   endforeach; 
            ?>
         </div>
      </div>
   </div><!-- /#page-container .row-fluid -->

</div>
