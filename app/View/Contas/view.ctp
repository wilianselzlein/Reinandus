	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Conta'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Contum'), array('action' => 'edit', $contum['Contum']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Contum'), array('action' => 'delete', $contum['Contum']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $contum['Contum']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Conta'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Contum'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Formapgtos'), array('controller' => 'formapgtos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Formapgto'), array('controller' => 'formapgtos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

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
</tr><tr>		<td><strong><?php echo __('Banco'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['banco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Agencia'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['agencia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Conta'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['conta']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['contato']); ?>
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
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['email']); ?>
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
			<?php echo h($contum['Contum']['cedente']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cedente Dig'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['cedente_dig']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Agencia Dig'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['agencia_dig']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Conta Dig'); ?></strong></td>
		<td>
			<?php echo h($contum['Contum']['conta_dig']); ?>
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
			<?php echo $this->Html->link($contum['Formapgto']['nome'], array('controller' => 'formapgtos', 'action' => 'view', $contum['Formapgto']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	

</div><!-- /#page-container .row-fluid -->