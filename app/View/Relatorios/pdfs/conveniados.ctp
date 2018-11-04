<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Conveniados');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Código', 'col-10 text-centered')
  ->addColumn('Nome', 'col-20')
  ->addColumn('', 'col-20')
  ->addColumn('', 'col-15')
  ->addColumn('Telefone', 'col-15')
  ->addColumn('E-mail', 'col-20')
  ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($conveniados); $index++) {
    $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($conveniados[$index]['pessoa']['id'], 'col-10 text-centered')
      ->addColumn($conveniados[$index]['pessoa']['razaosocial'], 'col-20')
      ->addColumn($conveniados[$index]['pessoa']['fantasia'], 'col-20')
      ->addColumn($conveniados[$index]['pessoa']['empresa'], 'col-15')         
      ->addColumn($conveniados[$index]['pessoa']['fone'], 'col-15')  
      ->addColumn($conveniados[$index]['pessoa']['email'], 'col-20')
      ->close();
    $table->addRow($rowData);
}
$table->addCount(count($conveniados));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();