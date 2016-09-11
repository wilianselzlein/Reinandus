<div class="panel panel-default">

<div class="panel-heading"><h3><span class="fa fa-comment"></span> <?php echo __('Avisos'); ?>
<?php echo $this->ButtonsActionsEnumerados->MakeButtons($this->params['controller'], $this->params['action']); ?>
        </h3></div>

<div class="panel-body">
		<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('data'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th><?php echo $this->Paginator->sort('arquivo'); ?></th>
							<th><?php echo $this->Paginator->sort('mensagem'); ?></th>
							<th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
							<th class="actions text-center" colspan="2"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($avisos as $aviso): ?> 
	<tr>
		<td><?php echo $aviso['Aviso']['id']; ?>&nbsp;</td>
		<td><?php echo $aviso['Aviso']['data']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aviso['User']['username'], array('controller' => 'users', 'action' => 'view', $aviso['User']['id'])); ?>
		</td>
        <td><a href="/arqs/<?php echo basename($aviso['Aviso']['caminho']); ?>"><?php echo h($aviso['Aviso']['arquivo']); ?></a>&nbsp;</td>
		<td><?php echo h($aviso['Aviso']['mensagem']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aviso['Tipo']['valor'], array('controller' => 'enumerados', 'action' => 'view', $aviso['Tipo']['id'])); ?>
		</td>
		<td class="actions text-center">
			<?php echo $this->element('BotaoAjax', array("controller" => "Avisos", "nome" => "curso", "id" => h($aviso['Aviso']['id']), "icone" => "graduation-cap")); ?>
			<?php echo $this->element('BotaoAjax', array("controller" => "Avisos", "nome" => "grupo", "id" => h($aviso['Aviso']['id']), "icone" => "group")); ?>
		</td>
	<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $aviso, 'model' => 'Aviso')); ?>
	</tr>
	<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "curso", "id" => h($aviso['Aviso']['id']), "colspan" => 8)); ?>
	<?php echo $this->element('LinhaTabelaParaAjax', array("nome" => "grupo", "id" => h($aviso['Aviso']['id']), "colspan" => 8)); ?>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
	
</div>

<?php echo $this->element('Modal'); ?>
<?php echo $this->element('ShowHide'); ?>