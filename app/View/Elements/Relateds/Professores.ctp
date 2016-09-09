<?php if (! $this->PermissaoRelated->Verificar(13)) return; ?>
<?php if (!isset($id)) $id = 'divProfessores'; ?>
<div class="panel-footer">
    <h3><?php echo __('Professors').' ' ?> 
        <small><?php echo __('Related') ?></small>
        <span class="badge"><?php echo (isset($array['Professor']) ? count($array['Professor']) : '0'); ?></span>
        <div class="btn-group pull-right">
        	<?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professores', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                </li>
            </ul>       
        </div>
    </h3>
</div>
<div id="<?php echo $id; ?>">
	<div class="panel-body">
		<?php if (!empty($array['Professor'])): ?>
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr class="active">
							<th><?php echo __('Id'); ?></th>
							<th><?php echo __('Nome'); ?></th>
							<th><?php echo __('Cidade'); ?></th>
							<th><?php echo __('Celular'); ?></th>
							<th><?php echo __('Email'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($array['Professor'] as $professor): ?>
<tr>
	<td><?php echo $professor['id']; ?></td>
	<td><?php echo $professor['nome']; ?></td>
	<td><?php echo $this->DisplayField->MakeLink($professor, 'cidades', 'cidade_id'); ?></td>
	<td><?php echo $professor['celular']; ?></td>
	<td><?php echo $professor['email']; ?></td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $professor, 'model' => '', 'controller' => 'professores')); ?>
</tr>
<?php endforeach; ?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		<?php endif; ?>
	</div><!-- /.related -->
</div>