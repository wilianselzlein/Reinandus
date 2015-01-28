<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-building"></span> <?php echo __('Instituto'); ?>
	                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>   
					<?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Instituto'), 
							array('action' => 'add'), array('class' => '', 'escape'=>false)); ?>				</li>
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
				<li class="divider"></li>				<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?></li> 
				<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?></li> 
			</ul>
                </div>
            </h3></div>

<div class="panel-body">

			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
							<th><?php echo $this->Paginator->sort('diretor_id'); ?></th>
							<th><?php echo $this->Paginator->sort('tipo_id'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($institutos as $instituto): ?>
	<tr>
		<td><?php echo h($instituto['Instituto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($instituto['Empresa']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Empresa']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($instituto['Diretor']['fantasia'], array('controller' => 'pessoas', 'action' => 'view', $instituto['Diretor']['id'])); ?>
		</td>
		<td><?php echo h($instituto['Tipo']['nome']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $instituto, 'model' => 'Instituto')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
