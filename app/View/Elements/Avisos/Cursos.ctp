<div class="panel-body">
	<?php if (!empty($array)): ?>
	<div class="panel-footer">
		<h3>
			<?php echo __('Cursos').' ' ?> 
			<small><?php echo __('Related') ?></small>
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<?php echo __('Actions'); ?> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
					    <?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
					</li>
				</ul>
			</div>
		</h3>
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<thead>
				<tr class="active">
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('Curso'); ?></th>
					<th class="actions text-center"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($array as $avisocurso): ?>
				<tr>
					<td><?php echo $avisocurso['AvisoCurso']['id']; ?></td>
					<td><?php echo $this->Html->link($avisocurso['nome'], array('controller' => 'cursos', 'action' => 'view', $avisocurso['AvisoCurso']['curso_id']), array('class' => '')); ?>
						&nbsp;
					</td>
					<td class="actions text-center">
						<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'aviso_cursos', 'action' => 'delete', $avisocurso['AvisoCurso']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $avisocurso['AvisoCurso']	['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<!-- /.table table-striped table-bordered -->
	</div>
	<!-- /.table-responsive -->
	<?php endif; ?>
</div>
<!-- /.related -->