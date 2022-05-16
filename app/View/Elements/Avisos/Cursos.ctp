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
				<?php $id = $avisocurso['AvisoCurso']['id']; ?>
				<?php $aviso_id = $avisocurso['AvisoCurso']['aviso_id']; ?>
				<tr id="curso<?php echo $id; ?>">
					<td><?php echo $id; ?></td>
					<td><?php echo $this->Html->link($avisocurso['nome'], array('controller' => 'cursos', 'action' => 'view', $id), array('class' => '')); ?>
						&nbsp;
					</td>
					<td class="actions text-center">
						<?php echo $this->element('BotaoDeleteAjax', 
							array("controller" => "aviso_cursos", "nome" => "curso", "id" => $id)); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<!-- /.table table-striped table-bordered -->
	</div>
	<a href="#" onclick="window.open(
		'<?php echo $this->Html->url(array('controller'=>'avisos','action'=>'popup', 'Curso', $aviso_id)); ?>','popup',
		'width=550,height=600,scrollbars=yes,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
		return false">Adicionar Curso</a>
	<!-- /.table-responsive -->
	<?php endif; ?>
</div>
<!-- /.related -->