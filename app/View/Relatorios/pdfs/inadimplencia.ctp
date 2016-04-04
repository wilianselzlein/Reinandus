<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Inadimplência por Aluno');
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Aluno', 'col-14')
  ->addColumn('Curso', 'col-15')
  ->addColumn('Telefone', 'col-11')
  ->addColumn('Qtd', 'col-5')
  ->addColumn('Valor', 'col-15')
  ->addColumn('Desconto', 'col-15')  
  ->addColumn('Bolsa', 'col-10')
  ->addColumn('Líquido', 'col-15')
  ->close();
$table->addRow($rowHeader);

$valor = 0;
$quant = 0;
$desco = 0;
$bolsa = 0;
$liqui = 0;

//debug($inadimplencia); die;
for ($index = 0; $index < count($inadimplencia); $index++) {
	$even_class = $index % 2 == 0 ? ' highlighted' : '';

	$valor += $inadimplencia[$index]['0']['valor'];
	$quant += $inadimplencia[$index]['0']['quant'];
	$desco += $inadimplencia[$index]['0']['desconto'];
	$bolsa += $inadimplencia[$index]['0']['bolsa'];
	$liqui += $inadimplencia[$index]['0']['liquido'];

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($inadimplencia[$index]['aluno']['aluno'], 'col-14')
      ->addColumn($inadimplencia[$index]['curso']['curso'], 'col-15')
      ->addColumn($inadimplencia[$index]['aluno']['celular']. '<br>' . $inadimplencia[$index]['aluno']['residencial'], 'col-11')
      ->addColumn($this->Number->Format($inadimplencia[$index]['0']['quant']), 'col-5')
      ->addColumn($this->Number->currency($inadimplencia[$index]['0']['valor'], 'BRL'), 'currency col-15')
      ->addColumn($this->Number->currency($inadimplencia[$index]['0']['desconto'], 'BRL'), 'currency col-15')
      ->addColumn($this->Number->currency($inadimplencia[$index]['0']['bolsa'], 'BRL'), 'currency col-10')
      ->addColumn($this->Number->currency($inadimplencia[$index]['0']['liquido'], 'BRL'), 'currency col-15')
      ->close();
    $table->addRow($rowData);
}

$rowData = new Row('summary');
$rowData
  ->addColumn('', 'col-14')
  ->addColumn('', 'col-15')
  ->addColumn('Total:', 'col-11')
  ->addColumn($this->Number->Format($quant), 'col-5')
  ->addColumn($this->Number->currency($valor, 'BRL'), 'currency col-15')
  ->addColumn($this->Number->currency($desco, 'BRL'), 'currency col-15')
  ->addColumn($this->Number->currency($bolsa, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($liqui, 'BRL'), 'currency col-15')
  ->close();
$table->addRow($rowData);

$table->addCount(count($inadimplencia));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
