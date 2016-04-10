<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-list"></span> <?php echo (isset($titulo)) ? $titulo : 'Emails'; ?>
        </h3>
    </div>
    <?php /*
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

	<a class="btn btn-default btn-xs" id="mostrar">Mostrar</a>
	<a class="btn btn-default btn-xs" id="fechar">Fechar</a>
	*/ ?>
	<div id="dados">
		<div class="panel-body">
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
					<thead>
						<th>Emails</th>
					</thead>
					<tbody>
						<?php foreach ($emails as $email): ?>
						<tr>
							<td><?php echo $email; ?>&nbsp;</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
