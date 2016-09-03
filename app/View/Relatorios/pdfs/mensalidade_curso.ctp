<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor', 'tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Mensalidade/Curso');
$html = $relatorio_pdf->html;

$table = new Table();
$rowHeader = new Row('header');
   $rowHeader
      ->addColumn('Curso', 'col-25')
      ->addColumn('Vcto', 'col-5')
      ->addColumn('Valor', 'col-10')
      ->addColumn('Pago', 'col-10')
      ->addColumn('Acrés.', 'col-10')
      ->addColumn('Desc.', 'col-10')         
      ->addColumn('Bolsa', 'col-10')  
      ->addColumn('Pagtos', 'col-10')
      ->addColumn('Total', 'col-10')
      ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($mensalidade); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($mensalidade[$index]['curso']['nome'], 'col-25 ')
      ->addColumn($mensalidade[$index]['curso']['vencimento'], 'col-5')
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['valor'], 'BRL'),'col-10 currency')
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['valor_pago'], 'BRL'), 'col-10 currency')
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['acrescimo'], 'BRL'), 'col-10 currency')         
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['desconto'], 'BRL'), 'col-10 currency') 
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['bolsa'], 'BRL'), 'col-10 currency') 
      ->addColumn($this->Number->currency($mensalidade[$index]['0']['total'], 'BRL'), 'col-10 currency')
      ->addColumn($mensalidade[$index]['0']['quant'], 'col-10 currency')
      ->close();
   
   $table->addRow($rowData);
}

$valor = array_sum($table->array_column($table->array_column($mensalidade, 0), 'valor'));
$pago  = array_sum($table->array_column($table->array_column($mensalidade, 0), 'valor_pago'));
$acres = array_sum($table->array_column($table->array_column($mensalidade, 0), 'acrescimo'));
$desco = array_sum($table->array_column($table->array_column($mensalidade, 0), 'desconto'));
$bolsa = array_sum($table->array_column($table->array_column($mensalidade, 0), 'bolsa'));
$total = array_sum($table->array_column($table->array_column($mensalidade, 0), 'total'));
$quant = array_sum($table->array_column($table->array_column($mensalidade, 0), 'quant'));

$rowData = new Row('summary');
$rowData
  ->addColumn('Total:', 'col-25')
  ->addColumn('', 'col-5')
  ->addColumn($this->Number->currency($valor, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($pago,  'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($acres, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($desco, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($bolsa, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($total, 'BRL'), 'currency col-10')
  ->addColumn($quant, 'currency col-10')
  ->close();
$table->addRow($rowData);

$table->addCount(count($mensalidade));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();