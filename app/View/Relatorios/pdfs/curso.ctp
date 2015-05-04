<?php

App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Cursos');
$html = $relatorio_pdf->html;

$table = new Table();
$rowHeader = new Row('header');
   $rowHeader
      ->addColumn('Código', 'col-10 text-centered')
      ->addColumn('Nome', 'col-30')
      ->addColumn('Turma', 'col-10')
      ->addColumn('Carga', 'col-10')
      ->addColumn('Vcto', 'col-10')         
      ->addColumn('Coordenador', 'col-15')  
      ->addColumn('Secretário', 'col-15')
      ->close();
$table->addRow($rowHeader);

for ($index = 0; $index < count($curso); $index++) {
   $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn($curso[$index]['curso']['codigo'], 'col-10 text-centered')
      ->addColumn($curso[$index]['curso']['nome'], 'col-30')
      ->addColumn($curso[$index]['curso']['turma'], 'col-10')
      ->addColumn($curso[$index]['curso']['carga'], 'col-10')
      ->addColumn($curso[$index]['curso']['vencimento'], 'col-10')         
      ->addColumn($curso[$index]['professor']['coordenador'], 'col-15')  
      ->addColumn($curso[$index]['pessoa']['secretario'], 'col-15')
      ->close();

   $rowSubheader = new Row('subheader'.$even_class);
   $rowSubheader
      ->addColumn('')
      ->addColumn('')
      ->addColumn('Valor')
      ->addColumn('Desconto')
      ->addColumn('Líquido')
      ->addColumn('Início')
      ->addColumn('Fim')
      ->close();

   $rowDataChild = new Row('child last'.$even_class);
   $rowDataChild
      ->addColumn('')
      ->addColumn('')
      ->addColumn($this->Number->currency($curso[$index]['curso']['valor'], 'BRL'), 'currency')
      ->addColumn($this->Number->toPercentage($curso[$index]['curso']['desconto']), 'percentage')
      ->addColumn($this->Number->currency($curso[$index]['curso']['liquido'], 'BRL'), 'currency')
      ->addColumn($this->Time->i18nFormat($curso[$index]['curso']['inicio'], $this->Html->__getDatePatternView()), 'date')
      ->addColumn($this->Time->i18nFormat($curso[$index]['curso']['fim'], $this->Html->__getDatePatternView()), 'date')
      ->close();
   
   $table->addRow($rowData);
   $table->addRow($rowSubheader);
   $table->addRow($rowDataChild);
}

$table->addCount(count($curso));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();

/*require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php'); 
spl_autoload_register('DOMPDF_autoload'); 
$dompdf = new DOMPDF(); 
$dompdf->set_paper = 'A4';
$dompdf->load_html(utf8_decode($html), Configure::read('App.encoding'));
$dompdf->render();
echo $dompdf->output();*/
