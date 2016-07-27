<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$ultimo = -999;
$htmlcss = $relatorio_pdf->html;
//$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');

for ($index = 0; $index < count($historico_escolar); $index++) {
  
  $atual = $historico_escolar[$index]['aluno']['id'];

  if ($ultimo != $atual) {
    $html = $htmlcss;
    $ultimo = $atual;

    $curso = $historico_escolar[$index]['curso']['curso'];
    $margem = 'style="margin-top: 1px; margin-bottom: 1px;"';
    $html .= 
    '<div align="center">'
    . '<b>Histórico Escolar</b><br/>'
    . '<b>Pós-Graduação - Lato Sensu</b><br/>'
    . '<big>' . $curso . '</big><br/><br/>'
    .'</div>';

    $cabecalho = new Table();

    $rowData = new Row('');
    $rowData
      ->addColumn('Nome do Aluno:', 'col-15')
      ->addColumn($historico_escolar[$index]['aluno']['nome'], 'col-85 totais-label')
      ->close();
    $cabecalho->addRow($rowData);

    $rowData = new Row('');
    $rowData
      ->addColumn('Nacionalidade:', 'col-15')
      ->addColumn($historico_escolar[$index]['aluno']['nacionalidade'], 'col-15')
      ->addColumn('Naturalidade:', 'col-15')
      ->addColumn($historico_escolar[$index]['cidade']['naturalidade'] . '/' . $historico_escolar[$index]['estado']['sigla'], 'col-20')
      ->addColumn('Data do Nascimento:', 'col-20')
      ->addColumn($this->Time->i18nFormat($historico_escolar[$index]['aluno']['data_nascimento'], $this->Html->__getDatePatternView()), 'col-20')
      ->close();
    $cabecalho->addRow($rowData);

    $rowData = new Row('');

    $rowData
      ->addColumn('Período de Ralização:', 'col-20')
      ->addColumn($this->Time->i18nFormat($historico_escolar[$index]['aluno']['curso_inicio'], '%d de %B de %Y') . ' a ' . $this->Time->i18nFormat($historico_escolar[$index]['aluno']['curso_fim'], '%d de %B de %Y'), 'col-80')
      ->close();
    $cabecalho->addRow($rowData);

    $rowData = new Row('');
    $rowData
      ->addColumn('Sistema de Avaliação de Aprendizagem:', 'col-30')
      ->addColumn($historico_escolar[$index]['curso']['sistema_aval'], 'col-70')
      ->close();
    $cabecalho->addRow($rowData);

    $rowData = new Row('');
    $rowData
      ->addColumn('Critérios Mínimos de Aprovação:', 'col-30')
      ->addColumn($historico_escolar[$index]['curso']['criterios_aval'], 'col-70')
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

    $ha = 0;
    $fr = 0;
    $nt = 0;
    $count = 0;
  }

 $ha += $historico_escolar[$index]['alunodisc']['horas_aula'];
 $fr += $historico_escolar[$index]['alunodisc']['frequencia'];
 $nt += $historico_escolar[$index]['alunodisc']['nota'];
 $count++;

 $rowData = new Row('');
 $rowData
    ->addColumn($historico_escolar[$index]['disciplina']['disciplina'], 'col-35 line')
    ->addColumn($historico_escolar[$index]['professor']['professor'], 'col-30 line')
    ->addColumn($historico_escolar[$index]['titulacao']['valor'], 'col-10 line')
    ->addColumn($historico_escolar[$index]['alunodisc']['horas_aula'], 'col-10 line')
    ->addColumn($historico_escolar[$index]['alunodisc']['frequencia'], 'col-10 line')
    ->addColumn($historico_escolar[$index]['alunodisc']['nota'], 'col-5 line')
    ->close();
  $table->addRow($rowData);
  
  $proximo = $atual;
  if ($index < count($historico_escolar) - 1)
    $proximo = $historico_escolar[$index + 1]['aluno']['id'];

  $ultimoregistro = $index == count($historico_escolar) - 1;
  if (($proximo != $atual) || ($ultimoregistro)) {

    $rowData = new Row('');
    $rowData
      ->addColumn('TRABALHO DE CONCLUSÃO DE CURSO:', 'col-35 line')
      ->addColumn('', 'col-30 line')
      ->addColumn('', 'col-10 line')
      ->addColumn('-', 'col-10 line')
      ->addColumn('-', 'col-10 line')
      ->addColumn($historico_escolar[$index]['aluno']['mono_nota'], 'col-5 line')
      ->close();
    $table->addRow($rowData);

    $rowData = new Row('');
    $rowData
      ->addColumn('', 'col-5')
      ->addColumn($historico_escolar[$index]['aluno']['mono_titulo'], 'col-95')
      ->close();
    $table->addRow($rowData);

    $rowData = new Row('');
    $rowData
      ->addColumn('', 'col-35 line')
      ->addColumn('', 'col-30 line')
      ->addColumn('', 'col-10 line')
      ->addColumn($ha, 'col-10 line')
      ->addColumn(round($fr / $count,2), 'col-10 line')
      ->addColumn(round($nt / $count,2), 'col-5 line')
      ->close();
    $table->addRow($rowData);

    $table->close();
    $html .= $table;

    $html .= 'Declaramos para os devidos fins que o curso de Pós-Graduação em ' . $curso . ' cumpriu todas as disposições da Resolução MEC/CES-CNE nº 1, de 8 de junho de 2007. <br> <div align="center">' . 
      $historico_escolar[$index]['matriz']['matriz'] . ', ' . 
      $this->Time->i18nFormat(date('m/d/Y'), '%d de %B de %Y') . '<br><br>' .
      $historico_escolar[$index]['pessoa']['razaosocial'] . '<br>Secretaria</div>';

    $relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
    if (! $ultimoregistro)
      $relatorio_pdf->AddPage();
  }
}

$relatorio_pdf->Output('relatorio.pdf', 'I'); 