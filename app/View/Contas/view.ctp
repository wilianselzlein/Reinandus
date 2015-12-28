	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Conta'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>	
		
		<div class="conta view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Descrição'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['banco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Agencia'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['agencia'] . '-' . $contum['Contum']['agencia_dig']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Conta'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['conta'] . '-' . $contum['Contum']['conta_dig']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['contato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fone'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['fone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fax'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['fax']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['celular']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome No Banco'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['nome_no_banco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cedente'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['cedente'] . '-' . $contum['Contum']['cedente_dig']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Carteira'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['carteira']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dia Emissao'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['dia_emissao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dia Multa'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['dia_multa']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dia Desconto'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['dia_desconto']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Aceite'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['aceite']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Mensagem'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['mensagem']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Formapgto'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($contum['Formapgto']['nome'], array('controller' => 'FormasPagamentos', 'action' => 'view', $contum['Formapgto']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

<?php 
echo $this->element('Relateds/Mensalidades', array('array' => $mensalidades));
echo $this->element('Relateds/ContasPagar', array('array' => $pagar));
?>
</div><!-- /#page-container .row-fluid -->