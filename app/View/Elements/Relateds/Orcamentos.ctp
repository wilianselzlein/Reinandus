<?php if (! $this->PermissaoRelated->Verificar(36)) return; ?>
<?php if (!isset($id)) $id = 'divOrcamento'; ?>
<div class="panel-footer">
    <h3><?php echo __('Orcamentos').' ' ?> 
        <small><?php echo __('Related') ?></small>
        <span class="badge"><?php echo (isset($array['Orcamento']) ? count($array['Orcamento']) : '0'); ?></span>
        <div class="btn-group pull-right">
        	<?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('orcamento'), array('controller' => 'Orcamento', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                </li>
            </ul>       
        </div>
    </h3>
</div>
<div id="<?php echo $id; ?>">
<div class="panel-body">
	<?php if (!empty($array['Orcamento'])): ?>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<tr class="active">
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Data'); ?></th>
						<th><?php echo __('PlanoConta'); ?></th>
						<th><?php echo __('HistoricoPadrao'); ?></th>
						<th><?php echo __('Valor'); ?></th>
						<th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($array['Orcamento'] as $orcamento): ?>
						<tr>
	<td><?php echo $orcamento['id']; ?></td>
	<td><?php echo h($orcamento['data']); ?></td>
	<td><?php echo $this->DisplayField->MakeLink($orcamento, 'PlanoContas', 'plano_conta_id'); ?></td>
	<td><?php echo $this->DisplayField->MakeLink($orcamento, 'historicopadrao', 'historico_padrao_id'); ?></td>
	<td><?php echo $this->Number->currency($orcamento['valor'],'BRL');?></td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $orcamento, 'model' => '', 'controller' => 'Orcamentos')); ?>
						</tr>
					<?php endforeach; ?>
<?php App::import('Vendor', 'PeDF/Table');
$table = new Table(); ?>
    <tr>
                  <td colspan="4">&nbsp;</td>
                  <td><?php echo $this->Number->currency(
                    array_sum($table->array_column($array['Orcamento'], 'valor')), 'BRL'); ?></td>
                  <td colspan="1">&nbsp;</td>
    </tr>
				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->		
	<?php endif; ?>
</div><!-- /.related -->
</div>