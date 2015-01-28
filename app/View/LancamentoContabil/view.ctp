	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('LancamentoContabil'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('LancamentoContabil'), array('action' => 'edit', $lancamentocontabil['LancamentoContabil']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('LancamentoContabil'), array('action' => 'delete', $lancamentocontabil['LancamentoContabil']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $lancamentocontabil['LancamentoContabil']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('LancamentoContabils'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('LancamentoContabil'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="lancamentocontabils view pandel-body">
		
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Debito'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lancamentocontabil['Debito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lancamentocontabil['Debito']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Credito'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lancamentocontabil['Credito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lancamentocontabil['Credito']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('HistoricoPadrao'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lancamentocontabil['HistoricoPadrao']['nome'], array('controller' => 'historicopadrao', 'action' => 'view', $lancamentocontabil['HistoricoPadrao']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Identificador'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['identificador']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Documento'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['documento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($lancamentocontabil['LancamentoContabil']['valor'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Complemento'); ?></strong></td>
		<td>
			<?php echo h($lancamentocontabil['LancamentoContabil']['complemento']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
	

</div><!-- /#page-container .row-fluid -->