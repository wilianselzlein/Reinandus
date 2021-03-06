<?php if (! $this->PermissaoRelated->Verificar(9)) return; ?>
<?php if (!isset($id)) $id = 'divLancamentoContabil'; ?>
<div class="panel-footer">
    <h3><?php echo __('LctoContabils').' ' ?> 
        <small><?php echo __('Related') ?></small>
        <span class="badge"><?php echo (isset($array['LancamentoContabil']) ? count($array['LancamentoContabil']) : '0'); ?></span>
        <div class="btn-group pull-right">
        	<?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('lctocontabil'), array('controller' => 'LancamentoContabil', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                </li>
            </ul>       
        </div>
    </h3>
</div>
<div id="<?php echo $id; ?>">
<div class="panel-body">
	<?php if (!empty($array['LancamentoContabil'])): ?>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<tr class="active">
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Data'); ?></th>
						<th><?php echo __('Debito'); ?></th>
						<th><?php echo __('Credito'); ?></th>
						<th><?php echo __('Valor'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($array['LancamentoContabil'] as $lctocontabil): ?>
						<tr id="<?php echo 'LancamentoContabil' . $lctocontabil['id']; ?>">
	<td><?php echo $lctocontabil['id']; ?></td>
	<td><?php echo h($lctocontabil['data']); ?></td>
	<td><?php echo $this->DisplayField->MakeLink($lctocontabil, 'debito', 'debito_id'); ?></td>
	<td><?php echo $this->DisplayField->MakeLink($lctocontabil, 'credito', 'credito_id'); ?></td>
	<td><?php echo $this->Number->currency($lctocontabil['valor'],'BRL');?></td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $lctocontabil, 'model' => '', 'controller' => 'LancamentoContabil', 'DeleteAjax' => 'true')); ?>
						</tr>
					<?php endforeach; ?>
<?php App::import('Vendor', 'PeDF/Table');
$table = new Table(); ?>
    <tr>
                  <td colspan="4">&nbsp;</td>
                  <td><?php echo $this->Number->currency(
                    array_sum($table->array_column($array['LancamentoContabil'], 'valor')), 'BRL'); ?></td>
                  <td colspan="1">&nbsp;</td>
    </tr>
				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->		
	<?php endif; ?>
</div><!-- /.related -->
</div>