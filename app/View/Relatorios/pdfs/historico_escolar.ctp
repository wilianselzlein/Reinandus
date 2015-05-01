<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$relatorio_pdf->SetTitulo('Histórico Escolar');

$curso = $historico_escolar[0]['curso']['curso'];
$html = $relatorio_pdf->html;
$html .= '<div align="center">';
$html .= '<h1>Histórico Escolar</h1>';
$html .= '<h2>Pós-Graduação - Lato Sensu</h2>';
$html .= '<h3>' . $curso . '</h3>';
$html .= '</div>';

$cabecalho = new Table();

$rowData = new Row('');
$rowData
  ->addColumn('Nome do Aluno:', 'col-15')
  ->addColumn($historico_escolar[0]['aluno']['nome'], 'col-85 totais-label')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Nacionalidade:', 'col-15')
  ->addColumn($historico_escolar[0]['aluno']['nacionalidade'], 'col-15')
  ->addColumn('Naturalidade:', 'col-10')
  ->addColumn($historico_escolar[0]['cidade']['naturalidade'] . '/' . $historico_escolar[0]['estado']['sigla'], 'col-20')
  ->addColumn('Data do Nascimento:', 'col-20')
  ->addColumn($this->Time->i18nFormat($historico_escolar[0]['aluno']['data_nascimento'], $this->Html->__getDatePatternView()), 'col-20')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
//date_default_timezone_set('America/Sao_Paulo');

$rowData
  ->addColumn('Período de Ralização:', 'col-20')
  ->addColumn($this->Time->i18nFormat($historico_escolar[0]['aluno']['curso_inicio'], '%d de %B de %Y') . ' a ' . $this->Time->i18nFormat($historico_escolar[0]['aluno']['curso_fim'], '%d de %B de %Y'), 'col-80')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Sistema de Avaliação de Aprendizagem:', 'col-30')
  ->addColumn($historico_escolar[0]['curso']['sistema_aval'], 'col-70')
  ->close();
$cabecalho->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('Critérios Mínimos de Aprovação:', 'col-30')
  ->addColumn($historico_escolar[0]['curso']['criterios_aval'], 'col-70')
  ->close();
$cabecalho->addRow($rowData);

$cabecalho->close();
$html .= $cabecalho . '<br>';

$table = new Table();
$rowHeader = new Row('header');
$rowHeader
  ->addColumn('Disciplina', 'col-35')
  ->addColumn('Docente Responsável', 'col-30')
  ->addColumn('Titulação', 'col-10')
  ->addColumn('Horas Aula', 'col-10')
  ->addColumn('Frequência', 'col-10')
  ->addColumn('Nota', 'col-5')
  ->close();
$table->addRow($rowHeader);
  
//debug($historico_escolar); die;
$ha = 0;
$fr = 0;
$nt = 0;
for ($index = 0; $index < count($historico_escolar); $index++) {
   $ha += $historico_escolar[$index]['alunodisc']['horas_aula'];
   $fr += $historico_escolar[$index]['alunodisc']['frequencia'];
   $nt += $historico_escolar[$index]['alunodisc']['nota'];

   $rowData = new Row('');
   $rowData
      ->addColumn($historico_escolar[$index]['disciplina']['disciplina'], 'col-35 line')
      ->addColumn($historico_escolar[$index]['professor']['professor'], 'col-30 line')
      ->addColumn($historico_escolar[$index]['professor']['resumotitulacao'], 'col-10 line')
      ->addColumn($historico_escolar[$index]['alunodisc']['horas_aula'], 'col-10 line')
      ->addColumn($historico_escolar[$index]['alunodisc']['frequencia'], 'col-10 line')
      ->addColumn($historico_escolar[$index]['alunodisc']['nota'], 'col-5 line')
      ->close();
    $table->addRow($rowData);

}
$rowData = new Row('');
$rowData
  ->addColumn('TRABALHO DE CONCLUSÃO DE CURSO:', 'col-35 line')
  ->addColumn('', 'col-30 line')
  ->addColumn('', 'col-10 line')
  ->addColumn('-', 'col-10 line')
  ->addColumn('-', 'col-10 line')
  ->addColumn($historico_escolar[0]['aluno']['mono_nota'], 'col-5 line')
  ->close();
$table->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('', 'col-5')
  ->addColumn($historico_escolar[0]['aluno']['mono_titulo'], 'col-95')
  ->close();
$table->addRow($rowData);

$rowData = new Row('');
$rowData
  ->addColumn('', 'col-35 line')
  ->addColumn('', 'col-30 line')
  ->addColumn('', 'col-10 line')
  ->addColumn($ha, 'col-10 line')
  ->addColumn(round($fr / count($historico_escolar),2), 'col-10 line')
  ->addColumn(round($nt / count($historico_escolar),2), 'col-5 line')
  ->close();
$table->addRow($rowData);

$table->close();
$html .= $table;

switch (date('m')) {
  case '01': $mes = 'Janeiro'; break;
  case '02': $mes = 'Fevereiro'; break;
  case '03': $mes = 'Março'; break;
  case '04': $mes = 'Abril'; break;
  case '05': $mes = 'Maio'; break;
  case '06': $mes = 'Junho'; break;
  case '07': $mes = 'Julho'; break;
  case '08': $mes = 'Agosto'; break;
  case '09': $mes = 'Setembro'; break;
  case '10': $mes = 'Outubro'; break;
  case '11': $mes = 'Novembro'; break;
  case '12': $mes = 'Dezembro'; break; 
}
 
$html .= 'Declaramos para os devidos fins que o curso de Pós-Graduação em ' . $curso . ' cumpriu todas as disposições da Resolução MEC/CES-CNE nº 1, de 8 de junho de 2007. <br> <div align="center">' . 
  $historico_escolar[0]['matriz']['matriz'] . ', ' . 
  date('j') . ' de ' . $mes . ' de ' . date('Y') . '<br><br>' .
  $historico_escolar[0]['pessoa']['razaosocial'] . '<br>Secretaria</div>';

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
