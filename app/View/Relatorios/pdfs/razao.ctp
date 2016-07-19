<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Razão');
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Conta', 'col-20')
  ->addColumn('Analítico', 'col-15')
  ->addColumn('Data', 'col-15')
  ->addColumn('Histórico', 'col-20')
  ->addColumn('CP', 'col-5')         
  ->addColumn('Doc.', 'col-5')  
  ->addColumn('Débito', 'col-10')
  ->addColumn('Crédito', 'col-10')
  ->close();
$table->addRow($rowHeader);

$deb = 0;
$cre = 0;
$conta = 0;
$conta_deb = 0;
$conta_cre = 0;

//debug($razao); die;
for ($index = 0; $index < count($razao); $index++) {
    if (($conta <> $razao[$index]['razao']['conta']) && ($index > 0)) {
        $rowData = new Row('summary');
        $rowData
          ->addColumn('Subtotal:', 'col-20')
          ->addColumn('', 'col-15')
          ->addColumn('', 'col-15')
          ->addColumn('', 'col-20')
          ->addColumn('', 'col-5')         
          ->addColumn('', 'col-5')  
          ->addColumn($this->Number->currency($conta_deb, 'BRL'), 'currency col-10')
          ->addColumn($this->Number->currency($conta_cre, 'BRL'), 'currency col-10')
          ->close();
        $table->addRow($rowData);
        
	    $conta_deb = 0;
        $conta_cre = 0;
    }

    $even_class = $index % 2 == 0 ? ' highlighted' : '';
	$deb += $razao[$index]['razao']['debito'];
	$cre += $razao[$index]['razao']['credito'];
	
	$conta_deb += $razao[$index]['razao']['debito'];
    $conta_cre += $razao[$index]['razao']['credito'];

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($razao[$index]['razao']['descricao'], 'col-20')
      ->addColumn($razao[$index]['razao']['analitico'], 'col-15')
      ->addColumn($this->Time->i18nFormat($razao[$index]['razao']['data'], $this->Html->__getDatePatternView()), 'date col-15')
      ->addColumn($razao[$index]['razao']['nome'] . ' ' . $razao[$index]['razao']['complemento'], 'col-20')
      ->addColumn($razao[$index]['razao']['contrapartida'], 'col-5')
      ->addColumn($razao[$index]['razao']['documento'], 'col-5')
      ->addColumn($this->Number->currency($razao[$index]['razao']['debito'], 'BRL'), 'currency col-10')
      ->addColumn($this->Number->currency($razao[$index]['razao']['credito'], 'BRL'), 'currency col-10')
      ->close();
    $table->addRow($rowData);

    $conta = $razao[$index]['razao']['conta'];
}

$rowData = new Row('summary');
$rowData
  ->addColumn('Subtotal:', 'col-20')
  ->addColumn('', 'col-15')
  ->addColumn('', 'col-15')
  ->addColumn('', 'col-20')
  ->addColumn('', 'col-5')         
  ->addColumn('', 'col-5')  
  ->addColumn($this->Number->currency($conta_deb, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($conta_cre, 'BRL'), 'currency col-10')
  ->close();
$table->addRow($rowData);

$rowData = new Row('summary');
$rowData
  ->addColumn('', 'col-20')
  ->addColumn('', 'col-15')
  ->addColumn('', 'col-15')
  ->addColumn('', 'col-20')
  ->addColumn('', 'col-5')         
  ->addColumn('', 'col-5')  
  ->addColumn($this->Number->currency($deb, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($cre, 'BRL'), 'currency col-10')
  ->close();
$table->addRow($rowData);

$table->addCount(count($razao));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
