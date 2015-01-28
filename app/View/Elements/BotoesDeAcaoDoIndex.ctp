<td class="actions text-center">
	<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', $objeto[$model]['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
	<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', $objeto[$model]['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
	<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('action' => 'delete', $objeto[$model]['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $objeto[$model]['id'])); ?>
</td>