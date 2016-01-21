<?php echo $this->Form->create('Portal', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'comprovante', 'target' => '_blank')); ?>
  <?php echo $this->Form->hidden('id', array('value' => $mensalidades[0]['Mensalidade']['aluno_id'])); ?>
  <?php echo $this->Form->hidden('nome', array('value' => $mensalidades[0]['Aluno']['nome'])); ?>
  <?php echo $this->Form->hidden('curso', array('value' => $mensalidades[0]['Aluno']['curso_id'])); ?>
  <?php echo $this->Form->hidden('mensalidades', array('value' => 
      serialize($mensalidades))); ?>
  <div style="float: left; width: 30%;">
    <?php echo $this->Form->input('ano', array('options' => $anos, 'label' => array('text' => 'Ano:'))); ?>
  </div>
  <div style="float: right; width: 70%;"> &nbsp;
    <?php echo $this->Form->button('<i class="fa fa-print"></i>'.' '.__('Imprimir Comprovante de Pagamentos'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btncomprovante')); ?>
  </div>
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
      <td><?php echo $mensalidade['Mensalidade']['numero']; ?> &nbsp;</td>
      <td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?> &nbsp;</td>
      <td>
        <?php 
          $pagamento = $mensalidade['Mensalidade']['pagamento'];
          if (! is_null($pagamento))
             echo h($pagamento);
          else  {
             echo $this->Html->link('<i class="fa fa-print"></i>', array('action' => 'boleto', $mensalidade['Mensalidade']['id']), array('class' => 'btn btn-default btn-xs', 'escape' => false, 'title' => __('Imprimir Boleto'), 'data-toggle' => 'tooltip', 'target' => '_blank'));
           } 
        ?> 
      &nbsp;
      </td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['acrescimo'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['bolsa'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['pago'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'], 'BRL'); ?> &nbsp;</td>
    </tr>
<?php endforeach; ?>
    <tr>
      <td> &nbsp;</td>
      <td> &nbsp;</td>
      <td> &nbsp;</td>
      <td><?php echo $this->Number->currency($vl, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($ac, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($de, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($bo, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($pa, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($li, 'BRL'); ?> &nbsp;</td>
    </tr>
  </tbody>
</table>
</div>