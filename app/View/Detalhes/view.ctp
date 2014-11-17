	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Detalhe'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Detalhe'), array('action' => 'edit', $detalhe['Detalhe']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Detalhe'), array('action' => 'delete', $detalhe['Detalhe']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $detalhe['Detalhe']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Detalhes'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="detalhes view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Aluno'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($detalhe['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $detalhe['Aluno']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Foto'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['foto']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ocorrencias'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['ocorrencias']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Hist Escolar'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['hist_escolar']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Neg Financeira'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['neg_financeira']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Egresso'); ?></strong></td>
		<td>
			<?php echo h($detalhe['Detalhe']['egresso']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pessoa'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($detalhe['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $detalhe['Pessoa']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	

</div><!-- /#page-container .row-fluid -->