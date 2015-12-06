<div class="panel-body">
	<?php if (!empty($array['Contum'])): ?>
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
					<?php foreach ($array['Contum'] as $contum): ?>
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