<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-list-ol"></span> <?php echo __('Enumerados'); ?>                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Enumerado'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
			</ul>
                </div>
            </h3></div>
<div class="panel-body">
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('referencia'); ?></th>
							<th><?php echo $this->Paginator->sort('valor'); ?></th>
							<th><?php echo $this->Paginator->sort('is_ativo', 'Ativo'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($enumerados as $enumerado): ?>
	<tr>
		<td><?php echo h($enumerado['Enumerado']['id']); ?>&nbsp;</td>
		<td><?php echo h($enumerado['Enumerado']['nome']); ?>&nbsp;</td>
		<td><?php echo h($enumerado['Enumerado']['referencia']); ?>&nbsp;</td>
		<td><?php echo h($enumerado['Enumerado']['valor']); ?>&nbsp;</td>
		<td><i class="<?php echo ($enumerado['Enumerado']['is_ativo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $enumerado, 'model' => 'Enumerado')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
