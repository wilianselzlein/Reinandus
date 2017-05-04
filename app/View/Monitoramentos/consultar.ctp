<?php if (count($registros) > 0) { ?>
<div class="panel panel-default">
	<span class="badge">
		<?php echo count($registros); ?> registro(s).
	</span>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
						<?php foreach ($colunas as $coluna):
								if (is_array($coluna)) {
									foreach ($coluna as $subcoluna):
										echo '<th>' . Inflector::humanize($subcoluna) . '</th>';
									endforeach; 
								} else {
									echo '<th>' . Inflector::humanize($coluna) . '</th>';
								}
							endforeach; ?>
						<th colspan="2" class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($registros as $registro): ?>
	<?php $id = $registro[$model]['id']; ?>
	<tr>
		<?php foreach ($registro as $coluna => $chave):
				if (is_array($chave)) {
					foreach ($chave as $subcoluna):
						echo '<th>' . h($subcoluna) . ' &nbsp; </th>';
					endforeach; 
				}
			endforeach; ?>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $registro, 'controller' => $controller)); ?>
		<td>
			<?php echo $this->Html->link('<i class="fa fa-eraser"></i>', array('action' => 'corrigir', $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Corrigir'), 'data-toggle'=>'tooltip')); ?> &nbsp;</td>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
</div>
<?php } else {?>
<div class="alert alert-success" role="alert">Nenhum registro encontrado.</div>
<?php } ?>
