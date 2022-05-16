<div class="panel panel-default ">
	<div class="panel-heading">
		<h2><?php echo __('Aviso'); ?>                
			<small><?php echo __('View'); ?></small>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
		</h2>
	</div>
	<div class="avisos view pandel-body">
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tbody>
					<tr>
						<td><strong><?php echo __('Id'); ?></strong></td>
						<td>
							<?php echo h($aviso['Aviso']['id']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Data'); ?></strong></td>
						<td>
							<?php echo $aviso['Aviso']['data']; ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Usuario'); ?></strong></td>
						<td>
							<?php echo $this->Html->link($aviso['User']['username'], array('controller' => 'users', 'action' => 'view', $aviso['User']['id']), array('class' => '')); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Mensagem'); ?></strong></td>
						<td>
							<?php echo h($aviso['Aviso']['mensagem']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Tipo'); ?></strong></td>
						<td><?php echo $this->Html->link($aviso['Tipo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $aviso['Tipo']['id']), array('class' => '')); ?>&nbsp;</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Arquivo'); ?></strong></td>
						<td>
							<a href="/arqs/<?php echo basename($aviso['Aviso']['caminho']); ?>"><?php echo h($aviso['Aviso']['arquivo']); ?></a>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Vídeo'); ?></strong></td>
						<td>
							<?php echo $this->element('YouTube', array('url' => $aviso['Aviso']['video'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Caminho'); ?></strong></td>
						<td>
							<?php echo h($aviso['Aviso']['caminho']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Tipo'); ?></strong></td>
						<td>
							<?php echo h($aviso['Aviso']['tipo']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><strong><?php echo __('Tamanho'); ?></strong></td>
						<td>
							<?php echo h(round($aviso['Aviso']['tamanho'] / 1024 / 1024, 2)) . ' mb'; ?>
							&nbsp;
						</td>
					</tr>
				</tbody>
			</table>
			<!-- /.table table-striped table-bordered -->
		</div>
		<!-- /.table-responsive -->
		<?php echo $this->element('Avisos/Cursos', array('array' => $aviso['Curso'])); ?>
		<?php echo $this->element('Avisos/Grupos', array('array' => $aviso['Grupo'])); ?>
	</div>
	<!-- /.view -->
</div>
<!-- /#page-container .row-fluid -->