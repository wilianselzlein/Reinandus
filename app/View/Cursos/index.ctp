<div class="panel panel-default">

   <div class="panel-heading"><h3><span class="fa fa-graduation-cap"></span> <?php echo __('Cursos'); ?>                
      <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
   </h3></div>
   <div class="panel-body">
      <?php echo $this->element('pesquisa/simples');?>
      <div class="table-responsive">
        <?php echo $this->element('BarraDeProgresso'); ?>
        <table class="table table-bordered table-hover table-condensed" >
           <thead>
             <tr class="active">
               <th><?php echo $this->Paginator->sort('id'); ?></th>
               <th><?php echo $this->Paginator->sort('sigla'); ?></th>
               <th><?php echo $this->Paginator->sort('nome'); ?></th>
               <th><?php echo $this->Paginator->sort('turma'); ?></th>
               <th><?php echo $this->Paginator->sort('carga', 'Carga Horaria'); ?></th>
               <th><?php echo $this->Paginator->sort('professor_id', 'Coordenador'); ?></th>
               <th><?php echo $this->Paginator->sort('pessoa_id', 'Secretária'); ?></th>
               <th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($cursos as $curso): ?>
               <tr>
                  <td><?php echo h($curso['Curso']['id']); ?>&nbsp;</td>
                  <td><?php echo h($curso['Curso']['sigla']); ?>&nbsp;</td>
                  <td><?php echo h($curso['Curso']['nome']); ?>&nbsp;</td>
                  <td><?php echo h($curso['Curso']['turma']); ?>&nbsp;</td>
                  <td><?php echo h($curso['Curso']['carga']); ?>&nbsp;</td>
                  <td>
                     <?php echo $this->Html->link($curso['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $curso['Professor']['id'])); ?>
                  </td>
                  <td>
                     <?php echo $this->Html->link($curso['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $curso['Pessoa']['id'])); ?>
                  </td>
                  <td class="actions text-center">
                     <?php echo $this->element('BotaoAjax', array("controller" => "Cursos", "nome" => "disciplina", "id" => h($curso['Curso']['id']), "icone" => "puzzle-piece")); ?>
                  </td>
                  <?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $curso, 'model' => 'Curso')); ?>
               </tr>
               <?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "disciplina", "id" => h($curso['Curso']['id']), "colspan" => 9)); ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div><!-- /.table-responsive -->
   <?php echo $this->element('Paginator'); ?>
</div>
<?php echo $this->element('Modal'); ?>
<?php echo $this->element('ShowHide'); ?>
<?php echo $this->Html->script('cfg-cache-modal');?>
