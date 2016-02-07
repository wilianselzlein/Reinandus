<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-wrench"></span> <?php echo __('Programas'); ?>
    <?php echo $this->Html->link('<i class="fa fa-refresh"></i>', array('action' => 'atualizar'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Atualizar Parametros'), 'data-toggle'=>'tooltip')); ?>
	<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('nome'); ?></th>
							<th><?php echo $this->Paginator->sort('is_cadastro', 'Cadastro'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($programas as $programa): ?>
	<tr>
		<td><?php echo h($programa['Programa']['id']); ?>&nbsp;</td>
		<td><?php echo h($programa['Programa']['nome']); ?>&nbsp;</td>
		<td><i class="<?php echo ($programa['Programa']['is_cadastro'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $programa, 'model' => 'Programa')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
