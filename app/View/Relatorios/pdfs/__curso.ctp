<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Listagem de Cursos');

$relatorio_pdf->html .= 
   '<table cellspacing="0" cellpadding="1" border="0">
    <thead>
        <tr class="header">
            <th class="col-10 text-centered">Código</th>
            <th class="col-30">Nome</th>
            <th class="col-10">Turma</th>
            <th class="col-10">Carga</th>
            <th class="col-10">Vencimento</th>            
            <th class="col-15">Coordenador</th>
            <th class="col-15">Secretário</th>
        </tr>
        <tr>
            <td colspan="7" class="line"></td>
        </tr>
    </thead>';

$subheader1 = ''
   .$relatorio_pdf->HtmlTable_TH('')
   .$relatorio_pdf->HtmlTable_TH('Início')
   .$relatorio_pdf->HtmlTable_TH('Fim')
   .$relatorio_pdf->HtmlTable_TH('Valor')
   .$relatorio_pdf->HtmlTable_TH('Desconto')
   .$relatorio_pdf->HtmlTable_TH('Líquido')
   .$relatorio_pdf->HtmlTable_TH('');

//debug($curso); die;
for ($index = 0; $index < count($curso); $index++) {
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
}

$relatorio_pdf->html .= ''
   .$relatorio_pdf->HtmlTable_SUMMARY(count($curso), 'summary', 7)
   .'</table>';

//debug($relatorio_pdf->html);
echo $relatorio_pdf->Imprimir(); 