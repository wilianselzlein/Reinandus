<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Remessa/Retorno');?>
			<small><?php echo __('Integração bancária') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons('Mensalidade', $this->params['action']); ?>
		</h3>
	</div>
	<div class="panel-body">
		<div id="content">
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
				<li class="active">
					<a href="#tabRem" data-toggle="tab"><i class="fa fa-share"></i> Remessa</a>
				</li>
				<li>
					<a href="#tabRet" data-toggle="tab"><i class="fa fa-reply"></i> Retorno</a>
				</li>
				<li>
					<a href="#tabVal" data-toggle="tab"><i class="fa fa-cogs "></i> Validar</a>
				</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="my-tab-content" class="tab-content">
						<div class="tab-pane active" id="tabRem">
							<div class="Boleto form">
								<?php echo $this->Form->create('Boleto', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'gerar', 'url' => '/Boletos/gerar')); ?>
								<fieldset>
									<div class="form-group">
										<?php echo $this->Form->input('conta_id',
										array('class' => 'form-control combobox',
										'label'=>array('class'=>'col-sm-3 control-label', 'style' => 'padding-left: 0px;'), 
										'div'=>true, 'between'=>'<div class="col-sm-8">', 'after'=>'</div>')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('vencimento_inicial',
										array('type' => 'text', 'class' => 'form-control datepicker-start', 
											'label'=>array('class'=>'col-sm-3 control-label', 'text' => 'Vencimento Inicial'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('vencimento_final',
										array('type' => 'text', 'class' => 'form-control datepicker-end', 
											'label'=>array('class'=>'col-sm-3 control-label', 'text' => 'Vencimento Final'), 'div'=>true, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
									</div>
									<div class="form-group">
									<?php
										$modelos = array(0 => 'Não enviadas', 1 => 'Enviadas', 2 => 'Todas');
										echo $this->Form->input('envio', array('class' => 'form-control', 'label'=>array('class'=>'col-sm-3 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-8">', 'after'=>'</div>', 'options' => $modelos)); ?>
									</div>
									<?php echo $this->Form->button('<i class="fa fa-envelope"></i>'.' '.__('Gerar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'onclick' => '__loadMostra();','escape' => false)); ?>
								</fieldset>
								<?php echo $this->Form->end(); ?>
							</div>
							<!-- /.form -->
						</div>
						<div class="tab-pane" id="tabRet">
							<div class="Boletos form">
								<?php echo $this->Form->create('Boleto', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'processar', 'url' => '/Boletos/processar', 'enctype' => 'multipart/form-data')); ?>
								<fieldset>
									<div class="form-group">
										<?php echo $this->Form->input('retorno',
										array('type' => 'file','class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
									</div>
									<!-- .form-group -->
									<?php echo $this->Form->button('<i class="fa fa-refresh"></i>'.' '.__('Processar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
								</fieldset>
								<?php echo $this->Form->end(); ?>
							</div>
							<!-- /.form -->
						</div>
						<div class="tab-pane" id="tabVal">
							<div class="Boletos form">
								<?php echo $this->Form->create('Boleto', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'validar', 'url' => '/Boletos/processar/1', 'enctype' => 'multipart/form-data')); ?>
								<fieldset>
									<div class="form-group">
										<?php echo $this->Form->input('retorno',
										array('type' => 'file','class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
									</div>
									<!-- .form-group -->
									<?php echo $this->Form->button('<i class="fa fa-cog fa-spin fa-fw"></i>'.' '.__('Validar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
								</fieldset>
								<?php echo $this->Form->end(); ?>
							</div>
							<!-- /.form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /#page-content .col-sm-9 -->
</div>
<!-- /#page-container .row-fluid -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
	    $('#tabs').tab();
	});
</script>