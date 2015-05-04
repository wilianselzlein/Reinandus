<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Mensalidade/Curso');
$html = $relatorio_pdf->html;
//debug($mensalidade);
$table = new Table();
$rowHeader = new Row('header');
   $rowHeader
      ->addColumn('Curso', 'col-25 text-centered')
      ->addColumn('Vcto', 'col-15')
      ->addColumn('(R$)Valor', 'col-10')
      ->addColumn('(R$)Pago', 'col-10')
      ->addColumn('(%)Acrés.', 'col-10')
      ->addColumn('(%)Desc.', 'col-10')         
      ->addColumn('(%)Bolsa', 'col-10')  
      ->addColumn('(R$)Total', 'col-10')
      ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($mensalidade); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($mensalidade[$index]['curso']['nome'], 'col-25 ')
      ->addColumn($this->Time->i18nFormat($mensalidade[$index]['mensalidade']['vencimento'], $this->Html->__getDatePatternView()), 'col-15 date')
      ->addColumn($mensalidade[$index]['mensalidade']['valor'],'col-10 ')
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['valor_pago'], 'BRL'), 'col-10 currency')
      ->addColumn($this->Number->toPercentage($mensalidade[$index]['mensalidade']['acrescimo']), 'col-10 percentage')         
      ->addColumn($this->Number->toPercentage($mensalidade[$index]['mensalidade']['desconto']), 'col-10 percentage') 
      ->addColumn($this->Number->toPercentage($mensalidade[$index]['mensalidade']['bolsa']), 'col-10 percentage') 
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['total'], 'BRL'), 'col-10 currency')
      ->close();
   
   $table->addRow($rowData);
}

$table->addCount(count($mensalidade));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();