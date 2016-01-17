<?php echo $this->Form->create('Portal', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'matricula', 'target' => '_blank')); ?>

  <?php echo $this->Form->hidden('id', array('value' => $notas[0]['AlunoDisciplina']['aluno_id'])); ?>
  <?php echo $this->Form->hidden('nome', array('value' => $notas[0]['Aluno']['nome'])); ?>
  <?php echo $this->Form->hidden('curso', array('value' => $notas[0]['Aluno']['curso_id'])); ?>
  <?php echo $this->Form->hidden('curso_inicio', array('value' => $notas[0]['Aluno']['curso_inicio'])); ?>
  <?php echo $this->Form->hidden('curso_fim', array('value' => $notas[0]['Aluno']['curso_fim'])); ?>
  <?php echo $this->Form->hidden('situacao', array('value' => $notas[0]['Aluno']['situacao_id'])); ?>

  <?php echo $this->Form->button('<i class="fa fa-print"></i>'.' '.__('Imprimir Declaração de Matrícula'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btn_materiais')); ?>
<?php echo $this->Form->end(); ?>

<br/>
<div class="panel panel-default">
<table class="table">
  <thead>
    <tr>
      <th>Disciplina</th>
      <th>Professor</th>
      <th>Titulação</th>
      <th>Datas</th>
      <th>CH</th>
      <th>Freq. (%)</th>
      <th>Nota</th>
    </tr>
  </thead>
  <tbody>
<?php 
$ha = 0;
$nt = 0;
$fr = 0;
foreach ($notas as $nota):  
$ha += $nota['AlunoDisciplina']['horas_aula'];
$nt += $nota['AlunoDisciplina']['nota']; 
$fr += $nota['AlunoDisciplina']['frequencia']; 
?>
    <tr>
      <td><?php echo $nota['Disciplina']['nome']; ?>&nbsp;</td>
      <td><?php echo $nota['Professor']['nome']; ?>&nbsp;</td>
      <td><?php echo $nota['Professor']['resumotitulacao']; ?>&nbsp;</td>
      <td><?php echo h($nota['AlunoDisciplina']['data']); ?>&nbsp;</td>
      <td><?php echo $nota['AlunoDisciplina']['horas_aula']; ?>&nbsp;</td>
      <td><?php echo $nota['AlunoDisciplina']['frequencia']; ?>&nbsp;</td>
      <td><?php echo $nota['AlunoDisciplina']['nota']; ?>&nbsp;</td>
    </tr>
<?php endforeach; ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php echo $ha; ?>&nbsp;</td>
      <td><?php echo $fr / count($notas);?>&nbsp;</td>
      <td><?php echo $nt / count($notas);?>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>