<html>
<head>
<title>Pós-Graduação</title>
<style type="text/css">
<!--
.style1 {font-size: 18px}
.style2 {font-size: 14px}
-->
</style>
</head>

<body>
<table border="0" width="100%">
  	<tbody>
  		<tr>
		    <td width="16%"><img src="facet.jpg" alt="" height="51" width="147"></td>
		    <td width="84%"><?php echo $dados['Instituicao']['Empresa']['razaosocial']; ?><br>
		      CURSO DE PÓS-GRADUAÇÃO- Reconhecido pela Portaria M.E.C. nº. 1801- D.O.U. 14/07/2003<br>
		    Mantida pela Sociedade Educacional de Ciências e Tecnologia</td>
  		</tr>
	</tbody>
</table>

<hr>
<p class="style1" align="center">C O M P R O V A N T E&nbsp;&nbsp;&nbsp;&nbsp;D E&nbsp;&nbsp;&nbsp;&nbsp;P A G A M E N T O</p>
<p class="style2" align="center">SEGUNDA VIA</p>
<p class="style2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A <?php echo $dados['Instituto']['Empresa']['razaosocial']; ?>, 
<?php echo $dados['Instituto']['Empresa']['cnpjcpf']; ?>, que administra o curso de Pós-Graduação da <?php echo $dados['Instituicao']['Empresa']['razaosocial']; ?>
, representada por seu diretor <?php echo $dados['Instituto']['Diretor']['razaosocial']; ?>, declara para os devidos fins e a quem interessar possa que <?php echo $dados['Portal']['nome']; ?> 
pagou o valor de R$ <?php echo array_sum(array_column(array_column($mensalidades, 'Mensalidade'), 'valor')); ?>,00 referente o curso de pós-graduação em <?php echo $dados['Curso']['nome']; ?>.
</p>

<p class="style2" align="justify"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Abaixo apresenta-se o demonstrativo analítico dos pagamentos:</p>

<table width="100%" border="0">
  <tr>
    <td><strong>Data</strong></td>
    <td><strong>Valor Integral </strong></td>
    <td><strong>Desconto</strong></td>
    <td><strong>Valor L&iacute;quido </strong></td>
  </tr>

<?php 
$vl = 0;
$de = 0;
$li = 0;
foreach ($mensalidades as $mensalidade):  
  $vl += $mensalidade['Mensalidade']['valor'];
  $de += $mensalidade['Mensalidade']['desconto']; 
  $li += $mensalidade['Mensalidade']['liquido']; 
?>
    <tr>
      <td><?php echo h($mensalidade['Mensalidade']['vencimento']); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['valor'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['desconto'], 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($mensalidade['Mensalidade']['liquido'], 'BRL'); ?> &nbsp;</td>
    </tr>
<?php endforeach; ?>
    <tr>
      <td> &nbsp;</td>
      <td><?php echo $this->Number->currency($vl, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($de, 'BRL'); ?> &nbsp;</td>
      <td><?php echo $this->Number->currency($li, 'BRL'); ?> &nbsp;</td>
    </tr>

</table>

<p class="style2" align="justify"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E por ser verdade firmamos a presente.</p>

<p class="style2" align="center">
<?php echo $dados['Instituto']['Cidade']['Cidade']['nome']; ?>&nbsp;-&nbsp;
<?php echo $dados['Instituto']['Cidade']['Estado']['sigla']; ?>,&nbsp;
<script language="JavaScript">
    hoje = new Date()
    dia = hoje.getDate()
    dias = hoje.getDay()
    mes = hoje.getMonth()
    ano = hoje.getYear()
    if (dia < 10)
            dia = "0" + dia
    if (ano < 2000)
            ano = "20" + (ano - 100)
    function CriaArray (n) {
    this.length = n }
    NomeDia = new CriaArray(7)
    NomeDia[0] = "Domingo"
    NomeDia[1] = "Segunda-feira"
    NomeDia[2] = "Terça-feira"
    NomeDia[3] = "Quarta-feira"
    NomeDia[4] = "Quinta-feira"
    NomeDia[5] = "Sexta-feira"
    NomeDia[6] = "Sábado"

    NomeMes = new CriaArray(12)
    NomeMes[0] = "Janeiro"
    NomeMes[1] = "Fevereiro"
    NomeMes[2] = "Março"
    NomeMes[3] = "Abril"
    NomeMes[4] = "Maio"
    NomeMes[5] = "Junho"
    NomeMes[6] = "Julho"
    NomeMes[7] = "Agosto"
    NomeMes[8] = "Setembro"
    NomeMes[9] = "Outubro"
    NomeMes[10] = "Novembro"
    NomeMes[11] = "Dezembro"

    document.write ("" + dia + " de " + NomeMes[mes] + " de " + ano + " ")
</script>
</p>
<p align="center">
 <?php if ($dados['User']['assinatura'] != '') { ?> 
    <img src="data:image/jpeg;base64,
       <?php echo h($dados['User']['assinatura']); ?>" 
 <?php } ?> &nbsp;

</p>
<p class="style2" align="center"><strong><?php echo $dados['Pessoa']['razaosocial']; ?><br>
Departamento de Pós-Graduação</strong></p>
<br><br>
<br><br>
<br><br>
<br><br>
<p class="style2" align="left">
 <?php echo $dados['Instituto']['Empresa']['razaosocial']; ?><br>
 <?php echo $dados['Instituto']['Empresa']['endereco']; ?>&nbsp;
 <?php echo $dados['Instituto']['Empresa']['numero']; ?>&nbsp;
 <?php echo $dados['Instituto']['Empresa']['bairro']; ?><br>
 <?php echo $dados['Instituto']['Cidade']['Cidade']['nome']; ?>&nbsp;
 <?php echo $dados['Instituto']['Cidade']['Estado']['sigla']; ?>&nbsp;
 <?php echo $dados['Instituto']['Empresa']['fone']; ?>&nbsp;
 <?php echo $dados['Instituto']['Empresa']['email']; ?>&nbsp;
 <?php echo $dados['Instituto']['Empresa']['site']; ?>
 </p>
</body></html>