<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor', 'tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Previsão de Pagamentos');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();
$rowHeader = new Row('header');
   $rowHeader
      ->addColumn('Mês', 'col-10')
      ->addColumn('Sigla', 'col-5')
      ->addColumn('Curso', 'col-60')
      ->addColumn('Liquido', 'col-25')
      ->close();
$table->addRow($rowHeader);

$anomes = '';
$total = 0;

for ($index = 0; $index < count($previsao); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $linha = $previsao[$index]['0']['ano'] . '/' . $previsao[$index]['0']['mes'];
   
    if (($linha <> $anomes)) {

        if ($index > 0) {
            $rowData = new Row('summary');
            $rowData
              ->addColumn('Subtotal:', 'col-75')
              ->addColumn($this->Number->currency($total, 'BRL'), 'currency col-25')
              ->close();
            $table->addRow($rowData);
            $total = 0;
        }
    }
   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($linha, 'col-10')
      ->addColumn($previsao[$index]['curso']['sigla'], 'col-5')
      ->addColumn($previsao[$index]['curso']['curso_nome'], 'col-60')
      ->addColumn($this->Number->currency($previsao[$index]['0']['liquido'], 'BRL'), 'col-25 currency')
      ->close();
   
   $table->addRow($rowData);
   
   $total += $previsao[$index]['0']['liquido'];
   $anomes = $linha;
}

$rowData = new Row('summary');
$rowData
  ->addColumn('Subtotal:', 'col-75')
  ->addColumn($this->Number->currency($total, 'BRL'), 'currency col-25')
  ->close();
$table->addRow($rowData);

            
$total = array_sum($table->array_column($table->array_column($previsao, 0), 'liquido'));

$rowData = new Row('summary');
$rowData
  ->addColumn('Total:', 'col-75')
  ->addColumn($this->Number->currency($total, 'BRL'), 'currency col-25')
  ->close();
$table->addRow($rowData);

$table->addCount(count($previsao));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
