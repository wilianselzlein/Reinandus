<?php echo $this->Html->css('icones'); ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><span class="fa fa-money"></span> <?php echo __('Mensalidades'); ?>
			<?php echo $this->ButtonsActionsEnumerados->MakeButtons($this->params['controller'], $this->params['action'], null, array(array('model' => 'Mensalidade', 'action' => 'vencimento'))); ?>
		</h3>
	</div>
	<div class="panel-body">
    	<?php
			$desabilitado = 1;
	    	$desabilitado = count($desabilitado) == 0 ? 'disabled' : '';
    	?>
 		<div class="dashboard-icon <?php echo $desabilitado; ?>">
 			<?php echo $this->Html->link('<i class="fa fa-recycle fa-4x"></i>', array('controller' => 'Mensalidades', 'action' => 'gerar'), array('escape'=> false)); ?>
 			<span><?php echo __('Gerar'); ?></span>
 		</div>
 		<div class="dashboard-icon <?php echo $desabilitado; ?>">
 			<?php echo $this->Html->link('<i class="fa fa-calendar fa-4x"></i>', array('controller' => 'Mensalidades', 'action' => 'vencimento'), array('escape'=> false)); ?>
 			<span><?php echo __('Alterar Vencimento'); ?></span>
 		</div>
 		<div class="dashboard-icon  <?php echo $desabilitado; ?>">
 			<?php echo $this->Html->link('<i class="fa fa-square-o fa-4x"></i>', array('controller' => 'Enumerados', 'action' => 'view', 85), array('escape'=> false)); ?>
 			<span><?php echo __('Abertos'); ?></span>
 		</div>
 		<div class="dashboard-icon  <?php echo $desabilitado; ?>">
 			<?php echo $this->Html->link('<i class="fa fa-check-square-o fa-4x"></i>', array('controller' => 'Enumerados', 'action' => 'view', 86), array('escape'=> false)); ?>
 			<span><?php echo __('Fechados'); ?></span>
 		</div>

		<?php echo $this->element('pesquisa/simples');?>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('numero'); ?></th>
						<th><?php echo $this->Paginator->sort('aluno'); ?></th>
						<th><?php echo $this->Paginator->sort('vencimento'); ?></th>
						<th><?php echo $this->Paginator->sort('liquido'); ?></th>
						<th><?php echo $this->Paginator->sort('pago'); ?></th>
						<th><?php echo $this->Paginator->sort('pagamento'); ?></th>
						<th><?php echo $this->Paginator->sort('formapgto_id'); ?></th>
						<th><?php echo $this->Paginator->sort('situacao_id'); ?></th>
						<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($mensalidades as $mensalidade): ?>
					<tr>
						<td><?php echo h($mensalidade['Mensalidade']['id']); ?>&nbsp;</td>
						<td><?php echo h($mensalidade['Mensalidade']['numero']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($mensalidade['Aluno']['id'] . ' - ' . $mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id'])); ?>
						</td>
						<td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?>&nbsp;</td>
						<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'],'BRL'); ?>&nbsp;</td>
						<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['pago'],'BRL'); ?>&nbsp;</td>
						<td><font color="red"><?php echo h($mensalidade['Mensalidade']['pagamento']); ?>&nbsp;</font></td>
						<td>
							<?php echo $this->Html->link($mensalidade['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $mensalidade['Formapgto']['id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($mensalidade['Situacao']['valor'], array('controller' => 'enumerados', 'action' => 'view', $mensalidade['Situacao']['id'])); ?>
						</td>
						<td class="actions text-center">
							<?php echo $this->Html->link('<i class="fa fa-credit-card"></i>', array('action' => 'baixar', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Baixar'), 'data-toggle'=>'tooltip')); ?>
							<?php echo $this->Html->link('<i class="fa fa-print"></i>', array('action' => 'boleto', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Boleto'), 'data-toggle'=>'tooltip')); ?>
						</td>
						<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $mensalidade, 'model' => 'Mensalidade')); ?>
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