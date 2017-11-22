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
  ->addColumn('Nome', 'col-25')
  ->addColumn('RG', 'col-10')
  ->addColumn('CPF', 'col-15')
  ->addColumn('Nascimento', 'col-10 text-centered')
  ->addColumn('Curso', 'col-20')
  ->addColumn('Matrícula', 'col-10 text-centered')
  ->addColumn('Término Curso', 'col-10 text-centered')
  ->close();
$table->addRow($rowHeader);

//debug($carteirinha); die;
for ($index = 0; $index < count($carteirinha); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($carteirinha[$index]['aluno']['aluno'], 'col-25')
      ->addColumn($carteirinha[$index]['aluno']['identidade'], 'col-10')
      ->addColumn($carteirinha[$index]['aluno']['cpf'], 'col-15')
      ->addColumn($this->Time->i18nFormat($carteirinha[$index]['aluno']['data_nascimento'], $this->Html->__getDatePatternView()), 'col-10 date text-centered')
      ->addColumn($carteirinha[$index]['curso']['curso'], 'col-20')
      ->addColumn($carteirinha[$index]['aluno']['codigo'], 'col-10 text-centered')
      ->addColumn($this->Time->i18nFormat($carteirinha[$index]['aluno']['curso_fim'], $this->Html->__getDatePatternView()), 'col-10 date text-centered')
      ->close();
    $table->addRow($rowData);
}

$table->addCount(count($carteirinha));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
