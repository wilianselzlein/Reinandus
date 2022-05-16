<?php if (count($emails) == 0) return; ?>
<div class="panel panel-default" style="margin-bottom: 5px;">
	<div class="panel-heading">
		<h4>
			<span class="fa fa-list"></span> <?php echo (isset($titulo)) ? $titulo : 'Emails'; ?>
			<div class="btn-group pull-right">
	        	<?php echo $this->element('MostraEsconde', array('mostra' => 'Mostrar', 'esconde' => 'Fechar', 'id' => $id)); ?>
	        </div>
        </h4>
    </div>
	<div id="<?php echo $id; ?>">
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
