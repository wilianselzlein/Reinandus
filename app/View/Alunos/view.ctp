	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2>
<?php 
if ($aluno['Aluno']['sexo'] == 'M') 
	echo '<i class="fa fa-male"></i>';
else
	echo '<i class="fa fa-female"></i>';
?>
             <?php echo __('Aluno'); ?>                <small><?php echo __('View'); ?></small>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Aluno'), array('action' => 'edit', $aluno['Aluno']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Aluno'), array('action' => 'delete', $aluno['Aluno']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $aluno['Aluno']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>
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
	<?php echo $this->element('LinhaView', array('alias' => 'Situacao', 'valor' => h($aluno['Situacao']['nome']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Formacao', 'valor' => h($aluno['Aluno']['formacao']))); ?>
	<tr>
		<td><strong><?php echo __('Naturalidade'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Naturalidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $aluno['Naturalidade']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Nacionalidade', 'valor' => h($aluno['Aluno']['nacionalidade']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Nascimento', 'valor' => h($aluno['Aluno']['data_nascimento']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Estado Civil', 'valor' => h($aluno['EstadoCivil']['nome']))); ?>
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
	<?php echo $this->element('LinhaView', array('alias' => 'Email', 'valor' => h($aluno['Aluno']['email']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Alternativo', 'valor' => h($aluno['Aluno']['emailalt']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Bolsa', 'valor' => h($aluno['Aluno']['bolsa']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Desconto', 'valor' => h($aluno['Aluno']['desconto']))); ?>
	<tr>
		<td><strong><?php echo __('Curso'); ?></strong></td>
		<td><?php echo $this->Html->link($aluno['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $aluno['Curso']['id']), array('class' => '')); ?>&nbsp;</td>
	</tr>
	<?php echo $this->element('LinhaView', array('alias' => 'Início', 'valor' => h($aluno['Aluno']['curso_inicio']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Fim', 'valor' => h($aluno['Aluno']['curso_fim']))); ?>
					</tbody>
				</table><!-- /.table table-striped table-bordered -->

<a class="btn btn-default btn-xs" id="mostrar">Mostrar outros dados</a>
<a class="btn btn-default btn-xs" id="fechar">Fechar outros dados</a>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dados').hide();
		$('#fechar').hide();
		$('#mostrar').click(function(){
			$('#dados').show('slow');
			$('#mostrar').hide();
			$('#fechar').show();
		});
		$('#fechar').click(function(){
			$('#dados').hide('slow');
			$('#mostrar').show();
			$('#fechar').hide();
		});
	});
</script>
<div id="dados" >
				<table class="table table-hover table-condensed">
					<tbody>
	<?php echo $this->element('LinhaView', array('alias' => 'Indicação', 'valor' => h($aluno['Indicacao']['nome']))); ?>
	<?php echo $this->element('LinhaView', array('alias' => 'Valor', 'valor' => h($aluno['Aluno']['indicacao_valor']))); ?>
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
		<td><?php echo $this->Html->link($aluno['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $aluno['Professor']['id']), array('class' => '')); ?>&nbsp;</td>
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

	<div class="panel-footer">
      <h3><?php echo __('Disciplinas').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Disciplinas'), array('controller' => 'disciplinas', 'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Disciplina'), array('controller' => 'alunodisciplinas', 'action' => 'add'),     array('escape'=>false)); ?>   </li>
            </ul>       
         </div>
      </h3>
   </div>   
   <div class="panel-body">
      <?php if (!empty($aluno['AlunoDisciplina'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Disciplina'); ?></th>
                  <th><?php echo __('Professor'); ?></th>
                  <th><?php echo __('Frequencia'); ?></th>
                  <th><?php echo __('Nota'); ?></th>
                  <th><?php echo __('HA'); ?></th>
                  <th><?php echo __('Data'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($aluno['AlunoDisciplina'] as $disciplina): ?>
               <tr>
                  <td><?php echo $disciplina['id']; ?></td>
                  <td><?php echo $this->Html->link($disciplina['Disciplina']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $disciplina['Disciplina']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $this->Html->link($disciplina['Professor']['nome'], array('controller' => 'professors', 'action' => 'view', $disciplina['Professor']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td><?php echo $disciplina['frequencia']; ?></td>
                  <td><?php echo $disciplina['nota']; ?></td>
                  <td><?php echo $disciplina['horas_aula']; ?></td>
                  <td><?php echo $disciplina['data']; ?></td>
                  <td class="actions text-center">
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',  array('controller' => 'alunodisciplinas', 'action' => 'edit',   $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',   array('controller' => 'alunodisciplinas', 'action' => 'delete', $disciplina['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'),   'data-toggle'=>'tooltip'), 
                           __('Are you sure you want to delete # %s?', $disciplina['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>
   </div><!-- /.related Disciplinas -->

	<div class="panel-footer">
      <h3><?php echo __('Mensalidades').' ' ?> 
         <small><?php echo __('Related') ?></small>
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Mensalidades'), array('controller' => 'mensalidades', 'action' => 'index'),   array('escape'=>false)); ?>   </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Mensalidade'), array('controller' => 'mensalidades', 'action' => 'add'),     array('escape'=>false)); ?>   </li>
            </ul>       
         </div>
      </h3>
   </div>   
   <div class="panel-body">
      <?php if (!empty($aluno['Mensalidade'])): ?>

      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <thead>
               <tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Número'); ?></th>
                  <th><?php echo __('Vencimento'); ?></th>
                  <th><?php echo __('Líquido'); ?></th>
                  <th><?php echo __('Pagamento'); ?></th>
                  <th><?php echo __('Forma'); ?></th>
                  <th class="actions text-center"><?php echo __('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($aluno['Mensalidade'] as $mensalidade): ?>
               <tr>
                  <td><?php echo $mensalidade['id']; ?></td>
                  <td><?php echo $mensalidade['numero']; ?></td>
                  <td><?php echo $mensalidade['vencimento']; ?></td>
                  <td><?php echo $mensalidade['liquido']; ?></td>
                  <td><?php echo $mensalidade['pagamento']; ?></td>
                  <td><?php echo $this->Html->link($mensalidade['Formapgto']['nome'], array('controller' => 'disciplinas', 'action' => 'view', $mensalidade['Formapgto']['id']), array('class' => '')); ?>
                     &nbsp;</td>
                  <td class="actions text-center">
      				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'mensalidades', 'action' => 'view', $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Html->link('<i class="fa fa-pencil"></i>',  array('controller' => 'mensalidades', 'action' => 'edit',   $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'),     'data-toggle'=>'tooltip')); ?>
                     <?php echo $this->Form->postLink('<i class="fa fa-times"></i>',   array('controller' => 'mensalidades', 'action' => 'delete', $mensalidade['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'),   'data-toggle'=>'tooltip'), 
                           __('Are you sure you want to delete # %s?', $mensalidade['id'])); ?>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

      <?php endif; ?>
   </div><!-- /.related Mensalidades -->
	<div class="panel-footer">
	      <h3><?php echo __('Acessos').' ' ?> 
	         <small><?php echo __('do aluno') ?></small>
	      </h3>
	</div>   
	<div class="panel-body">
  	<?php if (!empty($aluno['Acesso'])): ?>
		<?php 
		$dia = 0; $mes = 0; $sem = 0; $ano = 0;

		foreach ($aluno['Acesso'] as $acesso):
			if ($acesso['datahora'] == null)
				Continue;

			$interval = date_create('now')->diff(date_create($acesso['datahora']));
			if ($interval->days == 0) $dia++;
			if ($interval->days < 30) $mes++;
			if ($interval->days < 180) $sem++;
			if ($interval->days < 360) $ano++;

		endforeach; ?>
		<ul class="list-group" style=" width: 40%; ">
		  <li class="list-group-item">
		    <span class="badge"><?php echo $dia; ?></span> No dia
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
		</ul>
    <?php endif; ?>
   </div><!-- /.related Acessos -->


	<div class="panel-footer">
	      <h3><?php echo __('Detalhes').' ' ?> 
	         <small><?php echo __('do aluno') ?></small>
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions'); ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <?php if (empty($aluno['Detalhe'])): ?>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add', $aluno['Aluno']['id']), array('escape'=>false)); ?>   </li>
               <?php endif; ?>
               <?php if (!empty($aluno['Detalhe'])): ?>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('Edit') .' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'edit', $aluno['Detalhe'][0]['id']), array('escape'=>false)); ?>   </li>
               <li>
                 <?php echo $this->Form->postLink('<i class="fa fa-times"></i>'. ' ' .__('Delete') .' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'delete', $aluno['Detalhe'][0]['id'], $aluno['Aluno']['id']), array('style' => 'margin: 10px;', 'class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $aluno['Detalhe'][0]['id'])); ?>
                </li>
              <?php endif; ?>
            </ul>       
         </div>
	      </h3>
	</div>   
	<div class="panel-body">
  	<?php if (!empty($aluno['Detalhe'])): ?>
		<div class="list-group">
			<a href="#" class="list-group-item active">
				<h4 class="list-group-item-heading">Ocorrências</h4>
				<p class="list-group-item-text"><?php echo $aluno['Detalhe'][0]['ocorrencias']; ?></p>
			</a>
			<a href="#" class="list-group-item">
				<h4 class="list-group-item-heading">Histórico Escolar</h4>
				<p class="list-group-item-text"><?php echo $aluno['Detalhe'][0]['hist_escolar']; ?></p>
			</a>
			<a href="#" class="list-group-item">
				<h4 class="list-group-item-heading">Negociação Financeira</h4>
				<p class="list-group-item-text"><?php echo $aluno['Detalhe'][0]['neg_financeira']; ?></p>
			</a>
			<a href="#" class="list-group-item">
				<h4 class="list-group-item-heading">Egresso</h4>
				<p class="list-group-item-text"><?php echo $aluno['Detalhe'][0]['egresso']; ?></p>
			</a>
		</div>

		<?php echo $aluno['Detalhe'][0]['foto']; ?>
    <?php endif; ?>
   </div><!-- /.related Detalhes -->

</div><!-- /#page-container .row-fluid -->