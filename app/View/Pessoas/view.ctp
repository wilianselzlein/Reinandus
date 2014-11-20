	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Pessoa'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Pessoa'), array('action' => 'edit', $pessoa['Pessoa']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Pessoa'), array('action' => 'delete', $pessoa['Pessoa']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $pessoa['Pessoa']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Detalhes'), array('controller' => 'detalhes', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="pessoas view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fantasia'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['fantasia']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Razaosocial'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['razaosocial']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Endereco'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['endereco']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['numero']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['bairro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['Cidade']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['cep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fone'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['fone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fax'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['fax']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['celular']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Emailalt'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['emailalt']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Site'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['site']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cnpjcpf'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['cnpjcpf']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Resumo'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['resumo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Obs'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['obs']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Empresa'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['empresa']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['contato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ie'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['ie']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Im'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['im']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Orgao'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['orgao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Orgaonum'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['orgaonum']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pessoa'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['pessoa']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ramo'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['ramo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Secundario'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['secundario']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fundacao'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['fundacao']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Juntacomercial'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['juntacomercial']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($pessoa['Pessoa']['modified']); ?>
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
				<?php if (!empty($pessoa['Curso'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Professor Id'); ?></th>
		<th><?php echo __('Turma'); ?></th>
		<th><?php echo __('Carga'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Percentual'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Liquido'); ?></th>
		<th><?php echo __('Dia Vencimento'); ?></th>
		<th><?php echo __('Inicio'); ?></th>
		<th><?php echo __('Fim'); ?></th>
		<th><?php echo __('Sistema Aval'); ?></th>
		<th><?php echo __('Criterios Aval'); ?></th>
		<th><?php echo __('Pessoa Id'); ?></th>
		<th><?php echo __('Sigla'); ?></th>
		<th><?php echo __('Site'); ?></th>
		<th><?php echo __('Monografia'); ?></th>
		<th><?php echo __('Aviso'); ?></th>
		<th><?php echo __('Calendario'); ?></th>
		<th><?php echo __('Horario'); ?></th>
		<th><?php echo __('Num Turma'); ?></th>
		<th><?php echo __('Grupo Id'); ?></th>
		<th><?php echo __('Tipo Id'); ?></th>
		<th><?php echo __('Periodo Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($pessoa['Curso'] as $curso): ?>
		<tr>
			<td><?php echo $curso['id']; ?></td>
			<td><?php echo $curso['nome']; ?></td>
			<td><?php echo $curso['professor_id']; ?></td>
			<td><?php echo $curso['turma']; ?></td>
			<td><?php echo $curso['carga']; ?></td>
			<td><?php echo $curso['valor']; ?></td>
			<td><?php echo $curso['percentual']; ?></td>
			<td><?php echo $curso['desconto']; ?></td>
			<td><?php echo $curso['liquido']; ?></td>
			<td><?php echo $curso['dia_vencimento']; ?></td>
			<td><?php echo $curso['inicio']; ?></td>
			<td><?php echo $curso['fim']; ?></td>
			<td><?php echo $curso['sistema_aval']; ?></td>
			<td><?php echo $curso['criterios_aval']; ?></td>
			<td><?php echo $curso['pessoa_id']; ?></td>
			<td><?php echo $curso['sigla']; ?></td>
			<td><?php echo $curso['site']; ?></td>
			<td><?php echo $curso['monografia']; ?></td>
			<td><?php echo $curso['aviso']; ?></td>
			<td><?php echo $curso['calendario']; ?></td>
			<td><?php echo $curso['horario']; ?></td>
			<td><?php echo $curso['num_turma']; ?></td>
			<td><?php echo $curso['grupo_id']; ?></td>
			<td><?php echo $curso['tipo_id']; ?></td>
			<td><?php echo $curso['periodo_id']; ?></td>
			<td><?php echo $curso['created']; ?></td>
			<td><?php echo $curso['modified']; ?></td>
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
                <h3><?php echo __('Detalhes').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($pessoa['Detalhe'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Aluno Id'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Ocorrencias'); ?></th>
		<th><?php echo __('Hist Escolar'); ?></th>
		<th><?php echo __('Neg Financeira'); ?></th>
		<th><?php echo __('Egresso'); ?></th>
		<th><?php echo __('Pessoa Id'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($pessoa['Detalhe'] as $detalhe): ?>
		<tr>
			<td><?php echo $detalhe['id']; ?></td>
			<td><?php echo $detalhe['aluno_id']; ?></td>
			<td><?php echo $detalhe['foto']; ?></td>
			<td><?php echo $detalhe['ocorrencias']; ?></td>
			<td><?php echo $detalhe['hist_escolar']; ?></td>
			<td><?php echo $detalhe['neg_financeira']; ?></td>
			<td><?php echo $detalhe['egresso']; ?></td>
			<td><?php echo $detalhe['pessoa_id']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'detalhes', 'action' => 'view', $detalhe['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'detalhes', 'action' => 'edit', $detalhe['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'detalhes', 'action' => 'delete', $detalhe['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $detalhe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

					<div class="panel-footer">
                <h3><?php echo __('Users').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($pessoa['User'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Pessoa Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($pessoa['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['pessoa_id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			
	

</div><!-- /#page-container .row-fluid -->