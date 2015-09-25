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
			<?php echo date('d/m/Y H:i:s', strtotime($professor['Professor']['created'])); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo date('d/m/Y H:i:s', strtotime($professor['Professor']['modified'])); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

<?php echo $this->element('ViewRelatedsCursos', array('array' => $professor)); ?>
<?php echo $this->element('ViewRelatedsDisciplinas', array('array' => $professor, 'model' => 'ProfessorDisciplina')); ?>

</div><!-- /#page-container .row-fluid -->