<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-money"></span> <?php echo __('ContasPagar'); ?>
			<?php echo $this->ButtonsActionsEnumerados->MakeButtons($this->params['controller'], $this->params['action']); ?>
		</h3>
	</div>
	<div class="panel-body">
		<?php //echo $this->element('pesquisa/simples');?>


<div class="form-group">
<?php echo $this->Search->create();?> 

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePagamento" aria-expanded="false" aria-controls="collapsePagamento">
	Filtrar Pagamento
</button>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseVencimento" aria-expanded="false" aria-controls="collapseVencimento">
	Filtrar Vencimento
</button>
<br>
<br>
<div class="collapse" id="collapsePagamento">
	<div class="well">
		<div class="panel panel-default">
			<div class="panel-heading">
				Pagamento:
			</div>
			<div class="panel-body">
				<?php echo $this->Search->input('filter3', 
				array('class'=>'form-control', 'id' => 'data1', 'label' => array('text' => 'Início:')), 
				array('class'=>'form-control', 'id' => 'data2', 'label' => array('text' => 'Fim:'))); ?>
			</div>
		</div>
	</div>
</div>

<div class="collapse" id="collapseVencimento">
	<div class="well">
		<div class="panel panel-default">
			<div class="panel-heading">
				Vencimento:
			</div>
			<div class="panel-body">
				<?php echo $this->Search->input('filter2', 
				array('class'=>'form-control', 'id' => 'data3', 'label' => array('text' => 'Início:')), 
				array('class'=>'form-control', 'id' => 'data4', 'label' => array('text' => 'Fim:'))); ?>
			</div>
		</div>
	</div>
</div>

<?php 
echo $this->Search->input('filter1', array('class'=>'form-control', 'style'=>'width:90%;display: inline !important;'));
echo $this->Search->submit(__('Buscar'), array('class'=>'btn btn-large btn-primary', 'type'=>'submit', 
                                               'style'=>'margin: 0 0 0 1%; display:inline; '));
echo $this->Search->end();
echo "<br>";
   ?>

</div>

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('documento'); ?></th>
						<th><?php echo $this->Paginator->sort('pessoa_id'); ?></th>
						<th><?php echo $this->Paginator->sort('professor_id'); ?></th>
						<th><?php echo $this->Paginator->sort('valor'); ?></th>
						<th><?php echo $this->Paginator->sort('vencimento'); ?></th>
						<th><?php echo $this->Paginator->sort('pagamento'); ?></th>
						<th><?php echo $this->Paginator->sort('formapgto_id'); ?></th>
						<th><?php echo $this->Paginator->sort('liberado'); ?></th>
						<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($contaspagar as $contapagar): 
						$id = $contapagar['ContaPagar']['id']; ?>
					<tr>
						<td><?php echo h($id); ?>&nbsp;</td>
						<td><?php echo h($contapagar['ContaPagar']['documento']) . '-' . h($contapagar['ContaPagar']['serie']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($contapagar['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $contapagar['Pessoa']['id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($contapagar['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $contapagar['Professor']['id'])); ?>
						</td>
						<td><?php echo $this->Number->currency($contapagar['ContaPagar']['valor'],'BRL'); ?>&nbsp;</td>
						<td><?php echo h($contapagar['ContaPagar']['vencimento']); ?>&nbsp;</td>
						<td><?php echo h($contapagar['ContaPagar']['pagamento']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($contapagar['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $contapagar['Formapgto']['id'])); ?>
						</td>
						<td>
							<?php 
								$liberado = 'fa fa-check-square-o';
								$bloqueado = 'fa fa-square-o';
								$icone = $contapagar['ContaPagar']['liberado'] == true ? $liberado : $bloqueado;
								$icone = '<i class="' . $icone . '"></i>';
								if ($permissao):
									echo $icone;
								else:

	$visivel = $contapagar['ContaPagar']['liberado'] == true ? '' : ' invisible hide';
	echo $this->Ajax->link('<i class="' . $liberado . '"></i>', 
		array('controller' => 'ContasPagar', 'action' => 'bloquear', $id), 
		array('id' => 'bloquear_' . $id, 
			//'update' => 'post' . $id, 
			//'indicator' => 'loading',
			'class' => 'btn btn-default btn-xs' . $visivel, 'escape'=> false, 
			'title'=> 'Bloquear pagamento', 'data-toggle'=>'tooltip',
			'before' => '$("#carregador_pai").css("display", "block").css("visibility", "visible")',
			'complete' => 
				 '$("#carregador_pai").css("display", "none").css("visibility", "hidden");
				  $("#bloquear_' . $id . '").css("display", "none").css("visibility", "hidden");
 				  $("#liberar_' . $id . '").css("visibility", "visible").removeClass("hide");'));

	$visivel = $contapagar['ContaPagar']['liberado'] == true ? ' invisible hide' : '';
	echo $this->Ajax->link('<i class="' . $bloqueado . '"></i>', 
		array('controller' => 'ContasPagar', 'action' => 'liberar', $id), 
		array('id' => 'liberar_' . $id, 
			//'update' => 'post' . $id, 
			//'indicator' => 'loading',
			'class' => 'btn btn-default btn-xs' . $visivel, 'escape'=> false, 
			'title'=> 'Liberar pagamento', 'data-toggle'=>'tooltip',
			'before' => '$("#carregador_pai").css("display", "block").css("visibility", "visible")',
			'complete' => 
				 '$("#carregador_pai").css("display", "none").css("visibility", "hidden");
				  $("#bloquear_' . $id . '").css("display", "inline").css("visibility", "visible").removeClass("hide");
 				  $("#liberar_' . $id . '").css("visibility", "hidden");'));

								endif;
								 	?>
							&nbsp;
						</td>
						<td class="actions text-center">
							<?php echo $this->Html->link('<i class="fa fa-credit-card"></i>', array('action' => 'baixar', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Baixar'), 'data-toggle'=>'tooltip')); ?>
						</td>
						<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $contapagar, 'model' => 'ContaPagar')); ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<!-- /.table-responsive -->
	</div>
	<div class="panel-footer">
		<p><small>
			<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>
			</small>
		</p>
		<ul class="pagination  pagination-sm">
			<?php
				echo $this->Paginator->prev('<i class="fa fa-backward"></i>'.' '. __('Previous'), array('tag' => 'li','escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a','escape'=>false));
				echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
				echo $this->Paginator->next(__('Next') .' '.'<i class="fa fa-forward"></i>', array('tag' => 'li','escape'=>false), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a','escape'=>false));
				?>
		</ul>
		<!-- /.pagination -->
	</div>
</div>
<?php echo $this->element('Modal'); ?>