	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Cabecalho'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
		
		<div class="cabecalhos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Logo'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['logo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cabecalho'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['cabecalho']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Rodape'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['rodape']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Figura'); ?></strong></td>
		<td>
			<?php echo h($cabecalho['Cabecalho']['figura']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

</div><!-- /#page-container .row-fluid -->