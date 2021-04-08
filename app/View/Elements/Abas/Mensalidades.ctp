<?php 
	if (isset($mensalidades[0])) {
	  echo $this->Form->create('Portal', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'comprovante', 'target' => '_blank')); 
	  echo $this->Form->hidden('id', array('value' => $mensalidades[0]['vmensalidades']['mensalidade_aluno_id']));
	  echo $this->Form->hidden('nome', array('value' => $mensalidades[0]['vmensalidades']['aluno_nome']));
	  echo $this->Form->hidden('curso', array('value' => $mensalidades[0]['vmensalidades']['aluno_curso_id']));
	  echo $this->Form->hidden('curso_nome', array('value' => $alunos['valuno']['curso_nome']));
	  echo $this->Form->hidden('curso_turma', array('value' => $alunos['valuno']['curso_turma']));
	  echo $this->Form->hidden('pessoa_razaosocial', array('value' => $alunos['valuno']['pessoa_razaosocial']));
	  echo $this->Form->hidden('user_assinatura', array('value' => $alunos['valuno']['user_assinatura']));
	  echo $this->Form->hidden('mensalidades', array('value' => serialize($mensalidades)));
	?>
<div style="float: left; width: 30%;">
	<?php echo $this->Form->input('ano', array('options' => $anos, 'label' => array('text' => 'Ano:'))); ?>
</div>
<div style="float: right; width: 70%;"> &nbsp;
	<?php echo $this->Form->button('<i class="fa fa-print"></i>'.' '.__('Imprimir Comprovante de Pagamentos'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btncomprovante')); ?>
</div>
<?php echo $this->Form->end(); ?>
<br/>
<br/>
<div class="panel panel-default">
	<table class="table">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>Vencimento</th>
				<th>Pagamento</th>
				<th>Valor (R$)</th>
				<th>Multas/Juros</th>
				<th>Desc.</th>
				<th>Bolsa</th>
				<th>Valor Pago</th>
				<th>Líquido</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$vl = 0;
				$ac = 0;
				$de = 0;
				$bo = 0;
				$pa = 0;
				$li = 0;
				foreach ($mensalidades as $mensalidade):  
				  $vl += $mensalidade['vmensalidades']['mensalidade_valor'];
				  $ac += $mensalidade['vmensalidades']['mensalidade_acrescimo']; 
				  $de += $mensalidade['vmensalidades']['mensalidade_desconto']; 
				  $bo += $mensalidade['vmensalidades']['mensalidade_bolsa']; 
				  $pa += $mensalidade['vmensalidades']['mensalidade_pago']; 
				  $li += $mensalidade['vmensalidades']['mensalidade_liquido']; 
				?>
			<tr>
				<td><?php echo $mensalidade['vmensalidades']['mensalidade_numero']; ?> &nbsp;</td>
				<td><?php echo date('d/m/Y', strtotime($mensalidade['vmensalidades']['mensalidade_vencimento'])); ?> &nbsp;</td>
				<td>
					<?php 
						$pagamento = $mensalidade['vmensalidades']['mensalidade_pagamento'];
						$remessa = $mensalidade['vmensalidades']['mensalidade_remessa'];
						
						if (! is_null($pagamento))
							echo date('d/m/Y', strtotime($pagamento));
						else {
							if ($remessa) {
								echo $this->Html->link('<i class="fa fa-print"></i>', 
								array('action' => 'boleto', $mensalidade['vmensalidades']['mensalidade_id']), 
								array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'title' => __('Imprimir Boleto'), 'data-toggle' => 'tooltip', 'target' => '_blank'));
							}
						}
					?>
					&nbsp;
				</td>
				<td><?php echo $this->Number->currency($mensalidade['vmensalidades']['mensalidade_valor'], 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['vmensalidades']['mensalidade_acrescimo'], 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['vmensalidades']['mensalidade_desconto'], 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['vmensalidades']['mensalidade_bolsa'], 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['vmensalidades']['mensalidade_pago'], 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($mensalidade['vmensalidades']['mensalidade_liquido'], 'BRL'); ?> &nbsp;</td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td> &nbsp;</td>
				<td><?php echo $this->Number->currency($vl, 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($ac, 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($de, 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($bo, 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($pa, 'BRL'); ?> &nbsp;</td>
				<td><?php echo $this->Number->currency($li, 'BRL'); ?> &nbsp;</td>
			</tr>
		</tbody>
	</table>
</div>
<?php } else { ?>
<div class="alert alert-faciencia" role="alert">
	<b>Nenhuma mensalidade cadastrada.</b>
</div>
<?php } ?>