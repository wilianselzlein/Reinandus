	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Calendario'); ?>
            	<small><?php echo __('View'); ?></small>
                <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>

		<div class="calendarios view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($calendario['Calendario']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($calendario['Calendario']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Disciplina'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($calendario['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $calendario['Disciplina']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Curso'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($calendario['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $calendario['Curso']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($calendario['Calendario']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($calendario['Calendario']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

</div><!-- /#page-container .row-fluid -->