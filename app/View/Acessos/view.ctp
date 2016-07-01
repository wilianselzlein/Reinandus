	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Acesso'); ?>                
            <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>

		<div class="acessos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($acesso['Acesso']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Aluno'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($acesso['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $acesso['Aluno']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Datahora'); ?></strong></td>
		<td>
			<?php echo h($acesso['Acesso']['datahora']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Aplicativo'); ?></strong></td>
		<td>
			<i class="<?php echo ($acesso['Acesso']['aplicativo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr>						</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
</div><!-- /#page-container .row-fluid -->