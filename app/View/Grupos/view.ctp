	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Grupo'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
           </h2>
        </div>	
		
		<div class="grupos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($grupo['Grupo']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($grupo['Grupo']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

<?php echo $this->element('Relateds/Avisos', array('array' => $avisos)); ?>					
<?php echo $this->element('Relateds/Cursos', array('array' => $cursos)); ?>

</div><!-- /#page-container .row-fluid -->