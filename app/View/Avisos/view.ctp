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
</tr><tr>		<td><strong><?php echo __('Arquivo'); ?></strong></td>
		<td>
			<a href="/reinandus/arqs/<?php echo basename($aviso['Aviso']['caminho']); ?>"><?php echo h($aviso['Aviso']['arquivo']); ?></a>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Caminho'); ?></strong></td>
		<td>
			<?php echo h($aviso['Aviso']['caminho']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tipo'); ?></strong></td>
		<td>
			<?php echo h($aviso['Aviso']['tipo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tamanho'); ?></strong></td>
		<td>
			<?php echo h(round($aviso['Aviso']['tamanho'] / 1024 / 1024, 2)) . ' mb'; ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->


			<div class="panel-body">
				<?php if (!empty($aviso['Curso'])): ?>
					<div class="panel-footer">
                <h3><?php echo __('Cursos').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Curso'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($aviso['Curso'] as $avisocurso): ?>
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
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->

			<div class="panel-body">
				<?php if (!empty($aviso['Grupo'])): ?>
					<div class="panel-footer">
                <h3><?php echo __('Grupos').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Grupo'), array('controller' => 'grupos', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($aviso['Grupo'] as $avisogrupo): ?>
		<tr>
			<td><?php echo $avisogrupo['AvisoGrupo']['id']; ?></td>
			<td><?php echo $this->Html->link($avisogrupo['nome'], array('controller' => 'grupos', 'action' => 'view', $avisogrupo['AvisoGrupo']['grupo_id']), array('class' => '')); ?>
			&nbsp;
			</td>
			<td class="actions text-center">
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i>', array('controller' => 'avisogrupos', 'action' => 'delete', $avisogrupo['AvisoGrupo']['id']), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $avisogrupo['AvisoGrupo']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>
				
			</div><!-- /.related -->

</div><!-- /#page-container .row-fluid -->