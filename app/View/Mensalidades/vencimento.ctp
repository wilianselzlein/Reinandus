<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Mensalidades');?>
        	<small><?php echo __('alterar vencimento') ?></small>
        </h3>
    </div>
	<div class="panel-body">
	<ul class="list-group">
	<?php foreach ($proximos as $proximo => $conta): ?>
		<?php if ($conta > 0 ) { ?>
			<li class="list-group-item">
				<span class="badge"><?php echo $conta; ?></span>
				<?php echo $proximo; ?>
			</li>
		<?php } ?>
	<?php endforeach; ?>
	</ul>
		<div class="notas form">
			<?php echo $this->Form->create('Mensalidade', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'vencimento')); ?>
				<fieldset>
					<div class="form-group">
						<?php echo $this->Form->input('consulta', array('class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
						<?php echo $this->Form->input('para', array('class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
					</div>
					<?php echo $this->Ajax->submit('Consultar', array(
						'id' => 'Vencimento',
						'class' => 'btn btn-large btn-primary',
						'url'=> array('controller'=>'Mensalidades', 'action'=>'consultar'), 
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
