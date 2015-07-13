<?php 
//<pre><?php print_r($this->Session->read('Auth')); ? ></pre>
	$dados = $this->Session->read('Auth');
	$dados = $dados['Aluno'];
?>
<div class="page-header">
  <h1><?php echo $dados['nome'] . ' - ' . $dados['id']; ?><small> <?php echo $dados['Situacao']['valor']; ?></small></h1>
</div>
<h3><?php echo $dados['Curso']['nome']; ?> <small>Período: <?php echo $dados['curso_inicio'] . ' - ' . $dados['curso_fim']; ?></small></h3>

<?php echo $this->element('AbasPortal'); ?>
