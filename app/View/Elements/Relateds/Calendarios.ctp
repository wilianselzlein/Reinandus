<?php if (! $this->PermissaoRelated->Verificar(39)) return; ?>
<?php if (!isset($id)) $id = 'divCalendarios'; ?>
<div class="panel-footer">
    <h3><?php echo __('Calendarios').' ' ?> 
        <small><?php echo __('Related') ?></small>
        <span class="badge"><?php echo (isset($array['Calendario']) ? count($array['Calendario']) : '0'); ?></span>
        <div class="btn-group pull-right">
        	<?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Calendario'), array('controller' => 'calendarios', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                </li>
            </ul>
        </div>
    </h3>
</div>
<div id="<?php echo $id; ?>">
	<div class="panel-body">
		<?php if (!empty($array['Calendario'])): ?>
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr class="active">
<th><?php echo __('Id'); ?></th>
<th><?php echo __('Data'); ?></th>
<th><?php echo __('Disciplina'); ?></th>
<th><?php echo __('Curso'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($array['Calendario'] as $calendario): ?>
<tr>
	<td><?php echo $calendario['id']; ?></td>
	<td><?php echo $calendario['data']; ?></td>
	<td><?php echo $this->DisplayField->MakeLink($calendario, 'disciplinas', 'disciplina_id'); ?></td>
	<td><?php echo $this->DisplayField->MakeLink($calendario, 'cursos', 'curso_id'); ?></td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $calendario, 'model' => '', 'controller' => 'calendarios')); ?>
</tr>
<?php endforeach; ?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		<?php endif; ?>	
	</div><!-- /.related -->
</div>