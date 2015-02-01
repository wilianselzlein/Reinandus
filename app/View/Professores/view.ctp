	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Professor'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
		
		<div class="professors view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Endereco'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['endereco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['numero']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['bairro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($professor['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $professor['Cidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['cep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fone'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['fone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fax'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['fax']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['celular']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Emailalt'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['emailalt']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('CPF'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['cpf']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('RG'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['rg']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nota Fiscal'); ?></strong></td>
		<td>
			<i class="<?php echo ($professor['Professor']['notafiscal'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Obs'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['obs']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Curriculum'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['curriculum']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Titulacao'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['titulacao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Resumotitulacao'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['resumotitulacao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Lattes'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['lattes']); ?>
			&nbsp;`
		</td>
</tr><tr>		<td><strong><?php echo __('Vinculo'); ?></strong></td>
		<td>
			<i class="<?php echo ($professor['Professor']['vinculo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>

</tr><tr>		<td><strong><?php echo __('Formacao'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['formacao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dadosfin'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['dadosfin']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($professor['Professor']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					<div class="panel-footer">
                <h3><?php echo __('Cursos').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($professor['Curso'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">

		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Sigla'); ?></th>
		<th><?php echo __('Secretária'); ?></th>
		<th><?php echo __('Turma'); ?></th>
		<th><?php echo __('Carga'); ?></th>
		<th><?php echo __('Num Turma'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($professor['Curso'] as $curso): ?>
		<tr>
			<td><?php echo $curso['id']; ?></td>
			<td><?php echo $curso['nome']; ?></td>
			<td><?php echo $curso['sigla']; ?></td>
                  <td>
                     <?php echo $this->Html->link($curso['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $curso['Pessoa']['id'])); ?>
                  </td>
			<td><?php echo $curso['turma']; ?></td>
			<td><?php echo $curso['carga']; ?></td>
			<td><?php echo $curso['num_turma']; ?></td>

			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'cursos', 'action' => 'view', $curso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'cursos', 'action' => 'edit', $curso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'cursos', 'action' => 'delete', $curso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $curso['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->


					<div class="panel-footer">
                <h3><?php echo __('Disciplinas').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Disciplina'), array('controller' => 'disciplinas', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($professor['Disciplina'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Disciplina'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($professor['Disciplina'] as $disciplina): ?>
		<tr>
			<td><?php echo $disciplina['id']; ?></td>
			<td><?php echo $disciplina['nome']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'disciplinas', 'action' => 'view', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'disciplinas', 'action' => 'edit', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'disciplinas', 'action' => 'delete', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $disciplina['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

			</div><!-- /.related -->

</div><!-- /#page-container .row-fluid -->