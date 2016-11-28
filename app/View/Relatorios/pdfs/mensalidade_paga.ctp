<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório Mensalidade em Pagas');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;
$table = new Table();
$rowHeader = new Row('header');
$rowHeader
   ->addColumn('Aluno', 'col-15')
   ->addColumn('Curso', 'col-15')
   ->addColumn('Vencimento', 'col-10 text-centered')
   ->addColumn('Pagamento', 'col-10 text-centered')
   ->addColumn('Valor', 'col-10')
   ->addColumn('Bolsa', 'col-5')
   ->addColumn('Acresc.', 'col-5')
   ->addColumn('Desconto', 'col-10')
   ->addColumn('Liquido', 'col-10')
   ->addColumn('Pago', 'col-10')
   ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($mensalidade_paga); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($mensalidade_paga[$index]['aluno']['aluno'], 'col-15')
      ->addColumn($mensalidade_paga[$index]['curso']['curso'], 'col-15')
      ->addColumn($this->Time->i18nFormat($mensalidade_paga[$index]['mens']['vencimento'], $this->Html->__getDatePatternView()), 'col-10 date text-centered')
      ->addColumn($this->Time->i18nFormat($mensalidade_paga[$index]['mens']['pagamento'], $this->Html->__getDatePatternView()), 'col-10 date text-centered')
      ->addColumn($this->Number->currency($mensalidade_paga[$index]['mens']['valor'], 'BRL'), 'col-10 currency')
      ->addColumn($this->Number->currency($mensalidade_paga[$index]['mens']['bolsa'], 'BRL'), 'col-5 currency')
      ->addColumn($this->Number->currency($mensalidade_paga[$index]['mens']['acrescimo'], 'BRL'), 'col-5 currency')
      ->addColumn($this->Number->currency($mensalidade_paga[$index]['mens']['desconto'], 'BRL'), 'col-10 currency')
      ->addColumn($this->Number->currency($mensalidade_paga[$index]['mens']['liquido'], 'BRL'), 'col-10 currency')
      ->addColumn($this->Number->currency($mensalidade_paga[$index]['mens']['pago'], 'BRL'), 'col-10  currency')
      ->close();

   $table->addRow($rowData);
}
$valo = array_sum($table->array_column($table->array_column($mensalidade_paga, 'mens'), 'valor'));
$bols = array_sum($table->array_column($table->array_column($mensalidade_paga, 'mens'), 'bolsa'));
$acre = array_sum($table->array_column($table->array_column($mensalidade_paga, 'mens'), 'acrescimo'));
$desc = array_sum($table->array_column($table->array_column($mensalidade_paga, 'mens'), 'desconto'));
$liqu = array_sum($table->array_column($table->array_column($mensalidade_paga, 'mens'), 'liquido'));
$pago = array_sum($table->array_column($table->array_column($mensalidade_paga, 'mens'), 'pago'));

$rowData = new Row('summary');
$rowData
  ->addColumn('Total:', 'col-10')
  ->addColumn('', 'col-40')
  ->addColumn($this->Number->currency($valo, 'BRL'), 'currency col-10 currency')
  ->addColumn($this->Number->currency($bols, 'BRL'), 'currency col-10 currency')
  ->addColumn($this->Number->currency($acre, 'BRL'), 'currency col-10 currency')
  ->addColumn($this->Number->currency($desc, 'BRL'), 'currency col-10 currency')
  ->addColumn($this->Number->currency($liqu, 'BRL'), 'currency col-10 currency')
  ->addColumn($this->Number->currency($pago, 'BRL'), 'currency col-10 currency')
  ->close();
$table->addRow($rowData);

$table->addCount(count($mensalidade_paga));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();