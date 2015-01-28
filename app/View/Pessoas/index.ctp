<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-book"></span> <?php echo __('Empresas/Pessoas'); ?>                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Detalhes'), array('controller' => 'detalhes', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			</ul>
                </div>
            </h3></div>
<div class="panel-body">

			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
							<th><?php echo $this->Paginator->sort('razaosocial'); ?></th>
							<th><?php echo $this->Paginator->sort('endereco'); ?></th>
							<th><?php echo $this->Paginator->sort('numero'); ?></th>
							<th><?php echo $this->Paginator->sort('bairro'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							<th><?php echo $this->Paginator->sort('cep'); ?></th>
							<th><?php echo $this->Paginator->sort('fone'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($pessoas as $pessoa): ?>
	<tr>
		<td><?php echo h($pessoa['Pessoa']['id']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['fantasia']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['razaosocial']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['endereco']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['numero']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['bairro']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($pessoa['Pessoa']['cep']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['fone']); ?>&nbsp;</td>
		<td><?php echo h($pessoa['Pessoa']['email']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $pessoa, 'model' => 'Pessoa')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
