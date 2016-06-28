	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Logo'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
			
		<div class="logos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($logo['Logo']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pessoa'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($logo['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $logo['Pessoa']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Logo'); ?></strong></td>
		<td>
			<?php echo h($logo['Logo']['logo']); ?>
			&nbsp;
		</td>
</tr>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

</div><!-- /#page-container .row-fluid -->