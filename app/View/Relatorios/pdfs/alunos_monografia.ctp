<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Alunos/TCCs');
$relatorio_pdf->setFiltros($filtros);
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
      ->addColumn($aluno[$index]['aluno']['nome'], 'col-25 text-centered')
      ->addColumn($aluno[$index]['aluno']['celular'], 'col-10')
      ->addColumn($aluno[$index]['aluno']['email'], 'col-20')      
      ->addColumn($aluno[$index]['curso']['nome'], 'col-25')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['curso']['inicio'], $this->Html->__getDatePatternView()), 'col-10 date')         
      ->addColumn($this->Time->i18nFormat($aluno[$index]['curso']['fim'], $this->Html->__getDatePatternView()), 'col-10 date')  
      ->close();

   $rowSubheader = new Row('subheader'.$even_class);
   $rowSubheader
      ->addColumn('Orientador', 'col-20')  
      ->addColumn('TCC', 'col-40')
      ->addColumn('Data', 'col-10')
      ->addColumn('Prazo', 'col-10')
      ->addColumn('Nota', 'col-10')
      ->addColumn('Pgto', 'col-10')
      ->close();

   $rowDataChild = new Row('child last'.$even_class);
   $rowDataChild
      ->addColumn($aluno[$index]['professor']['nome'], 'col-20')
      ->addColumn($aluno[$index]['aluno']['mono_titulo'], 'col-40')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['mono_data'], $this->Html->__getDatePatternView()), 'col-10 date')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['mono_prazo'], $this->Html->__getDatePatternView()), 'col-10 date')
      ->addColumn($aluno[$index]['aluno']['mono_nota'], 'col-10')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['mono_pagamento'], $this->Html->__getDatePatternView()), 'col-10 date')
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