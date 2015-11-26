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
			<?php echo $this->Number->currency($disciplina['Disciplina']['valor'], 'BRL'); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

   <?php echo $this->element('Relateds/Alunos', array('array' => $alunos)); ?>
   <?php echo $this->element('Relateds/Cursos', array('array' => $cursos)); ?>
   <?php echo $this->element('Relateds/Professores', array('array' => $professores)); ?>

</div><!-- /#page-container .row-fluid -->