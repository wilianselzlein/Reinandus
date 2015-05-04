<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Melhores Alunos');
$html = $relatorio_pdf->html;
//debug($aluno_disciplinas);

$table = new Table();
$rowHeader = new Row('header');
$rowHeader
   ->addColumn('Cód.', 'col-5 text-centered')
   ->addColumn('Aluno', 'col-20 text-centered')
   ->addColumn('Curso', 'col-20 text-centered')
   ->addColumn('Professor', 'col-20 text-centered')
   ->addColumn('Disciplina', 'col-20 text-centered')         
   ->addColumn('Nota', 'col-5 text-centered')  
   ->addColumn('Freq.', 'col-10 text-centered')
   ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($aluno_disciplinas); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row('last'.$even_class);
   $rowData
      ->addColumn($aluno_disciplinas[$index]['aluno']['id'], 'col-5 text-centered')
      ->addColumn($aluno_disciplinas[$index]['aluno']['nome'], 'col-20 text-centered')
      ->addColumn($aluno_disciplinas[$index]['curso']['nome'], 'col-20 text-centered')
      ->addColumn($aluno_disciplinas[$index]['professor']['nome'], 'col-20 text-centered')
      ->addColumn($aluno_disciplinas[$index]['disciplina']['nome'], 'col-20 text-centered')         
      ->addColumn($aluno_disciplinas[$index]['aluno_disciplinas']['nota'], 'col-5 text-centered')  
      ->addColumn($this->Number->toPercentage($aluno_disciplinas[$index]['aluno_disciplinas']['frequencia']), 'col-10 percentage text-centered')
      ->close();
   
   $table->addRow($rowData);
}

$table->addCount(count($aluno_disciplinas));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();