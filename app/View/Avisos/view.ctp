	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Aviso'); ?>                <small><?php echo __('View'); ?></small>

                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">		
								<li><?php echo $this->Html->link('<i class="fa fa-pencil"></i>'.' '.__('Edit').' '.__('Aviso'), array('action' => 'edit', $aviso['Aviso']['id']), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'.' '.'Delete').' '.__('Aviso'), array('action' => 'delete', $aviso['Aviso']['id']), array('class' => '','escape'=>false), __('Are you sure you want to delete # %s?', $aviso['Aviso']['id'])); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Avisos'), array('action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aviso'), array('action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li class="divider"></li>		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'), array('class' => '','escape'=>false)); ?> </li>
		<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'), array('class' => '','escape'=>false)); ?> </li>
				
					</ul>
                </div>

            </h2>
        </div>
	
	
		
		<div class="avisos view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($aviso['Aviso']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($aviso['Aviso']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Usuario'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($aviso['User']['username'], array('controller' => 'users', 'action' => 'view', $aviso['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Arquivo'); ?></strong></td>
		<td>
			<?php echo h($aviso['Aviso']['arquivo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Mensagem'); ?></strong></td>
		<td>
			<?php echo h($aviso['Aviso']['mensagem']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($aviso['Tipo']['nome']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->


					<div class="panel-footer">
                <h3><?php echo __('Cursos').' ' ?> 
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
				<?php if (!empty($aviso['AvisoCurso'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Curso'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($aviso['AvisoCurso'] as $avisocurso): ?>
		<tr>
			<td><?php echo $avisocurso['id']; ?></td>
			<td><?php echo $this->Html->link($avisocurso['Curso']['nome'], array('controller' => 'cursos', 'action' => 'view', $avisocurso['Curso']['id']), array('class' => '')); ?>
			&nbsp;
			</td>
			<td><?php echo $this->Html->link($avisocurso['Grupo']['nome'], array('controller' => 'grupos', 'action' => 'view', $avisocurso['Grupo']['id']), array('class' => '')); ?>
			&nbsp;
			</td>
			<td class="actions text-center">
				<?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('controller' => 'avisocursos', 'action' => 'view', $avisocurso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('View'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('controller' => 'avisocursos', 'action' => 'edit', $avisocurso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Edit'), 'data-toggle'=>'tooltip')); ?>
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'avisocursos', 'action' => 'delete', $avisocurso['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $avisocurso['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			
	

</div><!-- /#page-container .row-fluid -->