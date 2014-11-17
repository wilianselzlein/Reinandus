



    <div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-list-alt"></span> <?php echo __('Contas'); ?>                    <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Contum'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Formapgtos'), array('controller' => 'formapgtos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Formapgto'), array('controller' => 'formapgtos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			</ul>
                </div>
            </h3></div>
	



<div class="panel-body">

			
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('banco'); ?></th>
							<th><?php echo $this->Paginator->sort('agencia'); ?></th>
							<th><?php echo $this->Paginator->sort('conta'); ?></th>
							<th><?php echo $this->Paginator->sort('contato'); ?></th>
							<th><?php echo $this->Paginator->sort('fone'); ?></th>
							<th><?php echo $this->Paginator->sort('fax'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th><?php echo $this->Paginator->sort('celular'); ?></th>
							<th><?php echo $this->Paginator->sort('nome_no_banco'); ?></th>
							<th><?php echo $this->Paginator->sort('cedente'); ?></th>
							<th><?php echo $this->Paginator->sort('cedente_dig'); ?></th>
							<th><?php echo $this->Paginator->sort('agencia_dig'); ?></th>
							<th><?php echo $this->Paginator->sort('conta_dig'); ?></th>
							<th><?php echo $this->Paginator->sort('carteira'); ?></th>
							<th><?php echo $this->Paginator->sort('dia_emissao'); ?></th>
							<th><?php echo $this->Paginator->sort('dia_multa'); ?></th>
							<th><?php echo $this->Paginator->sort('dia_desconto'); ?></th>
							<th><?php echo $this->Paginator->sort('aceite'); ?></th>
							<th><?php echo $this->Paginator->sort('mensagem'); ?></th>
							<th><?php echo $this->Paginator->sort('formapgto_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($conta as $contum): ?>
	<tr>
		<td><?php echo h($contum['Contum']['id']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['banco']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['agencia']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['conta']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['contato']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['fone']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['fax']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['email']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['celular']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['nome_no_banco']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['cedente']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['cedente_dig']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['agencia_dig']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['conta_dig']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['carteira']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['dia_emissao']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['dia_multa']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['dia_desconto']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['aceite']); ?>&nbsp;</td>
		<td><?php echo h($contum['Contum']['mensagem']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contum['Formapgto']['nome'], array('controller' => 'formapgtos', 'action' => 'view', $contum['Formapgto']['id'])); ?>
		</td>
		<td class="actions text-center">
			<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $contum['Contum']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
			<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $contum['Contum']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
			<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $contum['Contum']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $contum['Contum']['id'])); ?>
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
