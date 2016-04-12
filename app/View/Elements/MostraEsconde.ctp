<a class="btn btn-default btn-xs" id="mostrar"><?php echo $mostra; ?></a>
<a class="btn btn-default btn-xs" id="fechar"><?php echo $esconde; ?></a>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dados').hide();
		$('#fechar').hide();
		$('#mostrar').click(function(){
			$('#dados').show('slow');
			$('#mostrar').hide();
			$('#fechar').show();
		});
		$('#fechar').click(function(){
			$('#dados').hide('slow');
			$('#mostrar').show();
			$('#fechar').hide();
		});
	});
</script>