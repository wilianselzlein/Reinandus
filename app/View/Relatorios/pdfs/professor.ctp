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
$relatorio_pdf->setTitulo('');
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
                            <th class="table-header">Id</th>
                            <th class="table-header">Nome</th>
                            <th class="table-header">Endereço</th>
                            <th class="table-header">Cidade</th>
                            <th class="table-header">Telefone</th>
                            <th class="table-header">Celular</th>
                            <th class="table-header">Titulação</th>
                            <th class="table-header">Formação</th>
	    		</tr>
                        <tr>
                            <td colspan="8" class="line"></td>
                        </tr>
	        </thead>
EOD;
  
for ($index = 0; $index < count($professor); $index++) {
    $html .= '<tr>'
            .   '<td>'.$professor[$index]['p']['id'].'</td>'
            .   '<td>'.$professor[$index]['p']['nome'].'</td>'
            .   '<td>'.$professor[$index]['p']['endereco']. ' ' . $professor[$index]['p']['numero'] . ' ' 
            . $professor[$index]['p']['bairro']. '</td>'
            .   '<td>'.$professor[$index]['c']['cidade_nome'].'</td>'            
            .   '<td>'.$professor[$index]['p']['fone'].'</td>'
            .   '<td>'.$professor[$index]['p']['celular'].'</td>'
            .   '<td>'.$professor[$index]['p']['resumotitulacao'].'</td>'
            .   '<td>'.$professor[$index]['p']['formacao'].'</td>'
            . '</tr>';
}

$total= count($professor);

$html .= '<tr><td colspan="1"></td></tr>'
        .'<tr>'
        .'<td colspan="1"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="3" class="totais-label">Total de professor(es) listado(s):</td>'
        .   '<td colspan="2" class="totais-label">'.$total.'</td>'
        .'</tr>'
        ;
$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 