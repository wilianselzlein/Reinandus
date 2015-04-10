<?php

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
$relatorio_pdf->setTitulo('Razão');
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
                            <th class="table-header">Conta</th>
							<th class="table-header">Analítico</th>
                            <th class="table-header">Data</th>
                            <th class="table-header">Histórico</th>
                            <th class="table-header">CP</th>
                            <th class="table-header">Documento</th>
                            <th class="table-header">Débito</th>
                            <th class="table-header">Crédito</th>
	    		</tr>
                        <tr>
                            <td colspan="8" class="line"></td>
                        </tr>
	        </thead>
EOD;
$deb = 0;
$cre = 0;

//debug($razao); die;
for ($index = 0; $index < count($razao); $index++) {
	$deb += $razao[$index]['razao']['debito'];
	$cre += $razao[$index]['razao']['credito'];
	
    $html .= '<tr>'
            .   '<td>'.$razao[$index]['razao']['descricao'].'</td>'
            .   '<td>'.$razao[$index]['razao']['analitico'].'</td>'
            .   '<td>'.$razao[$index]['razao']['data'].'</td>'
            .   '<td>'.$razao[$index]['razao']['nome'].'</td>'
            .   '<td>'.$razao[$index]['razao']['contrapartida'].'</td>'
            .   '<td>'.$razao[$index]['razao']['documento'].'</td>'
            .   '<td>'.$razao[$index]['razao']['debito'].'</td>'
            .   '<td>'.$razao[$index]['razao']['credito'].'</td>'
            . '</tr>';
    
}

$html .= 
        '<tr>'
        .'  <td colspan="8" class="line"></td>'
        .'</tr>'
		.'<tr>'
        .   '<td colspan="6">Total:</td>'
        .   '<td>'.$deb.'</td>'
        .   '<td>'.$cre	.'</td>'
        . '</tr>';

$total_periodo= count($razao);

$html .= 
        '<tr>'
        .'  <td colspan="8" class="line"></td>'
        .'</tr>'
		.'<tr><td colspan="8"></td></tr>'
        .'<tr>'
        .'<td colspan="8"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="4" class="totais-label">Total de lançamentos listados</td>'
        .   '<td colspan="4" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>';

$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 