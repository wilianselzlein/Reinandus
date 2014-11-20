	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Disciplina'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Disciplina'), array('action' => 'edit', $disciplina['Disciplina']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Disciplina'), array('action' => 'delete', $disciplina['Disciplina']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $disciplina['Disciplina']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Disciplinas'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Disciplina'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

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
		<th><?php echo __('Is Ativo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Nacionalidade'); ?></th>
		<th><?php echo __('Data Nascimento'); ?></th>
		<th><?php echo __('Naturalidade Id'); ?></th>
		<th><?php echo __('Situacao Id'); ?></th>
		<th><?php echo __('Estado Civil Id'); ?></th>
		<th><?php echo __('Orgao Expedidor'); ?></th>
		<th><?php echo __('Data Expedicao'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Nome Mae'); ?></th>
		<th><?php echo __('Nome Pai'); ?></th>
		<th><?php echo __('Indicacao Id'); ?></th>
		<th><?php echo __('Curso Id'); ?></th>
		<th><?php echo __('Professor Id'); ?></th>
		<th><?php echo __('Tem Carteirinha'); ?></th>
		<th><?php echo __('Tem Cracha'); ?></th>
		<th><?php echo __('Tem Certificado'); ?></th>
		<th><?php echo __('Bolsa'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Identidade'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Tel Residencial'); ?></th>
		<th><?php echo __('Tel Comercial'); ?></th>
		<th><?php echo __('Tel Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Emailalt'); ?></th>
		<th><?php echo __('Indicacao Nome'); ?></th>
		<th><?php echo __('Indicacao Valor'); ?></th>
		<th><?php echo __('Indicacao Pago'); ?></th>
		<th><?php echo __('Curso Inicio'); ?></th>
		<th><?php echo __('Curso Fim'); ?></th>
		<th><?php echo __('Mono Titulo'); ?></th>
		<th><?php echo __('Mono Data'); ?></th>
		<th><?php echo __('Mono Nota'); ?></th>
		<th><?php echo __('Bloqueado'); ?></th>
		<th><?php echo __('Bloqueado Data'); ?></th>
		<th><?php echo __('Senha'); ?></th>
		<th><?php echo __('Entregou Documentos'); ?></th>
		<th><?php echo __('Desconto'); ?></th>
		<th><?php echo __('Mono Prazo'); ?></th>
		<th><?php echo __('Pesquisa'); ?></th>
		<th><?php echo __('Responsavel Id'); ?></th>
		<th><?php echo __('Cert Solicitado'); ?></th>
		<th><?php echo __('Cert Entrega'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
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
			<td><?php echo $aluno['nacionalidade']; ?></td>
			<td><?php echo $aluno['data_nascimento']; ?></td>
			<td><?php echo $aluno['naturalidade_id']; ?></td>
			<td><?php echo $aluno['situacao_id']; ?></td>
			<td><?php echo $aluno['estado_civil_id']; ?></td>
			<td><?php echo $aluno['orgao_expedidor']; ?></td>
			<td><?php echo $aluno['data_expedicao']; ?></td>
			<td><?php echo $aluno['sexo']; ?></td>
			<td><?php echo $aluno['nome_mae']; ?></td>
			<td><?php echo $aluno['nome_pai']; ?></td>
			<td><?php echo $aluno['indicacao_id']; ?></td>
			<td><?php echo $aluno['curso_id']; ?></td>
			<td><?php echo $aluno['professor_id']; ?></td>
			<td><?php echo $aluno['tem_carteirinha']; ?></td>
			<td><?php echo $aluno['tem_cracha']; ?></td>
			<td><?php echo $aluno['tem_certificado']; ?></td>
			<td><?php echo $aluno['bolsa']; ?></td>
			<td><?php echo $aluno['cpf']; ?></td>
			<td><?php echo $aluno['identidade']; ?></td>
			<td><?php echo $aluno['endereco']; ?></td>
			<td><?php echo $aluno['bairro']; ?></td>
			<td><?php echo $aluno['cidade_id']; ?></td>
			<td><?php echo $aluno['cep']; ?></td>
			<td><?php echo $aluno['tel_residencial']; ?></td>
			<td><?php echo $aluno['tel_comercial']; ?></td>
			<td><?php echo $aluno['tel_celular']; ?></td>
			<td><?php echo $aluno['email']; ?></td>
			<td><?php echo $aluno['numero']; ?></td>
			<td><?php echo $aluno['emailalt']; ?></td>
			<td><?php echo $aluno['indicacao_nome']; ?></td>
			<td><?php echo $aluno['indicacao_valor']; ?></td>
			<td><?php echo $aluno['indicacao_pago']; ?></td>
			<td><?php echo $aluno['curso_inicio']; ?></td>
			<td><?php echo $aluno['curso_fim']; ?></td>
			<td><?php echo $aluno['mono_titulo']; ?></td>
			<td><?php echo $aluno['mono_data']; ?></td>
			<td><?php echo $aluno['mono_nota']; ?></td>
			<td><?php echo $aluno['bloqueado']; ?></td>
			<td><?php echo $aluno['bloqueado_data']; ?></td>
			<td><?php echo $aluno['senha']; ?></td>
			<td><?php echo $aluno['entregou_documentos']; ?></td>
			<td><?php echo $aluno['desconto']; ?></td>
			<td><?php echo $aluno['mono_prazo']; ?></td>
			<td><?php echo $aluno['pesquisa']; ?></td>
			<td><?php echo $aluno['responsavel_id']; ?></td>
			<td><?php echo $aluno['cert_solicitado']; ?></td>
			<td><?php echo $aluno['cert_entrega']; ?></td>
			<td><?php echo $aluno['created']; ?></td>
			<td><?php echo $aluno['modified']; ?></td>
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
										foreach ($disciplina['Curso'] as $curso): ?>
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
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Fone'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Emailalt'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Notafiscal'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Curriculum'); ?></th>
		<th><?php echo __('Titulacao'); ?></th>
		<th><?php echo __('Resumotitulacao'); ?></th>
		<th><?php echo __('Lattes'); ?></th>
		<th><?php echo __('Vinculo'); ?></th>
		<th><?php echo __('Formacao'); ?></th>
		<th><?php echo __('Rg'); ?></th>
		<th><?php echo __('Dadosfin'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
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
			<td><?php echo $professor['endereco']; ?></td>
			<td><?php echo $professor['numero']; ?></td>
			<td><?php echo $professor['bairro']; ?></td>
			<td><?php echo $professor['cidade_id']; ?></td>
			<td><?php echo $professor['cep']; ?></td>
			<td><?php echo $professor['fone']; ?></td>
			<td><?php echo $professor['fax']; ?></td>
			<td><?php echo $professor['celular']; ?></td>
			<td><?php echo $professor['email']; ?></td>
			<td><?php echo $professor['emailalt']; ?></td>
			<td><?php echo $professor['cpf']; ?></td>
			<td><?php echo $professor['notafiscal']; ?></td>
			<td><?php echo $professor['obs']; ?></td>
			<td><?php echo $professor['curriculum']; ?></td>
			<td><?php echo $professor['titulacao']; ?></td>
			<td><?php echo $professor['resumotitulacao']; ?></td>
			<td><?php echo $professor['lattes']; ?></td>
			<td><?php echo $professor['vinculo']; ?></td>
			<td><?php echo $professor['formacao']; ?></td>
			<td><?php echo $professor['rg']; ?></td>
			<td><?php echo $professor['dadosfin']; ?></td>
			<td><?php echo $professor['created']; ?></td>
			<td><?php echo $professor['modified']; ?></td>
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