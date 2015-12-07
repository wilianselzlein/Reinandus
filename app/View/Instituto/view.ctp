	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Instituto'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
	
	
		
		<div class="institutos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($instituto['Instituto']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Empresa'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($instituto['Empresa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Empresa']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Diretor'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($instituto['Diretor']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Diretor']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($instituto['Tipo']['valor']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

</div><!-- /#page-container .row-fluid -->