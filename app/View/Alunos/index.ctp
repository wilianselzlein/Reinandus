
<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-male"></span> <?php echo __('Alunos'); ?>
			<?php echo $this->ButtonsActionsEnumerados->MakeButtons($this->params['controller'], $this->params['action'],
			null, array(array('model' => 'Aluno', 'action' => 'emails'), array('model' => 'Aluno', 'action' => 'trocar')), array('indicacao_id', 'estado_civil_id')); ?>
		</h3>
	</div>

	<div class="panel-body">
		<?php echo $this->element('pesquisa/simples');?>
		<?php echo $this->element('Paginator'); ?>		
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('nome'); ?></th>
						<th><?php echo $this->Paginator->sort('curso_id'); ?></th>
						<th><?php echo $this->Paginator->sort('situacao_id'); ?></th>
						<th><?php echo $this->Paginator->sort('cpf'); ?></th>
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
								<?php echo $this->Html->link($aluno['Situacao']['valor'], array('controller' => 'enumerados', 'action' => 'view', $aluno['Situacao']['id'])); ?>
							</td>
							<td><?php echo h($aluno['Aluno']['cpf']); ?>&nbsp;</td>
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
								<?php 
								if (isset($permissoes['Financeiro']['Mensalidades']))
									echo $this->element('BotaoAjax', array("controller" => "Alunos", "nome" => "mensalidade", "id" => h($aluno['Aluno']['id']), "icone" => "money")); ?>
								<?php echo $this->element('BotaoAjax', array("controller" => "Alunos", "nome" => "disciplina", "id" => h($aluno['Aluno']['id']), "icone" => "puzzle-piece")); ?>
							</td>
							<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $aluno, 'model' => 'Aluno')); ?>
						</tr>
						<?php 
							if (isset($permissoes['Financeiro']['Mensalidades']))
								echo $this->element('LinhaTabelaParaAjax', array("nome" => "mensalidade", "id" => h($aluno['Aluno']['id']), "colspan" => 11)); 
						?>
						<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "disciplina", "id" => h($aluno['Aluno']['id']), "colspan" => 11)); ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->

	</div>
	<?php echo $this->element('Paginator'); ?>
</div>

<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-male"></span> <?php echo __('Alunos'); ?>
			<small><?php echo __('Pendentes Monografia com disciplinas concluídas.') ?></small>
			<?php echo $this->ButtonsActionsEnumerados->MakeButtons($this->params['controller'], $this->params['action'],
			null, array(array('model' => 'Aluno', 'action' => 'emails'), array('model' => 'Aluno', 'action' => 'trocar')), array('indicacao_id', 'estado_civil_id')); ?>
		</h3>
	</div>

	<div class="panel-body">

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-condensed" >
			<thead>
				<tr class="active">
					<th><?php echo 'Id'; ?></th>
					<th><?php echo 'Nome'; ?></th>
					<th><?php echo 'Email'; ?></th>
					<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pendentes as $pendente): ?>
					<tr></tr>
						<td><?php echo h($pendente['a']['id']); ?>&nbsp;</td>
						<td><?php echo h($pendente['a']['nome']); ?>&nbsp;</td>
						<td><?php echo h($pendente['a']['email']) . ' ' . h($pendente['a']['emailalt']); ?>&nbsp;</td>
						<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $pendente, 'model' => 'a')); ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Modal'); ?>
<?php echo $this->element('ShowHide'); ?>
<?php echo $this->Html->script('cfg-cache-modal');?>
