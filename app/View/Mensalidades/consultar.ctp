<?php if (count($registros) > 0) { ?>
<div class="panel panel-default">
	<div class="progress" id="progressdiv">
		<div class="progress-bar" role="progressbar" style="width: 0%;" id="progress">
		</div>
	</div>
	<span class="badge" id="counter">
		<?php echo count($registros); ?>
	</span>  registro(s).
	<input id="AlterarTodos" value="Alterar Todos" onclick="return false;" type="button">
	<div id="retorno"><div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
		              <th><?php echo __('Id'); ?></th>
		              <th><?php echo __('Número'); ?></th>
		              <th><?php echo __('Vencimento'); ?></th>
		              <th><?php echo __('Líquido'); ?></th>
		              <th><?php echo __('Aluno'); ?></th>
					  <th colspan="2" class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($registros as $registro): ?>
	<?php $id = $registro['Mensalidade']['id']; ?>
	<tr id="<?php echo 'Registro' . $id; ?>" class="linha">
		<td><?php echo $registro['Mensalidade']['id']; ?></td>
		<td><?php echo $registro['Mensalidade']['numero']; ?></td>
		<td><?php echo $registro['Mensalidade']['vencimento']; ?></td>
		<td><?php echo $registro['Mensalidade']['liquido']; ?></td>
		<td><?php echo $registro['Aluno']['nome']; ?></td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $registro, 'model' => 'Mensalidade')); ?>
		<td>
			<i class="fa fa-refresh fa-spin fa-1x fa-fw indicator" id="<?php echo 'Indicador' . $id; ?>" style="display: none"></i>
			<div id="update<?php echo $id; ?>"></div>
			<?php echo $this->Ajax->submit('Alterar', array(
						'id' => 'Alterar' . $id,
						'url'=> array('controller'=>'Mensalidades', 'action'=>'alterar', $id, $para), 
						'class' => 'Alterar',
						'update' => 'update'. $id,
						'indicator' => 'Indicador' . $id,
						'before' => ' $("#Alterar' . $id . '").remove()' 
						//$("#Registro' .  $id. '").hide();'; 
						//$("#Corrigir' . $id . '").attr("disabled", true);
						)); ?>
		</td>
	</tr>
<?php endforeach; ?>
				</tbody>
			</table>
		</div><!-- /.table-responsive -->
	</div>
</div>
<?php } else {?>
<div class="alert alert-success" role="alert">Nenhum registro encontrado.</div>
<?php } ?>
<script type="text/javascript">
$(document).ready(function() {
	var count = $("#counter").html();
	var progress = 0;
	var total;

	(function ($) {
		$.each(['show', 'hide'], function (i, ev) {
		var el = $.fn[ev];
		$.fn[ev] = function () {
			this.trigger(ev);
			return el.apply(this, arguments);
		};
	});
	})(jQuery);

	$("#progressdiv").hide();

	$("#AlterarTodos").click(function() {
		count = $("#counter").html();
		total = count;
		progress = 0;
		$("#progressdiv").show();
		$("#AlterarTodos").hide();
		$(".Alterar").trigger("click");
	})

	$('.indicator').on('hide', function(){
		//console.log(this);
		if($(this).is(':visible')){
			count--;
			if (count == 0) {
				window.setTimeout(function() {
					$("#progressdiv").hide();
				}, 2000);
			}
			progress++;
			$("#counter").html(count);
			progresso = (progress / total * 100);
			$("#progress").width(progresso + '%');
			this.remove();
		}
	});

});
</script>