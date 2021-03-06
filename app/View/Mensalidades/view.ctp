<div class="panel panel-default ">
	<div class="panel-heading">
		<h2><?php echo __('Mensalidade'); ?>
			<small><?php echo __('View'); ?></small>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
		</h2>
	</div>
	<div class="mensalidades view pandel-body">
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tbody>
					<?php echo $this->element('LinhaView', array('alias' => 'Id', 'valor' => h($mensalidade['Mensalidade']['id']))); ?>
					<tr>
						<td><strong><?php echo __('Aluno'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Responsável'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($mensalidade['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $mensalidade['Pessoa']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Situacao'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($mensalidade['Situacao']['valor'], array('controller' => 'enumerados', 'action' => 'view', $mensalidade['Situacao']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<?php echo $this->element('LinhaView', array('alias' => 'Numero', 'valor' => h($mensalidade['Mensalidade']['numero']))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Vencimento', 'valor' => h($mensalidade['Mensalidade']['vencimento']))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Valor', 'valor' => $this->Number->currency($mensalidade['Mensalidade']['valor'],'BRL'))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Desconto', 'valor' => $this->Number->currency($mensalidade['Mensalidade']['desconto'],'BRL'))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Acréscimo', 'valor' => $this->Number->currency($mensalidade['Mensalidade']['acrescimo'],'BRL'))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Líquido', 'valor' => $this->Number->currency($mensalidade['Mensalidade']['liquido'],'BRL'))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Valor Pago', 'valor' => $this->Number->currency($mensalidade['Mensalidade']['pago'],'BRL'))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Pago', 'valor' => h($mensalidade['Mensalidade']['pagamento']))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Bolsa', 'valor' => $this->Number->currency($mensalidade['Mensalidade']['bolsa'],'BRL'))); ?>
					<tr>
						<td><strong><?php echo __('Renegociado'); ?></strong></td>
						<td>
							<i class="<?php echo ($mensalidade['Mensalidade']['renegociacao'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Formapgto'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($mensalidade['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $mensalidade['Formapgto']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Conta'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($mensalidade['Conta']['banco'], array('controller' => 'contas', 'action' => 'view', $mensalidade['Conta']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Recebido por'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($mensalidade['User']['username'], array('controller' => 'usuarios', 'action' => 'view', $mensalidade['User']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<?php echo $this->element('LinhaView', array('alias' => 'Documento', 'valor' => h($mensalidade['Mensalidade']['documento']))); ?>
					<?php echo $this->element('LinhaView', array('alias' => 'Observação', 'valor' => h($mensalidade['Mensalidade']['obs']))); ?>
				</tbody>
			</table>
			<!-- /.table table-striped table-bordered -->
		</div>
		<!-- /.table-responsive -->
	</div>
	<!-- /.view -->
	<?php echo $this->element('Relateds/LancamentosContabeis', array('array' => $lancamentos)); ?>
</div>
<!-- /#page-container .row-fluid -->
