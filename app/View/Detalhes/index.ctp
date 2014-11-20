



    <div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-list-alt"></span> <?php echo __('Detalhes'); ?>                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			</ul>
                </div>
            </h3></div>
	



<div class="panel-body">

			
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('aluno_id'); ?></th>
							<th><?php echo $this->Paginator->sort('foto'); ?></th>
							<th><?php echo $this->Paginator->sort('ocorrencias'); ?></th>
							<th><?php echo $this->Paginator->sort('hist_escolar'); ?></th>
							<th><?php echo $this->Paginator->sort('neg_financeira'); ?></th>
							<th><?php echo $this->Paginator->sort('egresso'); ?></th>
							<th><?php echo $this->Paginator->sort('pessoa_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($detalhes as $detalhe): ?>
	<tr>
		<td><?php echo h($detalhe['Detalhe']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalhe['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $detalhe['Aluno']['id'])); ?>
		</td>
		<td><?php echo h($detalhe['Detalhe']['foto']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['ocorrencias']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['hist_escolar']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['neg_financeira']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['egresso']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalhe['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $detalhe['Pessoa']['id'])); ?>
		</td>
		<td class="actions text-center">
			<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $detalhe['Detalhe']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
			<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $detalhe['Detalhe']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $detalhe['Detalhe']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $detalhe['Detalhe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
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
