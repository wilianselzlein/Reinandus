<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
		<p class="navbar-text">Situações:</p>
		<?php foreach ($situacoes as $situacao) { 
		echo $this->Html->link($situacao['Situacao']['valor'], array('action' => 'emails', $situacao['Situacao']['id']),
			array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Filtrar'), 'data-toggle'=>'tooltip')); ?>
		<?php } ?>
    </div>
  </div>
</nav>
<?php foreach ($cursos as $curso) {
		echo $this->element('emails', 
			array("emails" => $curso['Curso']['emails'], "titulo" => $curso['Curso']['nome'], "id" => 'sit' . $curso['Curso']['id']));
	}
?>