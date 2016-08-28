<?php 
/*array(

	'Mensalidade' => array(
		'id' => '29384',
		'aluno_id' => '2158',
		'numero' => '2',
		'vencimento' => '24/05/2016',
		'valor' => '245,00',
		'desconto' => '5,00',
		'acrescimo' => '',
		'liquido' => '240,00',
		'pago' => '2,40',
		'pagamento' => '28/04/2016',
		'formapgto_id' => '11',
		'conta_id' => '1',
		'user_id' => '1',
		'documento' => '10'
	)
)*/
?>
<div style="float: left">
	<?php echo date('d/m/Y'); ?>
</div>
<div style="float: right">
	<h3><?php echo $mensalidade['Mensalidade']['documento']; ?></h3>
</div>
<div align="center">
	<h1>Recibo</h1>
</div>
<hr>
<b>Aluno:&nbsp;</b><?php echo $mensalidade['Mensalidade']['aluno_id'] . ' - ' . $mensalidade['Aluno']['nome']; ?>
<br>
<br>
<br>
<b>Recebemos a importância de </b><?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'],'BRL'); ?>
<br>
(<?php echo $mensalidade['Mensalidade']['extenso']; ?>)
<br>
<br>
Referente a pagamento número <?php echo $mensalidade['Mensalidade']['numero']; ?> 
do mês de <?php echo __($this->Time->i18nFormat(date('Y-m-d', strtotime(str_replace("/", "-", $mensalidade['Mensalidade']['vencimento']))), '%B de %Y')); ?>.
<br>
<br>
Valor:&nbsp;<?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'],'BRL'); ?>
<br>
Desconto:&nbsp;<?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'],'BRL'); ?>
<br>
Bolsa:
<br>
Multa/Juros:&nbsp;<?php echo $this->Number->currency($mensalidade['Mensalidade']['acrescimo'],'BRL'); ?>
<br>
Liquido:&nbsp;<?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'],'BRL'); ?>
<br>
Valor Pago:&nbsp;<?php echo $this->Number->currency($mensalidade['Mensalidade']['pago'],'BRL'); ?>
<br>
<br>
<br>
<?php
  $cidade = $mensalidade['Cidade']['nome'];
  $uf = $mensalidade['Estado']['sigla'];
  $data = $this->Time->i18nFormat(date('m/d/Y'), '%d/%m/%Y');
  $texto = $cidade . '/' . $uf . ', ' . $data . '.';
  echo $texto; 
?>
<div align="center">
<br>
<?php $assinatura = $mensalidade['User']['assinatura'];
	if ($assinatura != '') { ?>  
		<img src="data:image/jpeg;base64, <?php echo h($assinatura); ?>"> 
<?php } ?> &nbsp;
<br>
_____________
<br>
<?php echo $mensalidade['Pessoa']['razaosocial']; ?>
<br>
Tesouraria
<br>
</div>
<script>window.print();</script>