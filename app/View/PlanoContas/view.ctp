<div class="panel panel-default ">
	<div class="panel-heading">
		<h2><?php echo __('PlanoConta'); ?>
			<small><?php echo __('View'); ?></small>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
		<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('PlanoConta'), array('action' => 'edit', $planoconta['PlanoConta']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('PlanoConta'), array('action' => 'delete', $planoconta['PlanoConta']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $planoconta['PlanoConta']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('PlanoContas'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('PlanoConta'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
					</ul>
                </div>
            </h2>
        </div>
		<div class="planocontas view pandel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Reduzido'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['reduzido']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Analitico'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['analitico']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Descricao'); ?></strong></td>
		<td>
			<?php echo h($planoconta['PlanoConta']['descricao']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		</div><!-- /.view -->
	
	<?php echo $this->element('LancamentosContabeisViewPlanoContas', array("nome" => "Debito")); ?>
	<?php echo $this->element('LancamentosContabeisViewPlanoContas', array("nome" => "Credito")); ?>
</div><!-- /#page-container .row-fluid -->