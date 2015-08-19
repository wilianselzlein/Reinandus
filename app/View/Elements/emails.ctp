<div class="panel panel-default">

	<div class="panel-heading">
		<h3>
			<span class="fa fa-list"></span> <?php echo __('Emails'); ?>
        </h3>
    </div>

<div class="panel-body">
			<?php //echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
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
			</div><!-- /.table-responsive -->
</div>
</div>
