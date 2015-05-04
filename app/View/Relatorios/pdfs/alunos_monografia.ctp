<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Alunos/Monografia');
$html = $relatorio_pdf->html;
//debug($aluno);
$table = new Table();
$rowHeader = new Row('header');
   $rowHeader
      ->addColumn('Aluno', 'col-25 text-centered')      
      ->addColumn('Celular', 'col-10')
      ->addColumn('E-mail', 'col-20')
      ->addColumn('Curso', 'col-25')
      ->addColumn('Início', 'col-10')
      ->addColumn('Fim', 'col-10')
      
      ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($aluno); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';
   
   

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($aluno[$index]['aluno']['nome'], 'text-centered')
      ->addColumn($aluno[$index]['aluno']['celular'])
      ->addColumn($aluno[$index]['aluno']['email'])      
      ->addColumn($aluno[$index]['curso']['nome'])
      ->addColumn($this->Time->i18nFormat($aluno[$index]['curso']['inicio'], $this->Html->__getDatePatternView()), 'date')         
      ->addColumn($this->Time->i18nFormat($aluno[$index]['curso']['fim'], $this->Html->__getDatePatternView()), 'date')  
      ->close();

   $rowSubheader = new Row('subheader'.$even_class);
   $rowSubheader
      ->addColumn('', 'col-5')
      ->addColumn('Coordenador', 'col-25')  
      ->addColumn('Monografia', 'col-40')
      ->addColumn('Data', 'col-10')
      ->addColumn('Prazo', 'col-10')
      ->addColumn('Nota', 'col-10')
      ->close();

   $rowDataChild = new Row('child last'.$even_class);
   $rowDataChild
      ->addColumn('')
      ->addColumn($aluno[$index]['professor']['nome'])
      ->addColumn($aluno[$index]['curso']['monografia'])
      ->addColumn($this->Time->i18nFormat(null, $this->Html->__getDatePatternView()), 'date')
      ->addColumn($this->Time->i18nFormat(null, $this->Html->__getDatePatternView()), 'date')
      ->addColumn('')
      ->close();

   $table->addRow($rowData);
   $table->addRow($rowSubheader);
   $table->addRow($rowDataChild);
}

$table->addCount(count($aluno));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();