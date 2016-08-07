 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2>
<?php 
if ($aluno['Aluno']['sexo'] == 'M') 
	echo '<i class="fa fa-male"></i>';
else
	echo '<i class="fa fa-female"></i>';
?>
             <?php echo __('Aluno'); ?>
            <small><?php echo __('View'); ?></small>
              <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>

		<div class="alunos view pandel-body">
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
    <?php echo $this->element('LinhaView', array('alias' => 'Id', 'valor' => h($aluno['Aluno']['id']))); ?>
    <?php echo $this->element('LinhaView', array('alias' => 'Aluno', 'valor' => h($aluno['Aluno']['nome']))); ?>
    <?php echo $this->element('LinhaView', array('alias' => 'Pai', 'valor' => h($aluno['Aluno']['nome_pai']))); ?>
    <?php echo $this->element('LinhaView', array('alias' => 'Mãe', 'valor' => h($aluno['Aluno']['nome_mae']))); ?>
	<tr>
		<td><strong><?php echo __('Responsável'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Responsavel']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $aluno['Responsavel']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Sexo', 'valor' => h($aluno['Aluno']['sexo']))); ?>
	<tr>
		<td><strong><?php echo __('Situacao'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Situacao']['valor'], array('controller' => 'enumerados', 'action' => 'view', $aluno['Situacao']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Formacao', 'valor' => h($aluno['Aluno']['formacao']))); ?>
	<tr>
		<td><strong><?php echo __('Naturalidade'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Naturalidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $aluno['Naturalidade']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Nacionalidade', 'valor' => h($aluno['Aluno']['nacionalidade']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Nascimento', 'valor' => $aluno['Aluno']['data_nascimento'])); ?>
	<tr>
		<td><strong><?php echo __('Estado Civil'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['EstadoCivil']['valor'], array('controller' => 'enumerados', 'action' => 'view', $aluno['EstadoCivil']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<tr>
		<td><strong><?php echo __('RG'); ?></strong></td>
		<td><?php echo $aluno['Aluno']['identidade']; ?>&nbsp;<?php echo $aluno['Aluno']['orgao_expedidor']; ?>&nbsp;<?php echo $aluno['Aluno']['data_expedicao']; ?></td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'CPF', 'valor' => h($aluno['Aluno']['cpf']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Endereco', 'valor' => h($aluno['Aluno']['endereco']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Numero', 'valor' => h($aluno['Aluno']['numero']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Bairro', 'valor' => h($aluno['Aluno']['bairro']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'CEP', 'valor' => h($aluno['Aluno']['cep']))); ?>
	<tr>
		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $aluno['Cidade']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Residencial', 'valor' => h($aluno['Aluno']['residencial']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Comercial', 'valor' => h($aluno['Aluno']['comercial']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Celular', 'valor' => h($aluno['Aluno']['celular']))); ?>
   <?php echo $this->element('LinhaView', array('alias' => 'Senha', 'valor' => h($aluno['Aluno']['senha']))); ?>
	  <tr>
      <td>&nbsp;</td>
      <td><?php echo $this->Html->link('Resetar para 1', array('controller' => 'alunos', 'action' => 'reset', $aluno['Aluno']['id']), array('class' => '')); ?>&nbsp;</td>
   </tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Email', 'valor' => h($aluno['Aluno']['email']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Alternativo', 'valor' => h($aluno['Aluno']['emailalt']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Bolsa', 'valor' => $this->Number->currency($aluno['Aluno']['bolsa'], 'BRL'))); ?>
	<?php //echo $this->element('LinhaView', array('alias' => 'Desconto', 'valor' => $this->Number->currency($aluno['Aluno']['desconto'], 'BRL'))); ?>
	<tr>
		<td><strong><?php echo __('Curso'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $aluno['Curso']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Início', 'valor' => h($aluno['Aluno']['curso_inicio']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Fim', 'valor' => h($aluno['Aluno']['curso_fim']))); ?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->

<?php echo $this->element('MostraEsconde', 
   array('mostra' => 'Mostrar outros dados', 'esconde' => 'Fechar outros dados')); ?>

<div id="dados" >
				<table class="table table-hover table-condensed">
					<tbody>
	<tr>
		<td><strong><?php echo __('Indicação'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Indicacao']['valor'], array('controller' => 'enumerados', 'action' => 'view', $aluno['Indicacao']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Valor', 'valor' => $this->Number->currency($aluno['Aluno']['indicacao_valor'], 'BRL'))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Nome', 'valor' => h($aluno['Aluno']['indicacao_nome']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Entregou Diploma', 'valor' => h($aluno['Aluno']['entregou_diploma']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Emitir Carteirinha', 'valor' => h($aluno['Aluno']['emitir_carteirinha']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Entregou CPF', 'valor' => h($aluno['Aluno']['entregou_cpf']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Entregou RG', 'valor' => h($aluno['Aluno']['entregou_rg']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Certificado Solicitado', 'valor' => h($aluno['Aluno']['cert_solicitado']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Certificado Entregue', 'valor' => h($aluno['Aluno']['cert_entrega']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Bloqueado', 'valor' => h($aluno['Aluno']['bloqueado']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Data Bloqueio', 'valor' => h($aluno['Aluno']['bloqueado_data']))); ?>
	<tr>
		<td><strong><?php echo __('Orientador'); ?></strong></td>
	<td><?php echo $this->Html->link($aluno['Professor']['nome'], array('controller' => 'professores', 'action' => 'view', $aluno['Professor']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Monografia', 'valor' => h($aluno['Aluno']['mono_titulo']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Data', 'valor' => h($aluno['Aluno']['mono_data']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Prazo', 'valor' => h($aluno['Aluno']['mono_prazo']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Nota', 'valor' => h($aluno['Aluno']['mono_nota']))); ?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
</div>
			</div><!-- /.table-responsive -->	
		</div><!-- /.view -->
 <?php  /*

 */ ?>
   <?php echo $this->element('Relateds/Disciplinas', array('array' => $disciplinas, 'model' => 'AlunoDisciplina', 'controller' => 'aluno_disciplinas', 'aluno' => true));?>
   <?php echo $this->element('Relateds/Mensalidades', array('array' => $mensalidades)); ?>
   <?php echo $this->element('Relateds/Detalhes', array('array' => $detalhes)); ?>
	<div class="panel-footer">
	      <h3><?php echo __('Acessos').' ' ?> 
	         <small><?php echo __('do aluno') ?></small>
	      </h3>
	</div>   
	<div class="panel-body">
		<ul class="list-group" style=" width: 40%; ">
		  <li class="list-group-item">
		    <span class="badge"><?php echo $dia; ?></span> No dia
		  </li>
		  <li class="list-group-item">
		    <span class="badge"><?php echo $semana; ?></span> Na semana
		  </li>
		  <li class="list-group-item">
		    <span class="badge"><?php echo $mes; ?></span> No mes
		  </li>
		  <li class="list-group-item">
		    <span class="badge"><?php echo $sem; ?></span> No semestre
		  </li>
		  <li class="list-group-item">
		    <span class="badge"><?php echo $ano; ?></span> No ano
		  </li>
		  <li class="list-group-item">
		    <span class="badge"><?php echo $antes; ?></span> Antes
		  </li>
		</ul>
	</div><!-- /.related Acessos -->
</div><!-- /#page-container .row-fluid -->
