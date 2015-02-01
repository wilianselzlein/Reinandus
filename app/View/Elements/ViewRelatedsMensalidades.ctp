<div class="panel-footer">
                <h3><?php echo __('Mensalidades').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Mensalidade'), array('controller' => 'mensalidades', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($array['Mensalidade'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
                  <th><?php echo __('Id'); ?></th>
                  <th><?php echo __('Número'); ?></th>
                  <th><?php echo __('Vencimento'); ?></th>
                  <th><?php echo __('Líquido'); ?></th>
                  <th><?php echo __('Pagamento'); ?></th>
                  <th><?php echo __('Aluno'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php foreach ($array['Mensalidade'] as $mensalidade): ?> 
		<tr>
                  <td><?php echo $mensalidade['id']; ?></td>
                  <td><?php echo $mensalidade['numero']; ?></td>
                  <td><?php echo $mensalidade['vencimento']; ?></td>
                  <td><?php echo $mensalidade['liquido']; ?></td>
                  <td><?php echo $mensalidade['pagamento']; ?></td>
                  <td><?php echo $this->Html->link($mensalidade['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $mensalidade['Aluno']['id']), array('class' => '')); ?>
                     &nbsp;</td>
			<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $mensalidade, 'model' => '', 'controller' => 'mensalidades')); ?>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->