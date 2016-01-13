<?php echo $this->Form->create('Portal', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'comprovante', 'target' => '_blank')); ?>

  <?php echo $this->Form->hidden('id', array('value' => $mensalidades[0]['Mensalidade']['aluno_id'])); ?>
  <?php echo $this->Form->hidden('nome', array('value' => $mensalidades[0]['Aluno']['nome'])); ?>
  <?php echo $this->Form->hidden('curso', array('value' => $mensalidades[0]['Aluno']['curso_id'])); ?>
  <?php echo $this->Form->input('ano', array('options' => $anos)); ?>

  <?php echo $this->Form->button('<i class="fa fa-print"></i>'.' '.__('Imprimir Comprovante de Pagamentos'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btncomprovante')); ?>
<?php echo $this->Form->end(); ?>

<br/><br/>
<div class="panel panel-default">
<table class="table">
  <thead>
    <tr>
      <th>&nbsp;</th>
      <th>Vencimento</th>
      <th>Pagamento</th>
      <th>Valor (R$)</th>
      <th>Multas/Juros</th>
      <th>Desc.</th>
      <th>Bolsa</th>
      <th>Valor Pago</th>
      <th>Líquido</th>
    </tr>
  </thead>
  <tbody>
<?php 
$vl = 0;
$ac = 0;
$de = 0;
$bo = 0;
$pa = 0;
$li = 0;
foreach ($mensalidades as $mensalidade):  
  $vl += $mensalidade['Mensalidade']['valor'];
  $ac += $mensalidade['Mensalidade']['acrescimo']; 
  $de += $mensalidade['Mensalidade']['desconto']; 
  $bo += $mensalidade['Mensalidade']['bolsa']; 
  $pa += $mensalidade['Mensalidade']['pago']; 
  $li += $mensalidade['Mensalidade']['liquido']; 
?>
    <tr>
      <td><?php echo $mensalidade['Mensalidade']['id']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['vencimento']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['pagamento']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['valor']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['acrescimo']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['desconto']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['bolsa']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['pago']; ?></td>
      <td><?php echo $mensalidade['Mensalidade']['liquido']; ?></td>
    </tr>
<?php endforeach; ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo $vl; ?></td>
      <td><?php echo $ac; ?></td>
      <td><?php echo $de; ?></td>
      <td><?php echo $bo; ?></td>
      <td><?php echo $pa; ?></td>
      <td><?php echo $li; ?></td>
    </tr>
  </tbody>
</table>
</div>