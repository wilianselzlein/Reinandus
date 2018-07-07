<div class="panel panel-default ">
   <div class="panel-heading">
      <h2><?php echo __('Curso'); ?>
      <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h2>
   </div>

   <div class="cursos view pandel-body">

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <tbody>
               <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                  <td>
                     <?php echo h($curso['Curso']['id']); ?>
                     &nbsp;
                  </td>
               </tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['nome']); ?>
                  &nbsp;
               </td><tr>		<td><strong><?php echo __('Grande Área'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['area']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Turma'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['turma']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Num_turma'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['num_turma']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Sigla'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['sigla']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Carga'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['carga']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Secretário(a)'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($curso['Pessoa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $curso['Pessoa']['id']), array('class' => '')); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Coordenador'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($curso['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $curso['Professor']['id']), array('class' => '')); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Horario'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['horario']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
               <td>
                  <?php echo $this->Number->currency($curso['Curso']['valor'],'BRL'); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Percentual'); ?></strong></td>
               <td>
                  <?php echo $this->Number->toPercentage($curso['Curso']['percentual']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Desconto'); ?></strong></td>
               <td>
                  <?php echo $this->Number->currency($curso['Curso']['desconto'],'BRL'); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Liquido'); ?></strong></td>
               <td>
                  <?php echo $this->Number->currency($curso['Curso']['liquido'],'BRL'); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('dia_vencimento'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['dia_vencimento']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('inicio'); ?></strong></td>
               <td>
                  <?php echo $curso['Curso']['inicio']; ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('fim'); ?></strong></td>
               <td>
                  <?php echo $curso['Curso']['fim']; ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('sistema_aval'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['sistema_aval']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('criterios_aval'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['criterios_aval']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Grupo'); ?></strong></td>
               <td>
                  <?php echo $this->Html->link($curso['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $curso['Grupo']['id']), array('class' => '')); ?>
                  &nbsp;
               </td>
               </tr>
   <tr>
      <td><strong><?php echo __('Tipo'); ?></strong></td>
      <td><?php echo $this->Html->link($curso['Tipo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $curso['Tipo']['id']), array('class' => '')); ?>&nbsp;</td>
   </tr>
   <tr>
      <td><strong><?php echo __('Periodo'); ?></strong></td>
      <td><?php echo $this->Html->link($curso['Periodo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $curso['Periodo']['id']), array('class' => '')); ?>&nbsp;</td>
   </tr>
               <tr>		<td><strong><?php echo __('Site'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['site']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Monografia'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['monografia']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Aviso'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['aviso']); ?>
                  &nbsp;
               </td>
               </tr><tr>		<td><strong><?php echo __('Calendario'); ?></strong></td>
               <td>
                  <?php echo h($curso['Curso']['calendario']); ?>
                  &nbsp;
               </td>
               </tr>					</tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

   </div><!-- /.view -->

   <?php echo $this->element('Relateds/Alunos', array('array' => $alunos)); ?>
   <?php echo $this->element('Relateds/Avisos', array('array' => $avisos)); ?>
   <?php echo $this->element('Relateds/Disciplinas', array('array' => $disciplinas, 'model' => 'CursoDisciplina'));?>
   <?php echo $this->element('Relateds/Calendarios', array('array' => $calendarios)); ?>
	
</div><!-- /#page-container .row-fluid -->
