<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Alunos/Formação');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Curso', 'col-30')
  ->addColumn('Código', 'col-10 text-centered')
  ->addColumn('Aluno', 'col-20')
  ->addColumn('Formação', 'col-40')         
  ->close();
$table->addRow($rowHeader);

//debug($aluno_formacao); die;
for ($index = 0; $index < count($aluno_formacao); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($aluno_formacao[$index]['curso']['curso'], 'col-30')
      ->addColumn($aluno_formacao[$index]['aluno']['codigo'], 'col-10 text-centered')
      ->addColumn($aluno_formacao[$index]['aluno']['aluno'], 'col-20')
      ->addColumn($aluno_formacao[$index]['detalhe']['hist_escolar'], 'col-40')
      ->close();
    $table->addRow($rowData);
}

$table->addCount(count($aluno_formacao));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
