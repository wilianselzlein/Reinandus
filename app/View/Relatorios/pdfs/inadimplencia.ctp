<?php
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Inadimplência por Aluno');

$relatorio_pdf->html .= 
	'<table cellspacing="0" cellpadding="1" border="0">
	<thead>
		<tr class="teste">
			<th class="table-header">Aluno</th>
			<th class="table-header">Curso</th>
			<th class="table-header">Telefone</th>
			<th class="table-header">Valor</th>
			<th class="table-header">Acréscimo</th>
			<th class="table-header">Desconto</th>
			<th class="table-header">Bolsa</th>
			<th class="table-header">Líquido</th>
		</tr>
		<tr>
			<td colspan="8" class="line"></td>
		</tr>
	</thead>';

$valor = 0;
$acres = 0;
$desco = 0;
$bolsa = 0;
$liqui = 0;

//debug($inadimplencia); die;
for ($index = 0; $index < count($inadimplencia); $index++) {
	$valor += $inadimplencia[$index]['0']['valor'];
	$acres += $inadimplencia[$index]['0']['acrescimo'];
	$desco += $inadimplencia[$index]['0']['desconto'];
	$bolsa += $inadimplencia[$index]['0']['bolsa'];
	$liqui += $inadimplencia[$index]['0']['liquido'];

$relatorio_pdf->html .= 
	'<tr>'
	.   '<td>'.$inadimplencia[$index]['aluno']['aluno'].'</td>'
	.   '<td>'.$inadimplencia[$index]['curso']['curso'].'</td>'
	.   '<td>'.$inadimplencia[$index]['aluno']['celular'].'<br>'.$inadimplencia[$index]['aluno']['residencial'].'</td>'
	.   '<td>'.$inadimplencia[$index]['0']['valor'].'</td>'
	.   '<td>'.$inadimplencia[$index]['0']['acrescimo'].'</td>'
	.   '<td>'.$inadimplencia[$index]['0']['desconto'].'</td>'
	.   '<td>'.$inadimplencia[$index]['0']['bolsa'].'</td>'
	.   '<td>'.$inadimplencia[$index]['0']['liquido'].'</td>'
	. '</tr>';
}

$total_periodo= count($inadimplencia);

$relatorio_pdf->html .= 
	'<tr>'
	.'  <td colspan="8" class="line"></td>'
	.'</tr>'
	.'<tr>'
	.   '<td colspan="3">Total:</td>'
	.   '<td>'.$valor.'</td>'
	.   '<td>'.$acres.'</td>'
	.   '<td>'.$desco.'</td>'
	.   '<td>'.$bolsa.'</td>'
	.   '<td>'.$liqui.'</td>'
	. '</tr>'
	.'<tr>'
	.'  <td colspan="8" class="line"></td>'
	.'</tr>'
	.'<tr><td colspan="8"></td></tr>'
	.'<tr>'
	.'<td colspan="8"></td>'
	.'</tr>'
	.'<tr>'
	.   '<td colspan="4" class="totais-label">Total de alunos listados</td>'
	.   '<td colspan="4" class="totais-label">'.$total_periodo.'</td>'
	.'</tr>'
	.'</table>';

echo $relatorio_pdf->Imprimir();
