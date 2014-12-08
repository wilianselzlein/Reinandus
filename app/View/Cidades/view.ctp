	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Cidade'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Cidade'), array('action' => 'edit', $cidade['Cidade']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Cidade'), array('action' => 'delete', $cidade['Cidade']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $cidade['Cidade']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cidades'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cidade'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="cidades view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($cidade['Cidade']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Estado'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($cidade['Estado']['nome'], array('controller' => 'estados', 'action' => 'view', $cidade['Estado']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($cidade['Cidade']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($cidade['Cidade']['cep']); ?>
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
				<?php if (!empty($cidade['Aluno'])): ?>
					
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
										foreach ($cidade['Aluno'] as $aluno): ?>
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
                <h3><?php echo __('Pessoas').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($cidade['Pessoa'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fantasia'); ?></th>
		<th><?php echo __('Razaosocial'); ?></th>
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
		<th><?php echo __('Site'); ?></th>
		<th><?php echo __('Cnpjcpf'); ?></th>
		<th><?php echo __('Resumo'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('Empresa'); ?></th>
		<th><?php echo __('Contato'); ?></th>
		<th><?php echo __('Ie'); ?></th>
		<th><?php echo __('Im'); ?></th>
		<th><?php echo __('Orgao'); ?></th>
		<th><?php echo __('Orgaonum'); ?></th>
		<th><?php echo __('Pessoa'); ?></th>
		<th><?php echo __('Ramo'); ?></th>
		<th><?php echo __('Secundario'); ?></th>
		<th><?php echo __('Fundacao'); ?></th>
		<th><?php echo __('Juntacomercial'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($cidade['Pessoa'] as $pessoa): ?>
		<tr>
			<td><?php echo $pessoa['id']; ?></td>
			<td><?php echo $pessoa['fantasia']; ?></td>
			<td><?php echo $pessoa['razaosocial']; ?></td>
			<td><?php echo $pessoa['endereco']; ?></td>
			<td><?php echo $pessoa['numero']; ?></td>
			<td><?php echo $pessoa['bairro']; ?></td>
			<td><?php echo $pessoa['cidade_id']; ?></td>
			<td><?php echo $pessoa['cep']; ?></td>
			<td><?php echo $pessoa['fone']; ?></td>
			<td><?php echo $pessoa['fax']; ?></td>
			<td><?php echo $pessoa['celular']; ?></td>
			<td><?php echo $pessoa['email']; ?></td>
			<td><?php echo $pessoa['emailalt']; ?></td>
			<td><?php echo $pessoa['site']; ?></td>
			<td><?php echo $pessoa['cnpjcpf']; ?></td>
			<td><?php echo $pessoa['resumo']; ?></td>
			<td><?php echo $pessoa['obs']; ?></td>
			<td><?php echo $pessoa['empresa']; ?></td>
			<td><?php echo $pessoa['contato']; ?></td>
			<td><?php echo $pessoa['ie']; ?></td>
			<td><?php echo $pessoa['im']; ?></td>
			<td><?php echo $pessoa['orgao']; ?></td>
			<td><?php echo $pessoa['orgaonum']; ?></td>
			<td><?php echo $pessoa['pessoa']; ?></td>
			<td><?php echo $pessoa['ramo']; ?></td>
			<td><?php echo $pessoa['secundario']; ?></td>
			<td><?php echo $pessoa['fundacao']; ?></td>
			<td><?php echo $pessoa['juntacomercial']; ?></td>
			<td><?php echo $pessoa['created']; ?></td>
			<td><?php echo $pessoa['modified']; ?></td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'pessoas', 'action' => 'view', $pessoa['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'pessoas', 'action' => 'edit', $pessoa['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'pessoas', 'action' => 'delete', $pessoa['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $pessoa['id'])); ?>
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
				<?php if (!empty($cidade['Professor'])): ?>
					
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
										foreach ($cidade['Professor'] as $professor): ?>
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