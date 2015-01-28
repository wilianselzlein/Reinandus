<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-wrench"></span> <?php echo __('Programas'); ?>                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Programa'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Permissaos'), array('controller' => 'permissaos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Permissao'), array('controller' => 'permissaos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
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
							<th><?php echo $this->Paginator->sort('is_cadastro', 'Cadastro'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($programas as $programa): ?>
	<tr>
		<td><?php echo h($programa['Programa']['id']); ?>&nbsp;</td>
		<td><?php echo h($programa['Programa']['nome']); ?>&nbsp;</td>
		<td><i class="<?php echo ($programa['Programa']['is_cadastro'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $programa, 'model' => 'Programa')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
