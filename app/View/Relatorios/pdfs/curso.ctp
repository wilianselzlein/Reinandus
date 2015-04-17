<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Listagem de Cursos');

// column titles
$header = array('Código', 'Nome', 'Turma', 'Carga', 'Vencimento', 'Coordenador', 'Secretário');
$subheader = array('', 'Início', 'Fim', 'Valor', 'Desconto', 'Líquido', '');



// Colors, line width and bold font
$relatorio_pdf->SetFillColor(225, 225, 225);
$relatorio_pdf->SetTextColor(0);
//$relatorio_pdf->SetDrawColor(128, 0, 0);
$relatorio_pdf->SetLineWidth(0.1);
$relatorio_pdf->SetFont('', 'B');
$relatorio_pdf->SetRightMargin(20);
// Header
$w = array(20, 60, 30, 30, 30, 50, 50);
$num_headers = count($header);
for($i = 0; $i < $num_headers; ++$i) {
   $relatorio_pdf->Print_HeaderCell($w[$i], $header[$i]);
}
$relatorio_pdf->Ln();
//debug(); die;

// Color and font restoration
$relatorio_pdf->SetFillColor(224, 235, 255);
$relatorio_pdf->SetTextColor(0);
$relatorio_pdf->SetFont('');
// Data
$fill = 0;

for ($index = 0; $index < count($curso); $index++) {
   $relatorio_pdf->SetFont('Helvetica');
   $relatorio_pdf->Print_Cell($w[0], $curso[$index]['curso']['codigo'], 'LT', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[1], $curso[$index]['curso']['nome'], 'T', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[2], $curso[$index]['curso']['turma'], 'T', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[3], $curso[$index]['curso']['carga'], 'T', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[4], $curso[$index]['curso']['vencimento'], 'T', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[5], $curso[$index]['professor']['coordenador'], 'T', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[6], $curso[$index]['pessoa']['secretario'], 'RT', 'C', $fill);  
   $relatorio_pdf->Ln();
   $relatorio_pdf->SetFont('Times','BI', 11);
   $relatorio_pdf->Print_Cell($w[0], 'Início', 'L', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[1], 'Fim', '', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[2], 'Valor', '', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[3], 'Desconto', '', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[4], 'Líquido', '', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[5], '', '', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[6], '', 'R', 'C', $fill);  
   $relatorio_pdf->Ln();   
   $relatorio_pdf->SetFont('Courier', '', 10);
   $relatorio_pdf->Print_Cell($w[0], $this->Time->i18nFormat($curso[$index]['curso']['inicio'], $this->Html->__getDatePatternView()), 'LB', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[1], $this->Time->i18nFormat($curso[$index]['curso']['fim'], $this->Html->__getDatePatternView()), 'B', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[2], $this->Number->currency($curso[$index]['curso']['valor'], 'BRL'), 'B', 'R', $fill);
   $relatorio_pdf->Print_Cell($w[3], $this->Number->toPercentage($curso[$index]['curso']['desconto']), 'B', 'R', $fill);
   $relatorio_pdf->Print_Cell($w[4], $this->Number->currency($curso[$index]['curso']['liquido'], 'BRL'), 'B', 'R', $fill);
   $relatorio_pdf->Print_Cell($w[5], '', 'B', 'C', $fill);
   $relatorio_pdf->Print_Cell($w[6], '', 'RB', 'C', $fill);  
   $relatorio_pdf->Ln();   
   $fill=!$fill;
}
/*
foreach($data as $row) {
   $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
   $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
   $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
   $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
   $this->Ln();
   $fill=!$fill;
}


$this->Cell(array_sum($w), 0, '', 'T');

for ($index = 0; $index < count($curso); $index++) {
   /*
   $even_class = $index % 2 == 0 ? ' highlighted' : '';
   //TimeHelper::i18nFormat($date, $format = NULL, $invalid = false, $timezone = NULL)¶   
   $mainRow = 
      $relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['codigo'], 'col-10 text-centered')
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['nome'], 'col-30')
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['turma'], 'col-10')
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['carga'], 'col-10')
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['vencimento'], 'col-10')         
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['professor']['coordenador'], 'col-15')  
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['pessoa']['secretario'], 'col-15');    

   $childRow = ''
      .$relatorio_pdf->HtmlTable_TD('')
      //$curso[$index]['curso']['inicio']      
      .$relatorio_pdf->HtmlTable_TD($this->Time->i18nFormat($curso[$index]['curso']['inicio'], $this->Html->__getDatePatternView()), 'date')
      .$relatorio_pdf->HtmlTable_TD($this->Time->i18nFormat($curso[$index]['curso']['fim'], $this->Html->__getDatePatternView()), 'date')
      .$relatorio_pdf->HtmlTable_TD($this->Number->currency($curso[$index]['curso']['valor'], 'BRL'), 'currency')
      .$relatorio_pdf->HtmlTable_TD($this->Number->toPercentage($curso[$index]['curso']['desconto']), 'percentage')
      .$relatorio_pdf->HtmlTable_TD($this->Number->currency($curso[$index]['curso']['liquido'], 'BRL'), 'currency')
      .$relatorio_pdf->HtmlTable_TD('');

   $relatorio_pdf->html .= ''
      .$relatorio_pdf->HtmlTable_TR($mainRow, ''.$even_class)
      .$relatorio_pdf->HtmlTable_TR($subheader1, 'subheader1'.$even_class)
      .$relatorio_pdf->HtmlTable_TR($childRow, 'child last'.$even_class);
      *

}
*/

//$relatorio_pdf->html .= ''
//   .$relatorio_pdf->HtmlTable_SUMMARY(count($curso), 'summary', 7)
//   .'</table>';

//debug($relatorio_pdf->html);
echo $relatorio_pdf->Imprimir(); 