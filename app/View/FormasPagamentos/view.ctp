	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('FormaPagamento');?>
            <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>	
		
		<div class="formapgtos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['tipo']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					<div class="panel-footer">
                <h3><?php echo __('Conta').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Contum'), array('controller' => 'conta', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($formapgto['Contum'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Agencia'); ?></th>
		<th><?php echo __('Conta'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Fone'); ?></th>
		<th><?php echo __('Email'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($formapgto['Contum'] as $contum): ?>
		<tr>
			<td><?php echo $contum['id']; ?></td>
			<td><?php echo $contum['banco']; ?></td>
			<td><?php echo $contum['agencia'] . '-' . $contum['agencia_dig']; ?></td>
			<td><?php echo $contum['conta'] . '-' . $contum['conta_dig']; ?></td>
			<td><?php echo $contum['contato']; ?></td>
			<td><?php echo $contum['fone']; ?></td>
			<td><?php echo $contum['email']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'contas', 'action' => 'view', $contum['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'contas', 'action' => 'edit', $contum['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'contas', 'action' => 'delete', $contum['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $contum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

			</div><!-- /.related -->

			<?php echo $this->element('ViewRelatedsMensalidades', array('array' => $mensalidades)); ?>

</div><!-- /#page-container .row-fluid -->