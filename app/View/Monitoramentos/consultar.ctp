<?php if (count($registros) > 0) { ?>
<div class="panel panel-default">
	<span class="badge" id="counter">
		<?php echo count($registros); ?>
	</span>  registro(s).
	<input id="CorrigirTodos" value="Corrigir Todos" onclick="return false;" type="button">
	<div id="retorno"><div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condensed" >
				<thead>
					<tr class="active">
						<?php foreach ($colunas as $coluna):
								if (is_array($coluna)) {
									foreach ($coluna as $subcoluna):
										echo '<th>' . Inflector::humanize($subcoluna) . '</th>';
									endforeach; 
								} else {
									echo '<th>' . Inflector::humanize($coluna) . '</th>';
								}
							endforeach; ?>
						<th colspan="2" class="actions text-center"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($registros as $registro): ?>
	<?php $id = $registro[$model]['id']; ?>
	<tr id="<?php echo 'Registro' . $id; ?>" class="linha">
		<?php foreach ($registro as $coluna => $chave):
				if (is_array($chave)) {
					foreach ($chave as $subcoluna):
						echo '<th>' . h($subcoluna) . ' &nbsp; </th>';
					endforeach; 
				}
			endforeach; ?>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $registro, 'controller' => $controller)); ?>
		<td>
			<?php /*echo $this->Html->link('<i class="fa fa-eraser"></i>', array('action' => 'corrigir', $componente, $id), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Corrigir'), 'data-toggle'=>'tooltip')); */ ?>
			<i class="fa fa-refresh fa-spin fa-1x fa-fw indicator" id="<?php echo 'Indicador' . $id; ?>" style="display: none"></i>
			<?php echo $this->Ajax->submit('Corrigir', array(
						'id' => 'Corrigir' . $id,
						'url'=> array('controller'=>'Monitoramentos', 'action'=>'corrigir' , $componente, $id), 
						'class' => 'Corrigir',
						//'update' => 'retorno',
						'indicator' => 'Indicador' . $id,
						'before' => ' $("#Corrigir' . $id . '").remove()' 
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

	(function ($) {
	  $.each(['show', 'hide'], function (i, ev) {
	    var el = $.fn[ev];
	    $.fn[ev] = function () {
	      this.trigger(ev);
	      return el.apply(this, arguments);
	    };
	  });
	})(jQuery);

	$("#CorrigirTodos").click(function() {
		count = $("#counter").html();
		$("#CorrigirTodos").hide();
		$(".Corrigir").trigger("click");
	})

	$('.indicator').on('hide', function(){
		//console.log(this);
		if($(this).is(':visible')){
			count--;
			$("#counter").html(count);
			this.remove();
		}
	});

});
</script>