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
$relatorio_pdf->setTitulo('Alunos por Curso e Ano');
// set auto page breaks
$relatorio_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$relatorio_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// add a page (required with recent versions of tcpdf) 
$relatorio_pdf->AddPage(); 

$relatorio_pdf->writeHTML('<h1>'.$relatorio_pdf->getTitulo().'</h1>', true, false, true, false, 'C');

$relatorio_pdf->SetFont('helvetica', '', 11);
$ano1 = $aluno_ano[0]['0']['maximo'];
$ano2 = $ano1 - 1;
$ano3 = $ano1 - 2;
$ano4 = $ano1 - 3;

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
                            <th class="table-header">Sigla</th>
                            <th class="table-header">$ano1</th>
                            <th class="table-header">$ano2</th>
                            <th class="table-header">$ano3</th>
                            <th class="table-header">$ano4</th>
                            <th class="table-header">Total</th>
	    		</tr>
                        <tr>
                            <td colspan="6" class="line"></td>
                        </tr>
	        </thead>
EOD;
$ano1 = 0;
$ano2 = 0;
$ano3 = 0;
$ano4 = 0;

//debug($aluno_ano); die;
for ($index = 0; $index < count($aluno_ano); $index++) {
	$ano1 += $aluno_ano[$index]['0']['ano1'];
	$ano2 += $aluno_ano[$index]['0']['ano2'];
	$ano3 += $aluno_ano[$index]['0']['ano3'];
	$ano4 += $aluno_ano[$index]['0']['ano4'];

	$somalinha = 
	  $aluno_ano[$index]['0']['ano1'] +
	  $aluno_ano[$index]['0']['ano2'] +
	  $aluno_ano[$index]['0']['ano3'] +
	  $aluno_ano[$index]['0']['ano4'];

    $html .= '<tr>'
            .   '<td>'.$aluno_ano[$index]['c']['sigla'].'</td>'
            .   '<td>'.$aluno_ano[$index]['0']['ano1'].'</td>'
            .   '<td>'.$aluno_ano[$index]['0']['ano2'].'</td>'
            .   '<td>'.$aluno_ano[$index]['0']['ano3'].'</td>'            
            .   '<td>'.$aluno_ano[$index]['0']['ano4'].'</td>'
            .   '<td>'.$somalinha.'</td>'
            . '</tr>';
    
}

$html .= 
        '<tr>'
        .'  <td colspan="6" class="line"></td>'
        .'</tr>'
		.'<tr>'
        .   '<td>Total:</td>'
        .   '<td>'.$ano1.'</td>'
        .   '<td>'.$ano2.'</td>'
        .   '<td>'.$ano3.'</td>'
        .   '<td>'.$ano4.'</td>'
        .   '<td>'. ($ano1 + $ano2 + $ano3 + $ano4) .'</td>'
        . '</tr>';

$total_periodo= count($aluno_ano);

$html .= 
        '<tr>'
        .'  <td colspan="6" class="line"></td>'
        .'</tr>'
		.'<tr><td colspan="5"></td></tr>'
        .'<tr>'
        .'<td colspan="5"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">Total de cursos listados:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        ;
$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 