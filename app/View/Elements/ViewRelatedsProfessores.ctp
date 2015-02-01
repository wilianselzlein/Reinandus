		<div class="panel-footer">
                <h3><?php echo __('Professors').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($array['Professor'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Resumotitulacao'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
		<?php foreach ($array['Professor'] as $professor): ?>
		<tr>
			<td><?php echo $professor['id']; ?></td>
			<td><?php echo $professor['nome']; ?></td>
			<td><?php echo $this->Html->link($professor['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $professor['Cidade']['id']), array('class' => '')); ?>
			&nbsp;</td>
			<td><?php echo $professor['celular']; ?></td>
			<td><?php echo $professor['email']; ?></td>
			<td><?php echo $professor['resumotitulacao']; ?></td>
			<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $professor, 'model' => '', 'controller' => 'professores')); ?>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

			</div><!-- /.related -->