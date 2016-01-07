<button type="button" class="btn btn-default btn-lg">
  <i class="fa fa-print"></i> Imprimir Declaração de Matrícula
</button>
<br/><br/>
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
foreach ($notas as $nota):  
$ha += $nota['AlunoDisciplina']['horas_aula'];
$nt += $nota['AlunoDisciplina']['nota']; 
?>
    <tr>
      <td><?php echo $nota['Disciplina']['nome']; ?></td>
      <td><?php echo $nota['Professor']['nome']; ?></td>
      <td><?php echo $nota['Professor']['resumotitulacao']; ?></td>
      <td></td>
      <td><?php echo $nota['AlunoDisciplina']['horas_aula']; ?></td>
      <td><?php echo $nota['AlunoDisciplina']['data']; ?></td>
      <td><?php echo $nota['AlunoDisciplina']['nota']; ?></td>
    </tr>
<?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo $ha; ?></td>
      <td></td>
      <td><?php echo $nt / count($notas);?></td>
    </tr>
  </tbody>
</table>

</div>