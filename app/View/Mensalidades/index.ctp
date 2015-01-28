<div class="panel panel-default">

<div class="panel-heading"><h3><span class="fa fa-money"></span> <?php echo __('Mensalidades'); ?>
                <div class="btn-group pull-right">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?php echo __('Actions');?><span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>   
				<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Mensalidade'), 
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
							<th><?php echo $this->Paginator->sort('numero'); ?></th>
							<th><?php echo $this->Paginator->sort('vencimento'); ?></th>
							<th><?php echo $this->Paginator->sort('liquido'); ?></th>
							<th><?php echo $this->Paginator->sort('pagamento'); ?></th>
							<th><?php echo $this->Paginator->sort('formapgto_id'); ?></th>
							<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($mensalidades as $mensalidade): ?> 
	<tr>
		<td><?php echo h($mensalidade['Mensalidade']['id']); ?>&nbsp;</td>
		<td><?php echo h($mensalidade['Mensalidade']['numero']); ?>&nbsp;</td>
		<td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?>&nbsp;</td>
		<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'],'BRL'); ?>&nbsp;</td>
		<td><?php echo h($mensalidade['Mensalidade']['pagamento']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mensalidade['Formapgto']['nome'], array('controller' => 'formaspagamentos', 'action' => 'view', $mensalidade['Formapgto']['id'])); ?>
		</td>
		<td class="actions text-center">

			<?php echo $this->Html->link('<i class="fa fa-credit-card"></i>', array('action' => 'baixar', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Baixar'), 'data-toggle'=>'tooltip')); ?>
		</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $mensalidade, 'model' => 'Mensalidade')); ?>
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

<?php echo $this->element('Modal'); ?>
