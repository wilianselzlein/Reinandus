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
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($mensalidade['Mensalidade']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Aluno'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
		<td>
			<?php echo h($mensalidade['Mensalidade']['numero']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Vencimento'); ?></strong></td>
		<td>
			<?php echo h($mensalidade['Mensalidade']['vencimento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Desconto'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Acrescimo'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($mensalidade['Mensalidade']['acrescimo'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Liquido'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor Pago'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($mensalidade['Mensalidade']['pago'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pagamento'); ?></strong></td>
		<td>
			<?php echo h($mensalidade['Mensalidade']['pagamento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bolsa'); ?></strong></td>
		<td>
			<?php echo $this->Number->currency($mensalidade['Mensalidade']['bolsa'],'BRL'); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Renegociado'); ?></strong></td>
		<td>
			<i class="<?php echo ($mensalidade['Mensalidade']['renegociacao'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Formapgto'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($mensalidade['Formapgto']['nome'], array('controller' => 'formaspagamentos', 'action' => 'view', $mensalidade['Formapgto']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Conta'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($mensalidade['Conta']['conta'], array('controller' => 'contas', 'action' => 'view', $mensalidade['Conta']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Recebido por'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($mensalidade['User']['username'], array('controller' => 'usuarios', 'action' => 'view', $mensalidade['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Documento'); ?></strong></td>
		<td>
			<?php echo h($mensalidade['Mensalidade']['documento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Observação'); ?></strong></td>
		<td>
			<?php echo h($mensalidade['Mensalidade']['obs']); ?>
			&nbsp;
		</td>
</tr>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
</div><!-- /#page-container .row-fluid -->