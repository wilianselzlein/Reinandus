<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Mensalidade em Aberto por Aluno');
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Aluno', 'col-15')
  ->addColumn('Curso', 'col-15')
  ->addColumn('Telefone', 'col-15')
  ->addColumn('Vencimento', 'col-15')
  ->addColumn('Valor', 'col-10')
  ->addColumn('Acrés', 'col-5')         
  ->addColumn('Desconto', 'col-10')  
  ->addColumn('Bolsa', 'col-5')
  ->addColumn('Líquido', 'col-10')
  ->close();
$table->addRow($rowHeader);

$valor = 0;
$acres = 0;
$desco = 0;
$bolsa = 0;
$liqui = 0;

//debug($mensalidade_aberto_aluno); die;
for ($index = 0; $index < count($mensalidade_aberto_aluno); $index++) {
    $even_class = $index % 2 == 0 ? ' highlighted' : '';
	$valor += $mensalidade_aberto_aluno[$index]['mens']['valor'];
	$acres += $mensalidade_aberto_aluno[$index]['mens']['acrescimo'];
	$desco += $mensalidade_aberto_aluno[$index]['mens']['desconto'];
	$bolsa += $mensalidade_aberto_aluno[$index]['mens']['bolsa'];
	$liqui += $mensalidade_aberto_aluno[$index]['mens']['liquido'];

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($mensalidade_aberto_aluno[$index]['aluno']['aluno'], 'col-15')
      ->addColumn($mensalidade_aberto_aluno[$index]['curso']['curso'], 'col-15')
      ->addColumn($mensalidade_aberto_aluno[$index]['aluno']['celular']. '<br>' . $mensalidade_aberto_aluno[$index]['aluno']['residencial'], 'col-15')
      ->addColumn($this->Time->i18nFormat($mensalidade_aberto_aluno[$index]['mens']['vencimento'], $this->Html->__getDatePatternView()), 'date col-15')
      ->addColumn($this->Number->currency($mensalidade_aberto_aluno[$index]['mens']['valor'], 'BRL'), 'currency col-10')
      ->addColumn($this->Number->currency($mensalidade_aberto_aluno[$index]['mens']['acrescimo'], 'BRL'), 'currency col-5')       
      ->addColumn($this->Number->currency($mensalidade_aberto_aluno[$index]['mens']['desconto'], 'BRL'), 'currency col-10')
      ->addColumn($this->Number->currency($mensalidade_aberto_aluno[$index]['mens']['bolsa'], 'BRL'), 'currency col-5')
      ->addColumn($this->Number->currency($mensalidade_aberto_aluno[$index]['mens']['liquido'], 'BRL'), 'currency col-10')
      ->close();
    $table->addRow($rowData);

}

$rowData = new Row('summary');
$rowData
  ->addColumn('', 'col-15')
  ->addColumn('', 'col-15')
  ->addColumn('', 'col-10')
  ->addColumn('Total:', 'col-15')
  ->addColumn($this->Number->currency($valor, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($acres, 'BRL'), 'currency col-10')       
  ->addColumn($this->Number->currency($desco, 'BRL'), 'currency col-10')
  ->addColumn($this->Number->currency($bolsa, 'BRL'), 'currency col-5')
  ->addColumn($this->Number->currency($liqui, 'BRL'), 'currency col-10')
  ->close();
$table->addRow($rowData);

$table->addCount(count($mensalidade_aberto_aluno));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
