<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->SetTitulo('Relatório de Alunos');
$relatorio_pdf->setFiltros($filtros);
$html = $relatorio_pdf->html;

$table = new Table();

$rowHeader = new Row('header');
$rowHeader
  ->addColumn('', 'col-10')
  ->addColumn('', 'col-95')
  ->close();
$table->addRow($rowHeader);

//debug($aluno); die;
for ($index = 0; $index < count($aluno); $index++) {
    $even_class = $index % 2 == 0 ? ' highlighted' : '';

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Aluno ' . $aluno[$index]['aluno']['id'], 'col-10 totais-label line')
      ->addColumn($aluno[$index]['aluno']['nome'], 'col-25 line')
      ->addColumn('Email', 'col-10 totais-label line')
      ->addColumn($aluno[$index]['aluno']['email'], 'col-25 line')
      ->addColumn('Pai', 'col-10 totais-label line')
      ->addColumn($aluno[$index]['aluno']['nome_pai'], 'col-25 line')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Endereço', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['endereco']. ' ' . $aluno[$index]['aluno']['numero'], 'col-25')
      ->addColumn('Alternativo', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['emailalt'], 'col-25')
      ->addColumn('Mãe', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['nome_mae'], 'col-25')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Bairro', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['bairro'], 'col-25')
      ->addColumn('CPF', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['cpf'], 'col-25')
      ->addColumn('Respons.', 'col-10 totais-label')
      ->addColumn($aluno[$index]['pessoa']['razaosocial'], 'col-25')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Cidade', 'col-10 totais-label')
      ->addColumn($aluno[$index]['cidade']['cidade'], 'col-25')
      ->addColumn('Identidade', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['identidade'], 'col-25')
      ->addColumn('Formação', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['formacao'], 'col-25')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('CEP', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['cep'], 'col-25')
      ->addColumn('Orgão Exp.', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['orgao_expedidor'], 'col-25')
      ->addColumn('Curso', 'col-10 totais-label')
      ->addColumn($aluno[$index]['curso']['curso'], 'col-25')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Situação', 'col-10 totais-label')
      ->addColumn($aluno[$index]['enumerado']['situacao'], 'col-25')
      ->addColumn('Data Exp.', 'col-10 totais-label')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['data_expedicao'], $this->Html->__getDatePatternView()), 'col-25 date')
      ->addColumn('Início', 'col-10 totais-label')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['curso_inicio'], $this->Html->__getDatePatternView()), 'col-25 date')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Celular', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['celular'], 'col-25')
      ->addColumn('Nacional.', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['nacionalidade'], 'col-25')
      ->addColumn('Fim', 'col-10 totais-label')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['curso_fim'], $this->Html->__getDatePatternView()), 'col-25 date')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Residencial', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['residencial'], 'col-25')
      ->addColumn('Naturalid.', 'col-10 totais-label')
      ->addColumn($aluno[$index]['naturalidade']['naturalidade'], 'col-25')
      ->addColumn('Orientador', 'col-10 totais-label')
      ->addColumn($aluno[$index]['professor']['professor'], 'col-25')
      ->close();
    $table->addRow($rowData);

   $rowData = new Row(''.$even_class);
   $rowData
      ->addColumn('Comercial', 'col-10 totais-label')
      ->addColumn($aluno[$index]['aluno']['comercial'], 'col-25')
      ->addColumn('Nascimento', 'col-10 totais-label')
      ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['data_nascimento'], $this->Html->__getDatePatternView()), 'col-25 date')
      ->addColumn('Estado Civil', 'col-10 totais-label')
      ->addColumn($aluno[$index]['estadocivil']['estadocivil'], 'col-25')
      ->close();
    $table->addRow($rowData);

   $mono = $aluno[$index]['aluno']['mono_titulo'];
   if ($mono != '') {
     $rowData = new Row(''.$even_class);
     $rowData
        ->addColumn('Monografia', 'col-10 totais-label')
        ->addColumn($mono, 'col-95 date')
        ->close();
      $table->addRow($rowData);

     $rowData = new Row(''.$even_class);
     $rowData
        ->addColumn('Data', 'col-10 totais-label')
        ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['mono_data'], $this->Html->__getDatePatternView()), 'col-25 date')
        ->addColumn('Prazo', 'col-10 totais-label')
        ->addColumn($this->Time->i18nFormat($aluno[$index]['aluno']['mono_prazo'], $this->Html->__getDatePatternView()), 'col-25 date')
        ->addColumn('Nota', 'col-10 totais-label')
        ->addColumn($aluno[$index]['aluno']['mono_nota'], 'col-25')
        ->close();
      $table->addRow($rowData);
    }
}

$table->addCount(count($aluno));
$table->close();
$html .= $table;

$relatorio_pdf->html = $html;
$relatorio_pdf->Imprimir();
