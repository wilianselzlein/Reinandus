<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-unlock"></span> <?php echo __('Permissoes'); ?>                
			<div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Permissao'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Programas'), array('controller' => 'programas', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Programa'), array('controller' => 'programas', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			</ul>
                </div>
            </h3></div>

<div class="panel-body">

			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
							<th><?php echo $this->Paginator->sort('index'); ?></th>
							<th><?php echo $this->Paginator->sort('view'); ?></th>
							<th><?php echo $this->Paginator->sort('edit'); ?></th>
							<th><?php echo $this->Paginator->sort('add'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($permissoes as $permissao): ?>
	<tr>
		<td><?php echo h($permissao['Permissao']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($permissao['User']['username'], array('controller' => 'users', 'action' => 'view', $permissao['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($permissao['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $permissao['Programa']['id'])); ?>
		</td>
		<td><i class="<?php echo ($permissao['Permissao']['index'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<td><i class="<?php echo ($permissao['Permissao']['view'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<td><i class="<?php echo ($permissao['Permissao']['edit'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>		
		<td><i class="<?php echo ($permissao['Permissao']['add'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>		
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $permissao, 'model' => 'Permissao')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
