	 <div class="panel panel-default ">
        <div class="panel-heading">
            <h2><?php echo __('Enumerado'); ?>
            <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
        </h2>
        </div>
		
		<div class="enumerados view pandel-body">
			
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<tbody>
<?php echo $this->element('LinhaView', array('alias' => 'Valor', 'valor' => h($enumerado['Enumerado']['valor']))); ?>
<tr>		<td><strong><?php echo __('Ativo'); ?></strong></td>
		<td>
			<i class="<?php echo ($enumerado['Enumerado']['is_ativo'] == true ? 'glyphicon fa fa-check-square-o' : 'fa fa-square-o'); ?>"></i> &nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->	

<?php
	if (isset($alunos) && (count($alunos) > 0))
 		echo $this->element('ViewRelatedsAlunos', array('array' => $alunos)); 
 	if (isset($avisos) && (count($avisos) > 0))
 		echo $this->element('ViewRelatedsAvisos', array('array' => $avisos)); 
 	if (isset($cursos) && (count($cursos) > 0))
 		echo $this->element('ViewRelatedsCursos', array('array' => $cursos)); 
 	if (isset($filtros) && (count($filtros) > 0))
 		echo $this->element('ViewRelatedsFiltros', array('array' => $filtros, 'model' => 'RelatoriosFiltros')); 
?>

</div><!-- /#page-container .row-fluid ->