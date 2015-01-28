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