<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório Sintético de Mensalidade em Aberto');
$html = $relatorio_pdf->html;
//debug($mensalidade);
$table = new Table();
$rowHeader = new Row('header');
$rowHeader
   ->addColumn('Aluno', 'col-25 text-centered')
   ->addColumn('Celular', 'col-10')
   ->addColumn('E-mail', 'col-20')
   ->addColumn('Curso', 'col-25')         
   ->addColumn('Vcto', 'col-10')  
   ->addColumn('Total', 'col-10')
   ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($mensalidade); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($mensalidade[$index]['aluno']['nome'], 'col-25 text-centered')
      ->addColumn($mensalidade[$index]['aluno']['celular'], 'col-10')
      ->addColumn($mensalidade[$index]['aluno']['email'], 'col-20')
      ->addColumn($mensalidade[$index]['curso']['nome'], 'col-25')
      ->addColumn($this->Time->i18nFormat($mensalidade[$index]['mensalidade']['vencimento'], $this->Html->__getDatePatternView()), 'col-10 date')         
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['total'], 'BRL'), 'col-10 currency')  
      ->close();

   $table->addRow($rowData);
}

$table->addCount(count($mensalidade));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();