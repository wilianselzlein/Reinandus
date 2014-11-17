	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('FormaPagamento');?>                  <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Formapgto'), array('action' => 'edit', $formapgto['Formapgto']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Formapgto'), array('action' => 'delete', $formapgto['Formapgto']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $formapgto['Formapgto']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Formapgtos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Formapgto'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Conta'), array('controller' => 'conta', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Contum'), array('controller' => 'conta', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Mensalidades'), array('controller' => 'mensalidades', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Mensalidade'), array('controller' => 'mensalidades', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="formapgtos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['tipo']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					<div class="panel-footer">
                <h3><?php echo __('Conta').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Contum'), array('controller' => 'conta', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($formapgto['Contum'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Banco'); ?></th>
		<th><?php echo __('Agencia'); ?></th>
		<th><?php echo __('Conta'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Fone'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Nome No Banco'); ?></th>
		<th><?php echo __('Cedente'); ?></th>
		<th><?php echo __('Cedente Dig'); ?></th>
		<th><?php echo __('Agencia Dig'); ?></th>
		<th><?php echo __('Conta Dig'); ?></th>
		<th><?php echo __('Carteira'); ?></th>
		<th><?php echo __('Dia Emissao'); ?></th>
		<th><?php echo __('Dia Multa'); ?></th>
		<th><?php echo __('Dia Desconto'); ?></th>
		<th><?php echo __('Aceite'); ?></th>
		<th><?php echo __('Mensagem'); ?></th>
		<th><?php echo __('Formapgto Id'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($formapgto['Contum'] as $contum): ?>
		<tr>
			<td><?php echo $contum['id']; ?></td>
			<td><?php echo $contum['banco']; ?></td>
			<td><?php echo $contum['agencia']; ?></td>
			<td><?php echo $contum['conta']; ?></td>
			<td><?php echo $contum['contato']; ?></td>
			<td><?php echo $contum['fone']; ?></td>
			<td><?php echo $contum['fax']; ?></td>
			<td><?php echo $contum['email']; ?></td>
			<td><?php echo $contum['celular']; ?></td>
			<td><?php echo $contum['nome_no_banco']; ?></td>
			<td><?php echo $contum['cedente']; ?></td>
			<td><?php echo $contum['cedente_dig']; ?></td>
			<td><?php echo $contum['agencia_dig']; ?></td>
			<td><?php echo $contum['conta_dig']; ?></td>
			<td><?php echo $contum['carteira']; ?></td>
			<td><?php echo $contum['dia_emissao']; ?></td>
			<td><?php echo $contum['dia_multa']; ?></td>
			<td><?php echo $contum['dia_desconto']; ?></td>
			<td><?php echo $contum['aceite']; ?></td>
			<td><?php echo $contum['mensagem']; ?></td>
			<td><?php echo $contum['formapgto_id']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'conta', 'action' => 'view', $contum['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'conta', 'action' => 'edit', $contum['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'conta', 'action' => 'delete', $contum['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $contum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

					<div class="panel-footer">
                <h3><?php echo __('Mensalidades').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Mensalidade'), array('controller' => 'mensalidades', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($formapgto['Mensalidade'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Vencimento'); ?></th>
		<th><?php echo __('Conta Id'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Acrescimo'); ?></th>
		<th><?php echo __('Liquido'); ?></th>
		<th><?php echo __('Pago'); ?></th>
		<th><?php echo __('Pagamento'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Formapgto Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Bolsa'); ?></th>
		<th><?php echo __('Documento'); ?></th>
		<th><?php echo __('Renegociacao'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($formapgto['Mensalidade'] as $mensalidade): ?>
		<tr>
			<td><?php echo $mensalidade['id']; ?></td>
			<td><?php echo $mensalidade['numero']; ?></td>
			<td><?php echo $mensalidade['vencimento']; ?></td>
			<td><?php echo $mensalidade['conta_id']; ?></td>
			<td><?php echo $mensalidade['valor']; ?></td>
			<td><?php echo $mensalidade['desconto']; ?></td>
			<td><?php echo $mensalidade['acrescimo']; ?></td>
			<td><?php echo $mensalidade['liquido']; ?></td>
			<td><?php echo $mensalidade['pago']; ?></td>
			<td><?php echo $mensalidade['pagamento']; ?></td>
			<td><?php echo $mensalidade['obs']; ?></td>
			<td><?php echo $mensalidade['formapgto_id']; ?></td>
			<td><?php echo $mensalidade['user_id']; ?></td>
			<td><?php echo $mensalidade['bolsa']; ?></td>
			<td><?php echo $mensalidade['documento']; ?></td>
			<td><?php echo $mensalidade['renegociacao']; ?></td>
			<td><?php echo $mensalidade['created']; ?></td>
			<td><?php echo $mensalidade['modified']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'mensalidades', 'action' => 'view', $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'mensalidades', 'action' => 'edit', $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'mensalidades', 'action' => 'delete', $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $mensalidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			
	

</div><!-- /#page-container .row-fluid -->