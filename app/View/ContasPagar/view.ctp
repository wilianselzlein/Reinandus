	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('ContaPagar'); ?>
            	<small><?php echo __('View'); ?></small>
                <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>

		<div class="contapagars view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
<?php echo $this->element('LinhaView', array('alias' => 'Id', 'valor' => h($contapagar['ContaPagar']['id']))); ?>
<tr>		<td><strong><?php echo __('Pessoa'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $contapagar['Pessoa']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Professor'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $contapagar['Professor']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['Tipo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $contapagar['Tipo']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<?php echo $this->element('LinhaView', array('alias' => 'Cadastro', 'valor' => h($contapagar['ContaPagar']['cadastro']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Emissão', 'valor' => h($contapagar['ContaPagar']['emissao']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Vencimento', 'valor' => h($contapagar['ContaPagar']['vencimento']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Pagamento', 'valor' => h($contapagar['ContaPagar']['pagamento']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Documento', 'valor' => h($contapagar['ContaPagar']['documento']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Série', 'valor' => h($contapagar['ContaPagar']['serie']))); ?>
<tr>		<td><strong><?php echo __('Conta'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['Conta']['conta'], array('controller' => 'contas', 'action' => 'view', $contapagar['Conta']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<?php echo $this->element('LinhaView', array('alias' => 'Valor', 'valor' => $this->Number->currency($contapagar['ContaPagar']['valor'],'BRL'))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Saldo', 'valor' => $this->Number->currency($contapagar['ContaPagar']['saldo'],'BRL'))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Juro', 'valor' => $this->Number->currency($contapagar['ContaPagar']['juro'],'BRL'))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Multa', 'valor' => $this->Number->currency($contapagar['ContaPagar']['multa'],'BRL'))); ?>
<tr>		<td><strong><?php echo __('Situação'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['Situacao']['valor'], array('controller' => 'enumerados', 'action' => 'view', $contapagar['Situacao']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<?php echo $this->element('LinhaView', array('alias' => 'Observação', 'valor' => h($contapagar['ContaPagar']['observacao']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Cheque', 'valor' => h($contapagar['ContaPagar']['cheque']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Agencia', 'valor' => h($contapagar['ContaPagar']['agencia']))); ?>
<tr>		<td><strong><?php echo __('Recebido por'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['User']['username'], array('controller' => 'usuarios', 'action' => 'view', $contapagar['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<?php echo $this->element('LinhaView', array('alias' => 'Banco Depósito', 'valor' => h($contapagar['ContaPagar']['banco_deposito']))); ?>
<?php echo $this->element('LinhaView', array('alias' => 'Conta Corrente', 'valor' => h($contapagar['ContaPagar']['conta_corrente']))); ?>
<tr>		<td><strong><?php echo __('Liberado'); ?></strong></td>
		<td>
			<i class="<?php echo ($contapagar['ContaPagar']['liberado'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Formapgto'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contapagar['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $contapagar['Formapgto']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>
<?php echo $this->element('LinhaView', array('alias' => 'Portador', 'valor' => h($contapagar['ContaPagar']['portador']))); ?>

					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
<?php echo $this->element('Relateds/LancamentosContabeis', array('array' => $lancamentos)); ?>
</div><!-- /#page-container .row-fluid -->