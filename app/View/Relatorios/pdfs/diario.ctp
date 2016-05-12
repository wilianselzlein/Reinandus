<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->SetTitulo('Diário de Classe');

$html = $relatorio_pdf->html;

if (count($diario) > 0) {
$curso = $diario[0]['curso']['curso'];

$cabecalho = new Table();
$___ = str_repeat('_', 50);
$_ = str_repeat('_', 10);

$rowData = new Row('');
$rowData
  ->addColumn('Curso:', 'col-10')
  ->addColumn($___, 'col-60')
  ->addColumn(date('d/m/Y'), 'col-30')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Professor:', 'col-10')
  ->addColumn($___, 'col-60')
  ->addColumn('Turno:', 'col-10')
  ->addColumn($_, 'col-20')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Disciplina:', 'col-10')
  ->addColumn($___, 'col-60')
  ->addColumn('Horário:', 'col-10')
  ->addColumn($_, 'col-20')
  ->close();
$cabecalho->addRow($rowData);

$cabecalho->close();
$html .= $cabecalho . '<br><br>';

$table = new Table();
$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Aluno', 'col-30 borda')
  ->addColumn('Curso', 'col-10 borda')
  ->addColumn('Turma', 'col-6 borda')
  ->addColumn('', 'col-5 borda')
  ->addColumn('', 'col-5 borda')
  ->addColumn('', 'col-5 borda')
  ->addColumn('', 'col-5 borda')
  ->addColumn('', 'col-5 borda')
  ->addColumn('', 'col-5 borda')
  ->addColumn('% Freq.', 'col-7 borda')
  ->addColumn('Nota', 'col-7 borda')     
  ->close();
$table->addRow($rowHeader);

//debug($diario); die;
for ($index = 0; $index < count($diario); $index++) {
   $rowData = new Row('last');
   $rowData
      ->addColumn($diario[$index]['aluno']['id'] . ' ' . $diario[$index]['aluno']['aluno'], 'col-30 borda')
      ->addColumn($diario[$index]['curso']['sigla'], 'col-10 borda')
      ->addColumn($diario[$index]['curso']['turma'], 'col-6 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-7 borda')
      ->addColumn('&nbsp;', 'col-7 borda')
      ->close();
    $table->addRow($rowData);

}
for ($index = 0; $index < 4; $index++) {
   $rowData = new Row('last');
   $rowData
      ->addColumn('&nbsp;', 'col-30 borda')
      ->addColumn('&nbsp;', 'col-10 borda')
      ->addColumn('&nbsp;', 'col-6 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-5 borda')
      ->addColumn('&nbsp;', 'col-7 borda')
      ->addColumn('&nbsp;', 'col-7 borda')
      ->close();
    $table->addRow($rowData);
}

$table->addCount(count($diario));
$table->close();
$html .= $table;
}

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
