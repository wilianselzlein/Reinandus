<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Razão');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Data', 'col-10')
  ->addColumn('Histórico', 'col-50')
  ->addColumn('CP', 'col-10')
  ->addColumn('Doc.', 'col-10')
  ->addColumn('Débito', 'col-10')
  ->addColumn('Crédito', 'col-10')
  ->close();
$table->addRow($rowHeader);

$deb = 0;
$cre = 0;
$conta = '';
$conta_deb = 0;
$conta_cre = 0;

//debug($razao); die;
for ($index = 0; $index < count($razao); $index++) {
    if (($conta <> $razao[$index]['razao']['analitico'])) {

        if ($index > 0) {
            $rowData = new Row('summary');
            $rowData
              ->addColumn('Subtotal:', 'col-20')
              ->addColumn('', 'col-60')
              ->addColumn($this->Number->currency($conta_deb, 'BRL'), 'currency col-10')
              ->addColumn($this->Number->currency($conta_cre, 'BRL'), 'currency col-10')
              ->close();
            $table->addRow($rowData);
            $conta_deb = 0;
            $conta_cre = 0;
        }
        $rowData = new Row('summary');
        $rowData
          ->addColumn('Conta:', 'col-10')
          ->addColumn($razao[$index]['razao']['conta'], 'col-5')
          ->addColumn($razao[$index]['razao']['analitico'], 'col-15')
          ->addColumn($razao[$index]['razao']['descricao'], 'col-70')
          ->close();

        $table->addRow($rowData);
    }

  $even_class = $index % 2 == 0 ? ' highlighted' : '';
	$deb += $razao[$index]['razao']['debito'];
	$cre += $razao[$index]['razao']['credito'];
	
	$conta_deb += $razao[$index]['razao']['debito'];
  $conta_cre += $razao[$index]['razao']['credito'];

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($this->Time->i18nFormat($razao[$index]['razao']['data'], $this->Html->__getDatePatternView()), 'date col-10')
      ->addColumn($razao[$index]['razao']['nome'] . ' ' . $razao[$index]['razao']['complemento'], 'col-50')
      ->addColumn($razao[$index]['razao']['contrapartida'], 'col-10')
      ->addColumn($razao[$index]['razao']['documento'], 'col-10')
      ->addColumn($this->Number->currency($razao[$index]['razao']['debito'], 'BRL'), 'currency col-10')
      ->addColumn($this->Number->currency($razao[$index]['razao']['credito'], 'BRL'), 'currency col-10')
      ->close();
    $table->addRow($rowData);

    $conta = $razao[$index]['razao']['analitico'];
}

$rowData = new Row('summary');
$rowData
  ->addColumn('Subtotal:', 'col-20')
  ->addColumn('', 'col-60')
  ->addColumn($this->Number->currency($conta_deb, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($conta_cre, 'BRL'), 'currency col-10')
  ->close();
$table->addRow($rowData);

$rowData = new Row('summary');
$rowData
  ->addColumn('', 'col-80')
  ->addColumn($this->Number->currency($deb, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($cre, 'BRL'), 'currency col-10')
  ->close();
$table->addRow($rowData);

$table->addCount(count($razao));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
