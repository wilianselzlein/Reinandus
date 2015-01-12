<div class="panel panel-default">

<div class="panel-heading"><h3><span class="fa fa-comment"></span> <?php echo __('Avisos'); ?>
                <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?php echo __('Actions');?><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>   
				<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aviso'), 
						array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
			<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
			<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
			<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
			<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
			<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
		</ul>
            </div>
        </h3></div>
	



<div class="panel-body">

			<div class="table-responsive">
				<table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('data'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('arquivo'); ?></th>
							<th><?php echo $this->Paginator->sort('mensagem'); ?></th>
							<th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($avisos as $aviso): ?> 
	<tr>
		<td><?php echo h($aviso['Aviso']['id']); ?>&nbsp;</td>
		<td><?php echo h($aviso['Aviso']['data']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aviso['User']['username'], array('controller' => 'users', 'action' => 'view', $aviso['User']['id'])); ?>
		</td>
		<td><?php echo h($aviso['Aviso']['arquivo']); ?>&nbsp;</td>
		<td><?php echo h($aviso['Aviso']['mensagem']); ?>&nbsp;</td>
		<td><?php echo h($aviso['Tipo']['nome']); ?>&nbsp;</td>
		<td class="actions text-center">
			<?php echo $this->element('BotaoAjax', array("controller" => "Avisos", "nome" => "curso", "id" => h($aviso['Aviso']['id']), "icone" => "graduation-cap")); ?>
			<?php echo $this->element('BotaoAjax', array("controller" => "Avisos", "nome" => "grupo", "id" => h($aviso['Aviso']['id']), "icone" => "group")); ?>

			<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $aviso['Aviso']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
			<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $aviso['Aviso']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $aviso['Aviso']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $aviso['Aviso']['id'])); ?>
		</td>
	</tr>
	<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "curso", "id" => h($aviso['Aviso']['id']), "colspan" => 7)); ?>
	<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "grupo", "id" => h($aviso['Aviso']['id']), "colspan" => 7)); ?>
<?php endforeach; ?>
					</tbody>
				</table>
				<?php echo $this->element('BarraDeProgresso'); ?>
			</div><!-- /.table-responsive -->

</div>
			<div class="panel-footer">
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			 <ul class="pagination  pagination-sm">
				<?php
					echo $this->Paginator->prev('<i class="fa fa-backward"></i>'.' '. __('Previous'), array('tag' => 'li','escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a','escape'=>false));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') .' '.'<i class="fa fa-forward"></i>', array('tag' => 'li','escape'=>false), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a','escape'=>false));
				?>
			</ul><!-- /.pagination -->
			</div>
	
</div>

<?php echo $this->element('Modal'); ?>
<?php echo $this->element('ShowHide'); ?>