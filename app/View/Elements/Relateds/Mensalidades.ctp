<?php if (! $this->PermissaoRelated->Verificar(34)) return; ?>
<?php if (!isset($model)) $model = 'Mensalidade'; ?>
<?php if (!isset($id)) $id = 'divMensalidade'; ?>
<div class="panel-footer">
    <h3><?php echo __('Mensalidades').' ' ?>
        <small><?php echo __('Related') ?></small>
        <div class="btn-group pull-right">
            <?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Mensalidade'), array('controller' => 'mensalidades', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                </li>
            </ul>
        </div>
    </h3>
</div>
<div id="<?php echo $id; ?>">
	<div class="panel-body">
		<?php if (!empty($array['Mensalidade'])): ?>

			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr class="active">
              <th><?php echo __('Id'); ?></th>
              <th><?php echo __('Número'); ?></th>
              <th><?php echo __('Vencimento'); ?></th>
              <th><?php echo __('Líquido'); ?></th>
              <th><?php echo __('Pagamento'); ?></th>
              <th><?php echo __('Aluno'); ?></th>
              <th><?php echo __('Situacao'); ?></th>
							<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($array['Mensalidade'] as $mensalidade): ?>
<tr>
              <td><?php echo $mensalidade['id']; ?></td>
              <td><?php echo $mensalidade['numero']; ?></td>
              <td><?php echo $mensalidade['vencimento']; ?></td>
              <td><?php echo $this->Number->currency($mensalidade['liquido'], 'BRL'); ?></td>
              <td><?php echo $mensalidade['pagamento']; ?></td>
              <td><?php echo $this->DisplayField->MakeLink($mensalidade, 'alunos', 'aluno_id'); ?></td>
              <td><?php echo $this->DisplayField->MakeLink($mensalidade, 'Situacao', 'situacao_id'); ?></td>
              <td class="actions text-center">
                <?php echo $this->Html->link('<i class="fa fa-print"></i>', array('controller' => 'mensalidades', 'action' => 'boleto', $mensalidade['id']), 
                    array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Boleto'), 'data-toggle'=>'tooltip')); ?>
              </td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $mensalidade, 'model' => '', 'controller' => 'mensalidades')); ?>
</tr>
<?php endforeach; ?>
<?php App::import('Vendor', 'PeDF/Table');
$table = new Table(); ?>
<tr>
              <td colspan="3">&nbsp;</td>
              <td><?php echo $this->Number->currency(
                array_sum($table->array_column($array['Mensalidade'], 'liquido')), 'BRL'); ?></td>
              <td colspan="4">&nbsp;</td>
</tr>

					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
		<?php endif; ?>
	</div><!-- /.related -->
</div>