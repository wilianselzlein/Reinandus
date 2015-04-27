<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Alunos por Curso e Ano');
$ano1 = $aluno_ano[0]['0']['maximo'];
$ano2 = $ano1 - 1;
$ano3 = $ano1 - 2;
$ano4 = $ano1 - 3;

$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Sigla', 'col-5')
  ->addColumn($ano1, 'col-20')
  ->addColumn($ano2, 'col-20')
  ->addColumn($ano3, 'col-20')
  ->addColumn($ano4, 'col-20')
  ->addColumn('Total', 'col-15')
  ->close();
$table->addRow($rowHeader);

$ano1 = 0;
$ano2 = 0;
$ano3 = 0;
$ano4 = 0;

//debug($aluno_ano); die;
for ($index = 0; $index < count($aluno_ano); $index++) {
    $even_class = $index % 2 == 0 ? ' highlighted' : '';
	$ano1 += $aluno_ano[$index]['0']['ano1'];
	$ano2 += $aluno_ano[$index]['0']['ano2'];
	$ano3 += $aluno_ano[$index]['0']['ano3'];
	$ano4 += $aluno_ano[$index]['0']['ano4'];

	$somalinha = 
	  $aluno_ano[$index]['0']['ano1'] +
	  $aluno_ano[$index]['0']['ano2'] +
	  $aluno_ano[$index]['0']['ano3'] +
	  $aluno_ano[$index]['0']['ano4'];

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($aluno_ano[$index]['c']['sigla'], 'col-5')
      ->addColumn($aluno_ano[$index]['0']['ano1'], 'col-20')
      ->addColumn($aluno_ano[$index]['0']['ano2'], 'col-20')
      ->addColumn($aluno_ano[$index]['0']['ano3'], 'col-20')
      ->addColumn($aluno_ano[$index]['0']['ano4'], 'col-20')
      ->addColumn($somalinha, 'col-15')
      ->close();
    $table->addRow($rowData);
}

$total_periodo= count($aluno_ano);

$rowData = new Row('summary');
$rowData
  ->addColumn('Total:', 'col-5')
  ->addColumn($ano1, 'col-20')
  ->addColumn($ano2, 'col-20')
  ->addColumn($ano3, 'col-20')
  ->addColumn($ano4, 'col-20')
  ->addColumn(($ano1 + $ano2 + $ano3 + $ano4), 'col-15')
  ->close();
$table->addRow($rowData);

$table->addCount(count($aluno_ano));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir(); 