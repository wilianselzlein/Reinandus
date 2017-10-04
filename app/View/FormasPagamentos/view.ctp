	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('FormaPagamento');?>
            <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
            </h2>
        </div>	
		
		<div class="formapgtos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						
<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nome'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['nome']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['tipo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Mensagem'); ?></strong></td>
		<td>
			<?php echo h($formapgto['Formapgto']['mensagem']); ?>
			&nbsp;
		</td>
</tr>					
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->
<?php 
echo $this->element('Relateds/Alunos', array('array' => $alunos));
echo $this->element('Relateds/Mensalidades', array('array' => $mensalidades));
echo $this->element('Relateds/ContasPagar', array('array' => $pagar));
?>
</div><!-- /#page-container .row-fluid -->