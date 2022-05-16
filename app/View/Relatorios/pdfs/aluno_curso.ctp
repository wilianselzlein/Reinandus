<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Listagem de Alunos');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Cidade', 'col-10')
  ->addColumn('Curso', 'col-30')
  ->addColumn('Código', 'col-10 text-centered')
  ->addColumn('Aluno', 'col-30')
  ->addColumn('Situação', 'col-20')         
  ->close();
$table->addRow($rowHeader);

//debug($aluno_curso); die;
for ($index = 0; $index < count($aluno_curso); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($aluno_curso[$index]['cidade']['cidade'], 'col-10')
      ->addColumn($aluno_curso[$index]['curso']['curso'], 'col-30')
      ->addColumn($aluno_curso[$index]['aluno']['codigo'], 'col-10 text-centered')
      ->addColumn($aluno_curso[$index]['aluno']['aluno'], 'col-30')
      ->addColumn($aluno_curso[$index]['enumerado']['situacao'], 'col-20')
      ->close();
    $table->addRow($rowData);
}

$table->addCount(count($aluno_curso));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
