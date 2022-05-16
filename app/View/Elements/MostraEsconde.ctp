<?php if (! isset($id)) $id = 'dados'; ?>
<button type="button" class="btn btn-default" id="mostrar<?php echo $id; ?>">
	<i class="fa fa-fw fa-caret-down"></i>
	<?php echo $mostra; ?>
</button>
<button type="button" class="btn btn-default" id="fechar<?php echo $id; ?>">
	<i class="fa fa-fw fa-caret-up"></i>
	<?php echo $esconde; ?>
</button>

<script type="text/javascript">
	$(document).ready(function(){
		$('#<?php echo $id; ?>').hide();
		$('#fechar<?php echo $id; ?>').hide();
		$('#mostrar<?php echo $id; ?>').click(function(){
			$('#<?php echo $id; ?>').show('slow');
			$('#mostrar<?php echo $id; ?>').hide();
			$('#fechar<?php echo $id; ?>').show();
		});
		$('#fechar<?php echo $id; ?>').click(function(){
			$('#<?php echo $id; ?>').hide('slow');
			$('#mostrar<?php echo $id; ?>').show();
			$('#fechar<?php echo $id; ?>').hide();
		});
	});
</script>