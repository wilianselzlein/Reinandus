<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-male"></span> <?php echo __('Alunos'); ?>                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), 
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
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('curso_id'); ?></th>
							<th><?php echo $this->Paginator->sort('endereco'); ?></th>
							<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
							<th><?php echo $this->Paginator->sort('celular'); ?></th>
							<th><?php echo $this->Paginator->sort('email'); ?></th>
							<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($alunos as $aluno): ?>
	<tr>
		<td><?php echo h($aluno['Aluno']['id']); ?>&nbsp;</td>
		<td><?php echo h($aluno['Aluno']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aluno['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $aluno['Curso']['id'])); ?>
		</td>
		<td>
			<?php echo h($aluno['Aluno']['endereco']); ?>&nbsp;
			<?php echo h($aluno['Aluno']['numero']); ?>&nbsp;
			<?php echo h($aluno['Aluno']['bairro']); ?>&nbsp;
			<?php echo h($aluno['Aluno']['cep']); ?>&nbsp;
		</td>
		<td>
			<?php echo $this->Html->link($aluno['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $aluno['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($aluno['Aluno']['celular']); ?>&nbsp;</td>
		<td><?php echo h($aluno['Aluno']['email']); ?>&nbsp;</td>
		<td class="actions text-center">
			<?php echo $this->element('BotaoAjax', array("controller" => "Alunos", "nome" => "mensalidade", "id" => h($aluno['Aluno']['id']), "icone" => "money")); ?>
			<?php echo $this->element('BotaoAjax', array("controller" => "Alunos", "nome" => "disciplina", "id" => h($aluno['Aluno']['id']), "icone" => "puzzle-piece")); ?>
		</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $aluno, 'model' => 'Aluno')); ?>
	</tr>
	<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "mensalidade", "id" => h($aluno['Aluno']['id']), "colspan" => 11)); ?>
	<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "disciplina", "id" => h($aluno['Aluno']['id']), "colspan" => 11)); ?>
<?php endforeach; ?>
					</tbody>
				</table>
				<?php echo $this->element('BarraDeProgresso'); ?>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
<?php echo $this->element('Modal'); ?>
<?php echo $this->element('ShowHide'); ?>