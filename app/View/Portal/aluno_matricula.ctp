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
<p class="style1" align="center">D E C L A R A Ç Ã O&nbsp;&nbsp;&nbsp;&nbsp;D E&nbsp;&nbsp;&nbsp;&nbsp;M A T R Í C U L A </p>
<p class="style2" align="center">IMPRESSA VIA SITE.</p>
<p class="style2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaramos para os devidos fins que <?php echo $dados['Portal']['nome']; ?> é
    aluno(a) matriculado(a) no Curso de Pós-Graduação em <?php echo $dados['Curso']['nome']; ?>
    nesta instituição de ensino, com início em <?php echo h(date('d/m/Y', strtotime($dados['Portal']['curso_inicio']))); ?> e previsão de térmio até <?php echo h(date('d/m/Y', strtotime($dados['Portal']['curso_fim']))); ?>.
    Atualmente a situação do aluno(a) encontra-se como <?php echo $dados['Enumerado']['valor']; ?>.
</p>

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