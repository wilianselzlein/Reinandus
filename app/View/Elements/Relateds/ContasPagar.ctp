<div class="panel-footer">
    <h3><?php echo __('ContasPagar').' ' ?> 
        <small><?php echo __('Related') ?></small>
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('ContasPagar'), array('controller' => 'ContasPagar', 'action' => 'add'), array('class' => '', 'escape' => false)); ?></li>
            </ul>       
        </div>
    </h3>
</div>
<div class="panel-body">
	<?php if (!empty($array['ContaPagar'])): ?>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<tr class="active">
                      <th><?php echo __('Id'); ?></th>
                      <th><?php echo __('Documento'); ?></th>
                      <th><?php echo __('Empresa'); ?></th>
                      <th><?php echo __('Valor'); ?></th>
                      <th><?php echo __('Vencimento'); ?></th>
                      <th><?php echo __('Pagamento'); ?></th>
    				  <th class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($array['ContaPagar'] as $ContasPagar): ?> 
                		<tr>
                          <td><?php echo $ContasPagar['id']; ?></td>
                          <td><?php echo $ContasPagar['documento']; ?></td>
                          <td><?php echo $this->DisplayField->MakeLink($ContasPagar, 'pessoas', 'pessoa_id'); ?></td>
                          <td><?php echo $this->Number->currency($ContasPagar['valor'], 'BRL'); ?></td>
                          <td><?php echo h($ContasPagar['vencimento']); ?></td>
                          <td><?php echo h($ContasPagar['pagamento']); ?></td>
                			<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $ContasPagar, 'model' => '', 'controller' => 'ContasPagar')); ?>
                		</tr>
                    <?php endforeach; ?>
				</tbody>
			</table><!-- /.table table-striped table-bordered -->
		</div><!-- /.table-responsive -->
	<?php endif; ?>
</div><!-- /.related -->