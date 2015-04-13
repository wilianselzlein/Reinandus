<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Listagem de Cursos');

$relatorio_pdf->html .= 
   '<table cellspacing="0" cellpadding="1" border="0">
    <thead>
        <tr class="header">
            <th>Código</th>
            <th>Nome</th>
            <th>Turma</th>
            <th>Carga</th>
            <th>Vencimento</th>            
            <th>Coordenador</th>
            <th>Secretário</th>
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

   $mainRow = 
      $relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['codigo'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['nome'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['turma'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['carga'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['vencimento'])         
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['professor']['coordenador'])  
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['pessoa']['secretario']);    

   $childRow = ''
      .$relatorio_pdf->HtmlTable_TD('')
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['inicio'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['fim'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['valor'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['desconto'])
      .$relatorio_pdf->HtmlTable_TD($curso[$index]['curso']['liquido'])
      .$relatorio_pdf->HtmlTable_TD('');

   $relatorio_pdf->html .= ''
      .$relatorio_pdf->HtmlTable_TR($mainRow, ''.$even_class)
      .$relatorio_pdf->HtmlTable_TR($subheader1, 'subheader1'.$even_class)
      .$relatorio_pdf->HtmlTable_TR($childRow, 'child last'.$even_class);
}


$total_periodo= count($curso);

$relatorio_pdf->html .= ''
   .'<tr>
     <td colspan="7"></td></tr>'
   .'<tr>'
   .'<td colspan="7"></td>'
   .'</tr>'
   .'<tr>'
   .   '<td colspan="2" class="totais-label">Total de alunos listados:</td>'
   .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
   .'</tr>'
   .'</table>';

//debug($relatorio_pdf->html);
echo $relatorio_pdf->Imprimir(); 