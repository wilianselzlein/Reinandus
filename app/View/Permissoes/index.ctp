<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-unlock"></span> <?php echo __('Permissoes'); ?>                
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
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
							<th><?php echo $this->Paginator->sort('delete'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($perms as $perm): ?>
	<tr>
		<td><?php echo h($perm['Permissao']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($perm['User']['username'], array('controller' => 'users', 'action' => 'view', $perm['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($perm['Programa']['nome'], array('controller' => 'programas', 'action' => 'view', $perm['Programa']['id'])); ?>
		</td>
		<td><i class="<?php echo ($perm['Permissao']['index'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<td><i class="<?php echo ($perm['Permissao']['view'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<td><i class="<?php echo ($perm['Permissao']['edit'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>		
		<td><i class="<?php echo ($perm['Permissao']['add'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<td><i class="<?php echo ($perm['Permissao']['delete'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>		
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $perm, 'model' => 'Permissao')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
