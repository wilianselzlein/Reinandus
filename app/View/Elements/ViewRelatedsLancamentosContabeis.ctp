<div class="panel-footer">
                <h3><?php echo __('LctoContabils').' ' ?> 
                    <small><?php echo __('Related') ?></small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo __('Actions'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                                <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('lctocontabil'), array('controller' => 'lancamentocontabil', 'action' => 'add'), array('class' => '', 'escape' => false)); ?>                                </li>
                            </ul>       
                    </div>
                </h3>
            </div>
			<div class="panel-body">
				<?php if (!empty($array['LancamentoContabil'])): ?>
					
					<div class="table-responsive">
						<table class="table table-hover table-condensed">
							<thead>
								<tr class="active">
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Debito'); ?></th>
		<th><?php echo __('Credito'); ?></th>
		<th><?php echo __('Valor'); ?></th>
									<th class="actions text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php foreach ($array['LancamentoContabil'] as $lctocontabil): ?>
		<tr>
			<td><?php echo $lctocontabil['id']; ?></td>
			<td><?php echo $lctocontabil['data']; ?></td>
            <td><?php echo $this->Html->link($lctocontabil['Debito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lctocontabil['Debito']['id']), array('class' => '')); ?>
             &nbsp;</td>
            <td><?php echo $this->Html->link($lctocontabil['Credito']['descricao'], array('controller' => 'planocontas', 'action' => 'view', $lctocontabil['Credito']['id']), array('class' => '')); ?>
             &nbsp;</td>

			<td><?php echo $this->Number->currency($lctocontabil['valor'],'BRL');?></td>
			<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $lctocontabil, 'model' => '', 'controller' => 'LancamentoContabil')); ?>
		</tr>
									<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
			</div><!-- /.related -->