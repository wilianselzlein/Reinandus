	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Disciplina'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>
	
	
		
		<div class="disciplinas view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($disciplina['Disciplina']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($disciplina['Disciplina']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Valor'); ?></strong></td>
		<td>
			<?php echo h($disciplina['Disciplina']['valor']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					<div class="panel-footer">
                <h3><?php echo __('Alunos').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($disciplina['Aluno'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ativo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Situacao'); ?></th>
		<th><?php echo __('Curso'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Tel Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Inicio'); ?></th>
		<th><?php echo __('Fim'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($disciplina['Aluno'] as $aluno): ?>
		<tr>
			<td><?php echo $aluno['id']; ?></td>
			<td><?php echo $aluno['is_ativo']; ?></td>
			<td><?php echo $aluno['nome']; ?></td>
			<td><?php echo $aluno['Situacao']['nome']; ?></td>
			<td><?php echo $this->Html->link($aluno['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $aluno['Curso']['id']), array('class' => '')); ?>
			&nbsp;</td>
			<td><?php echo $this->Html->link($aluno['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $aluno['Cidade']['id']), array('class' => '')); ?>
			&nbsp;</td>
			<td><?php echo $aluno['celular']; ?></td>
			<td><?php echo $aluno['email']; ?></td>
			<td><?php echo $aluno['curso_inicio']; ?></td>
			<td><?php echo $aluno['curso_fim']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'alunos', 'action' => 'view', $aluno['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'alunos', 'action' => 'edit', $aluno['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'alunos', 'action' => 'delete', $aluno['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $aluno['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

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
				<?php if (!empty($disciplina['Curso'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Sigla'); ?></th>
		<th><?php echo __('Coordenador'); ?></th>
		<th><?php echo __('Turma'); ?></th>
		<th><?php echo __('Carga'); ?></th>
		<th><?php echo __('Inicio'); ?></th>
		<th><?php echo __('Fim'); ?></th>
		<th><?php echo __('Secretaria'); ?></th>
		<th><?php echo __('Num Turma'); ?></th>
		<th><?php echo __('Periodo'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($disciplina['Curso'] as $curso): ?>
		<tr>
			<td><?php echo $curso['id']; ?></td>
			<td><?php echo $curso['nome']; ?></td>
			<td><?php echo $curso['sigla']; ?></td>
			<td><?php echo $this->Html->link($curso['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $curso['Professor']['id']), array('class' => '')); ?>
			&nbsp;</td>
			<td><?php echo $curso['turma']; ?></td>
			<td><?php echo $curso['carga']; ?></td>
			<td><?php echo $curso['inicio']; ?></td>
			<td><?php echo $curso['fim']; ?></td>
			<td><?php echo $this->Html->link($curso['Pessoa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $curso['Pessoa']['id']), array('class' => '')); ?>
			&nbsp;</td>
			<td><?php echo $curso['num_turma']; ?></td>
			<td><?php echo $curso['Periodo']['nome']; ?></td>
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
                <h3><?php echo __('Professors').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($disciplina['Professor'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Resumotitulacao'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($disciplina['Professor'] as $professor): ?>
		<tr>
			<td><?php echo $professor['id']; ?></td>
			<td><?php echo $professor['nome']; ?></td>
			<td><?php echo $this->Html->link($professor['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $professor['Cidade']['id']), array('class' => '')); ?>
			&nbsp;</td>
			<td><?php echo $professor['celular']; ?></td>
			<td><?php echo $professor['email']; ?></td>
			<td><?php echo $professor['resumotitulacao']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'professors', 'action' => 'view', $professor['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'professors', 'action' => 'edit', $professor['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'professors', 'action' => 'delete', $professor['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $professor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			
	

</div><!-- /#page-container .row-fluid -->