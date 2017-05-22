<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Previsão');?>
        	<small><?php echo __('de recebimento e pagamentos') ?></small>
        </h3>
    </div>
	<div class="panel-body">
	<ul class="list-group">
	</ul>
		<div class="notas form">
			<?php echo $this->Form->create('Previsao', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'consultar')); ?>
				<fieldset>
					<div class="form-group">
						<?php echo $this->Form->input('consulta', array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div>
					<?php echo $this->Ajax->submit('Consultar', array(
						'id' => 'Consultar',
						'class' => 'btn btn-large btn-primary',
						'url'=> array('controller'=>'Previsao', 'action'=>'consultar'), 
						'update' => 'Consulta',
						//'condition' => '$("#BoletoVencimentoInicial").val().length > 0',
						'indicator' => 'Carregando'
						//'before' => '$("#GerarRemessa").show(); ' //$("#ConsultarRemessa").hide();
						)); ?>

					<?php echo $this->Html->image('carregando.gif', array('id' => 'Carregando',  'style' => 'display: none')); ?>
					<br>
					<div id="Consulta"></div>
				</fieldset>
			<?php echo $this->Form->end(); ?>
		</div><!-- /.form -->
	</div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->
