	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Enumerado'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
        </h2>
        </div>
		
		<div class="enumerados view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Referencia'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['referencia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo h($enumerado['Enumerado']['valor']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ativo'); ?></strong></td>
		<td>
			<i class="<?php echo ($enumerado['Enumerado']['is_ativo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->	

</div><!-- /#page-container .row-fluid -->