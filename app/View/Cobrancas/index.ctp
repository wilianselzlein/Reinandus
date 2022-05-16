<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Cobrança');?>
			<small><?php echo __('Enviar email') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons('Mensalidade', $this->params['action']); ?>
		</h3>
	</div>
	<div class="panel-body">
		<div id="content">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="Cobranca form">
						<?php echo $this->Form->create('Cobranca', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'consultar', 'url' => '/Cobranca/consultar')); ?>
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('aluno_id',
								array('class' => 'form-control combobox',
								'label'=>array('class'=>'col-sm-3 control-label', 'style' => 'padding-left: 0px;'), 
								'div'=>true, 'between'=>'<div class="col-sm-8">', 'after'=>'</div>')); ?>
							</div>
							<div class="form-group">
							<?php
								$modelos = array(0 => 'Mensalidades vencidas em aberto', 1 => 'Mensalidades não vencidas e liberadas para pagamento');
								echo $this->Form->input('envio', array('class' => 'form-control', 'label'=>array('class'=>'col-sm-3 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-8">', 'after'=>'</div>', 'options' => $modelos)); ?>
							</div>

							<?php echo $this->Ajax->submit('Consultar Alunos', array(
								'id' => 'ConsultarAluno',
								'class' => 'btn btn-large btn-primary',
								'url'=> array('controller'=>'Cobrancas', 'action'=>'consultar'), 
								'update' => 'ConsultaAlunos',
								//'condition' => '$("#BoletoVencimentoInicial").val().length > 0',
								'indicator' => 'CarregandoAlunos',
								)); ?>

							<div id="ConsultaAlunos"></div>

							<?php echo $this->Html->image('carregando.gif', array('id' => 'CarregandoAlunos',  'style' => 'display: none')); ?>
							<br>
						</fieldset>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /#page-content .col-sm-9 -->
</div>