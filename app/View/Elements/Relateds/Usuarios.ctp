<?php if (! $this->PermissaoRelated->Verificar(15)) return; ?>
<?php if (!isset($id)) $id = 'divUsuarios'; ?>
<div class="panel-footer">
    <h3><?php echo __('Users').' ' ?> 
        <small><?php echo __('Related') ?></small>
        <span class="badge"><?php echo (isset($array['Usuario']) ? count($array['Usuario']) : '0'); ?></span>
        <div class="btn-group pull-right">
        	<?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'usuarios', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                </li>
            </ul>
        </div>
    </h3>
</div>
<div id="<?php echo $id; ?>">
	<div class="panel-body">
		<?php if (!empty($array['Usuario'])): ?>
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr class="active">
<th><?php echo __('Id'); ?></th>
<th><?php echo __('Usuario'); ?></th>
<th><?php echo __('Pessoa'); ?></th>
<th><?php echo __('Created'); ?></th>
<th><?php echo __('Modified'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($array['Usuario'] as $user): ?>
<tr>
	<td><?php echo $user['id']; ?></td>
	<td><?php echo $user['username']; ?></td>
	<td><?php echo $this->DisplayField->MakeLink($user, 'pessoas', 'pessoa_id'); ?></td>
	<td><?php echo h($user['created']); ?></td>
	<td><?php echo h($user['modified']); ?></td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $user, 'model' => '', 'controller' => 'usuarios')); ?>
</tr>
<?php endforeach; ?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		<?php endif; ?>	
	</div><!-- /.related -->
</div>