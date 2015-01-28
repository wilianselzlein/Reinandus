<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-print"></span> <?php echo __('Cabecalhos'); ?>                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cabecalho'), 
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
							<th><?php echo $this->Paginator->sort('logo'); ?></th>
							<th><?php echo $this->Paginator->sort('cabecalho'); ?></th>
							<th><?php echo $this->Paginator->sort('rodape'); ?></th>
							<th><?php echo $this->Paginator->sort('figura'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($cabecalhos as $cabecalho): ?>
	<tr>
		<td><?php echo h($cabecalho['Cabecalho']['id']); ?>&nbsp;</td>
		<td><?php echo h($cabecalho['Cabecalho']['logo']); ?>&nbsp;</td>
		<td><?php echo h($cabecalho['Cabecalho']['cabecalho']); ?>&nbsp;</td>
		<td><?php echo h($cabecalho['Cabecalho']['rodape']); ?>&nbsp;</td>
		<td><?php echo h($cabecalho['Cabecalho']['figura']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $cabecalho, 'model' => 'Cabecalho')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
