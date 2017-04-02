<br>
<div class="table-responsive">
	<?php echo $this->Form->create('Cobranca', array('role' => 'form')); ?>
	<table class="table table-bordered table-hover table-condensed" >
		<thead>
			<tr class="active">
				<th>Id</th>
				<th><span class="badge"><?php echo count($mensalidades); ?></span>&nbsp;Aluno(s)</th>
				<th>Email</th>
				<th>Vencimento</th>
				<th>Valor</th>
				<th>Desconto</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$conta = -1;
				foreach ($mensalidades as $mensalidade): 
					$conta++;
			?>
			<tr>
				<td>
					<?php echo $this->Html->link($mensalidade['Mensalidade']['id'], array('controller' => 'mensalidades', 'action' => 'view', $mensalidade['Mensalidade']['id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($mensalidade['Aluno']['id'] . ' - ' . $mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id'])); ?>
	               <?php echo $this->Form->input('aluno', array('type' => 'hidden', 'value' => $mensalidade['Aluno']['nome'], 'name' => 'data[' . $conta . '][Cobranca][aluno]')); ?>
				</td>
				<td>
					<?php echo h($mensalidade['Aluno']['email']); ?>&nbsp;
					<?php echo $this->Form->input('email', array('type' => 'hidden', 'value' => $mensalidade['Aluno']['email'], 'name' => 'data[' . $conta . '][Cobranca][email]')); ?>
				</td>
				<td>
					<?php echo h($mensalidade['Mensalidade']['vencimento']); ?>&nbsp;
					<?php echo $this->Form->input('vencimento', array('type' => 'hidden', 'value' => $mensalidade['Mensalidade']['vencimento'], 'name' => 'data[' . $conta . '][Cobranca][vencimento]')); ?>
				</td>
				<td>
					<?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'],'BRL'); ?>&nbsp;
					<?php echo $this->Form->input('valor', array('type' => 'hidden', 'value' => $mensalidade['Mensalidade']['valor'], 'name' => 'data[' . $conta . '][Cobranca][valor]')); ?>
				</td>
				<td><?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'],'BRL'); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<?php echo $this->Ajax->submit('Enviar email', array(
		'id' => 'EnviarEmail',
		'class' => 'btn btn-large btn-primary',
		'url'=> array('controller'=>'Cobrancas', 'action'=>'enviar', $envio), 
		'update' => 'ConsultaAlunos',
		'indicator' => 'CarregandoAlunos',
		)); ?>

	<?php echo $this->Form->end(); ?>
</div>
<!-- /.table-responsive -->