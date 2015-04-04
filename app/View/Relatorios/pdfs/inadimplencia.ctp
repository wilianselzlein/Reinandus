inadimplencia<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
//App::import('Vendor', 'tcpdf_include');

$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
/*
 *  $relatorio->SetCreator(PDF_CREATOR);
 *  $relatorio->SetAuthor('Pedro Escobar');
 *  $relatorio->SetTitle('TCPDF Example 048');
 *  $relatorio->SetSubject('TCPDF Tutorial');
 *  $relatorio->SetKeywords('TCPDF, PDF, example, test, guide');
 */

// set header and footer fonts
$relatorio_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 13));

// set margins
$relatorio_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$relatorio_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$relatorio_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$relatorio_pdf->setTitulo('Inadimplência por Aluno');
// set auto page breaks
$relatorio_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$relatorio_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// add a page (required with recent versions of tcpdf) 
$relatorio_pdf->AddPage(); 

$relatorio_pdf->writeHTML('<h1>'.$relatorio_pdf->getTitulo().'</h1>', true, false, true, false, 'C');

$relatorio_pdf->SetFont('helvetica', '', 11);

$html = <<<EOD
        <style>
        .titulo
        {
            font-size: 30;
            background-color: red;
        }
        .table-header
        {
            font-weight:bold;
            text-align:left;            
        }
        .group-band
        {
            text-align: left;
            font-weight:bold;
        }
        .totais-label
        {
            text-align: left;
            font-weight:bold;
        }
        .line
        {
            border-top-width: 1;
        }
        </style>        
        <br>
        <br>
		<table cellspacing="0" cellpadding="1" border="0">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header">Aluno</th>
                            <th class="table-header">Curso</th>
                            <th class="table-header">Telefone</th>
                            <th class="table-header">Valor</th>
                            <th class="table-header">Acréscimo</th>
                            <th class="table-header">Deconto</th>
                            <th class="table-header">Bolsa</th>
                            <th class="table-header">Líquido</th>
	    		</tr>
                        <tr>
                            <td colspan="8" class="line"></td>
                        </tr>
	        </thead>
EOD;
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

    $html .= '<tr>'
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

$html .= 
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
        . '</tr>';

$total_periodo= count($inadimplencia);

$html .= 
        '<tr>'
        .'  <td colspan="8" class="line"></td>'
        .'</tr>'
		.'<tr><td colspan="8"></td></tr>'
        .'<tr>'
        .'<td colspan="8"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="4" class="totais-label">Total de alunos listados</td>'
        .   '<td colspan="4" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>';

$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 