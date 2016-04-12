<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-list"></span> <?php echo (isset($titulo)) ? $titulo : 'Emails'; ?>
        </h3>
    </div>
    <?php /* echo $this->element('MostraEsconde', 
   array('mostra' => 'Mostrar outros dados', 'esconde' => 'Fechar outros dados'); ?>*/ ?>
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
