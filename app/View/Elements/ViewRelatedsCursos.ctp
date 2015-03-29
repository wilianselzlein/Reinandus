<div class="panel-footer">
                <h3><?php echo __('Cursos').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>
                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($array['Curso'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Sigla'); ?></th>
		<th><?php echo __('Coordenador'); ?></th>
		<th><?php echo __('Turma'); ?></th>
		<th><?php echo __('Carga'); ?></th>
		<th><?php echo __('Secretária'); ?></th>
		<th><?php echo __('Num Turma'); ?></th>
		<th><?php echo __('Periodo'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
	<?php foreach ($array['Curso'] as $curso): ?>
		<tr>
			<td><?php echo $curso['id']; ?></td>
			<td><?php echo $curso['nome']; ?></td>
			<td><?php echo $curso['sigla']; ?></td>
			<td><?php echo $this->DisplayField->MakeLink($curso, 'professores', 'professor_id'); ?></td>
			<td><?php echo $curso['turma']; ?></td>
			<td><?php echo $curso['carga']; ?></td>
			<td><?php echo $this->DisplayField->MakeLink($curso, 'pessoas', 'pessoa_id'); ?></td>
			<td><?php echo $curso['num_turma']; ?></td>
			<td><?php echo $this->DisplayField->MakeLink($curso, 'enumerados', 'periodo_id'); ?></td>
			<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $curso, 'model' => '', 'controller' => 'cursos')); ?>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->