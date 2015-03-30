<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-group"></span> <?php echo __('Grupos'); ?>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
    	</h3>
    </div>

	<div class="panel-body">
   <?php echo $this->element('pesquisa/simples');?>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
	            <thead>
                    <tr class="active">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($grupos as $grupo): ?>
	<tr>
		<td><?php echo h($grupo['Grupo']['id']); ?>&nbsp;</td>
		<td><?php echo h($grupo['Grupo']['nome']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $grupo, 'model' => 'Grupo')); ?>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
	<?php echo $this->element('Paginator'); ?>
</div>
