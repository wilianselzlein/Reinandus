<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->SetTitulo('Relatório de Frequência');

$html = $relatorio_pdf->html;

$table = new Table();
if (count($frequencia) > 0) {

$curso = $table->array_unique($frequencia,'curso');
$cabecalho = new Table();

$rowData = new Row('');
$rowData
  ->addColumn('Curso:', 'col-10')
  ->addColumn($curso, 'col-90')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Professor:', 'col-10')
  ->addColumn('', 'col-60')
  ->addColumn('Turno:', 'col-10')
  ->addColumn('', 'col-20')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Disciplina:', 'col-10')
  ->addColumn('', 'col-60')
  ->addColumn('Horário:', 'col-10')
  ->addColumn('', 'col-20')
  ->close();
$cabecalho->addRow($rowData);

$cabecalho->close();
$html .= $cabecalho . '<br><br>';

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Aluno', 'col-50')
  ->addColumn('Curso', 'col-10')
  ->addColumn('Turma', 'col-10')
  ->addColumn('Assinatura', 'col-30')         
  ->close();
$table->addRow($rowHeader);
  
//debug($frequencia); die;
for ($index = 0; $index < count($frequencia); $index++) {
   $rowData = new Row('last');
   $rowData
      ->addColumn($frequencia[$index]['aluno']['id'] . ' ' . $frequencia[$index]['aluno']['aluno'], 'col-50')
      ->addColumn($frequencia[$index]['curso']['sigla'], 'col-10')
      ->addColumn($frequencia[$index]['curso']['turma'], 'col-10')
      ->addColumn('&nbsp;', 'col-30')
      ->close();
    $table->addRow($rowData);

}
for ($index = 0; $index < 4; $index++) {
   $rowData = new Row('last');
   $rowData
      ->addColumn('&nbsp;', 'col-50')
      ->addColumn('&nbsp;', 'col-10')
      ->addColumn('&nbsp;', 'col-10')
      ->addColumn('&nbsp;', 'col-30')
      ->close();
    $table->addRow($rowData);
}

$table->addCount(count($frequencia));
$table->close();
$html .= $table;
}

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
