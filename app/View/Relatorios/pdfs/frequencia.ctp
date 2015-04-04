<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
//App::import('Vendor', 'tcpdf_include');

$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
/*
 *  $relatorio->SetCreator(PDF_CREATOR);
 *  $relatorio->SetAuthor('Pedro Escobar');
 *  $relatorio->SetSubject('TCPDF Tutorial');
 *  $relatorio->SetKeywords('TCPDF, PDF, example, test, guide');
 */

$relatorio_pdf->SetTitulo('Relatório de Frequência');

// set header and footer fonts
$relatorio_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 13));

// set margins
$relatorio_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$relatorio_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$relatorio_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$relatorio_pdf->setTitulo($relatorio_pdf->getTitulo());
// set auto page breaks
$relatorio_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$relatorio_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// add a page (required with recent versions of tcpdf) 
$relatorio_pdf->AddPage(); 

$relatorio_pdf->writeHTML('<h1>'.$relatorio_pdf->getTitulo().'</h1>', true, false, true, false, 'C');

$relatorio_pdf->SetFont('helvetica', '', 11);

$curso = $frequencia[0]['curso']['curso'];

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
        <table cellspacing="0" cellpadding="1" border="0">
            <tr>
                <td width="15%">Curso:</td>
                <td colspan="3">&nbsp; $curso</td>
            </tr>
            <tr>
                <td width="15%">Professor:</td>
                <td width="65%">&nbsp;</td>
                <td width="10%">Turno:</td>
                <td width="10%">&nbsp;</td>
            </tr>
            <tr>
                <td width="15%">Disciplina:</td>
                <td>&nbsp;</td>
                <td width="10%">Horário:</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
		<table cellspacing="0" cellpadding="1" border="1">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header" colspan="2" width="50%">Aluno</th>
                            <th class="table-header" width="10%">Curso</th>
                            <th class="table-header" width="10%">Turma</th>        
                            <th class="table-header" width="30%">Assinatura</th>        
	    		</tr>
	        </thead>
EOD;
  
//debug($frequencia); die;
for ($index = 0; $index < count($frequencia); $index++) {
    $html .= '<tr>'
            .   '<td width="10%">'.$frequencia[$index]['aluno']['id'].'</td>'
            .   '<td width="40%">'.$frequencia[$index]['aluno']['aluno'].'</td>'
            .   '<td width="10%">'.$frequencia[$index]['curso']['sigla'].'</td>'
            .   '<td width="10%">'.$frequencia[$index]['curso']['turma'].'</td>'            
            .   '<td width="30%">&nbsp;</td>'
            . '</tr>';
    
}
for ($index = 0; $index < 4; $index++) {
    $html .= '<tr>'
            .   '<td width="10%">&nbsp;</td>'
            .   '<td width="40%">&nbsp;</td>'
            .   '<td width="10%">&nbsp;</td>'
            .   '<td width="10%">&nbsp;</td>'
            .   '<td width="30%">&nbsp;</td>'
            . '</tr>';
    
}
$total_periodo= count($frequencia);

$html .= '<tr>'
        .   '<td colspan="3" class="totais-label" width="20%">Total de alunos:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>';

$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 