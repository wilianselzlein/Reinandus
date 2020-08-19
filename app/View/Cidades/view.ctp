	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Cidade'); ?>
            	<small><?php echo __('View'); ?></small>
                <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
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
<?php echo $this->element('Relateds/Alunos', array('array' => $alunos)); ?>
<?php echo $this->element('Relateds/Pessoas', array('array' => $pessoas)); ?>
<?php echo $this->element('Relateds/Professores', array('array' => $professores)); ?>

</div><!-- /#page-container .row-fluid -->