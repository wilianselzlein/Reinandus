<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Professores');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Código', 'col-10 text-centered')
  ->addColumn('Nome', 'col-20')
  ->addColumn('Endereço', 'col-20')
  ->addColumn('Cidade', 'col-10')
  ->addColumn('Fone', 'col-10')
  ->addColumn('Celular', 'col-10')
  ->addColumn('Titulação', 'col-10')
  ->addColumn('Formação', 'col-10')
  ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($professor); $index++) {
    $even_class = $index % 2 == 0 ? ' highlighted' : '';
   
   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($professor[$index]['p']['id'], 'col-10 text-centered')
      ->addColumn($professor[$index]['p']['nome'], 'col-20')
      ->addColumn($professor[$index]['p']['endereco']. ' ' . $professor[$index]['p']['numero'] . ' ' 
            . $professor[$index]['p']['bairro'], 'col-20')
      ->addColumn($professor[$index]['c']['cidade_nome'], 'col-10')
      ->addColumn($professor[$index]['p']['fone'], 'col-10')         
      ->addColumn($professor[$index]['p']['celular'], 'col-10')  
      ->addColumn($professor[$index]['e']['valor'], 'col-10')
      ->addColumn($professor[$index]['p']['formacao'], 'col-10')
      ->close();
    $table->addRow($rowData);
}
$table->addCount(count($professor));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();