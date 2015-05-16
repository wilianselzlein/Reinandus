<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->writeHTML($pdf->html, true, false, true, false, 'L');

$ultimo = -999;
for ($index = 0; $index < count($decl_pagamento); $index++) {

  $atual = $decl_pagamento[$index]['aluno']['id'];

  if ($ultimo != $atual) {
    $ultimo = $atual;

    $pdf->Ln(10);
    $titulo = 'C O M P R O V A N T E &nbsp; D E &nbsp; P A G A M E N T O';;
    $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
    $pdf->writeHTML('<h2>SEGUNDA VIA</h2>', true, false, true, false, 'C');
    $pdf->Ln(10);

    $aluno = $decl_pagamento[$index]['aluno']['aluno'];
    $curso = $decl_pagamento[$index]['curso']['curso'];
    $instituto = $decl_pagamento[$index]['empresa']['instituto'];
    $instituicao = $decl_pagamento[$index]['instituicaoemp']['instituicao'];
    $cnpj = $decl_pagamento[$index]['empresa']['cnpjcpf'];
    $diretor = $decl_pagamento[$index]['diretor']['nome'];

    $texto = '    A ' . $instituto . ', CNPJ ' . $cnpj . ' , que administra o curso de Pós-Graduação da ' . $instituicao . ' representada por seu diretor ' . $diretor . ', declara para os devidos fins e a quem interessar possa que ' . $aluno . ' pagou o valor abaixo referente o curso de pós-graduação em ' . $curso . '. Abaixo apresenta-se o demonstrativo analítico dos pagamentos:';

    $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
    $pdf->Ln(30);
    //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

    $table = new Table();

    $rowHeader = new Row('header');
    $rowHeader
      ->addColumn('Data', 'col-15 text-centered')
      ->addColumn('Valor Integral', 'col-20')
      ->addColumn('Desconto', 'col-20')
      ->addColumn('Valor Líquido', 'col-20')
      ->close();
    $table->addRow($rowHeader);

    $valor = 0;
    $desco = 0;
    $liqui = 0;
  }

  $valor += $decl_pagamento[$index]['mensalidade']['valor'];
  $desco += $decl_pagamento[$index]['mensalidade']['desconto'];
  $liqui += $decl_pagamento[$index]['mensalidade']['liquido'];

     $rowData = new Row('');
     $rowData
        ->addColumn($this->Time->i18nFormat($decl_pagamento[$index]['mensalidade']['pagamento'], $this->Html->__getDatePatternView()), 'date col-15')
        ->addColumn($this->Number->currency($decl_pagamento[$index]['mensalidade']['valor'], 'BRL'), 'currency col-20')
        ->addColumn($this->Number->currency($decl_pagamento[$index]['mensalidade']['desconto'], 'BRL'), 'currency col-20')
        ->addColumn($this->Number->currency($decl_pagamento[$index]['mensalidade']['liquido'], 'BRL'), 'currency col-20')
        ->close();
      $table->addRow($rowData);

  $proximo = $atual;
  if ($index < count($decl_pagamento) - 1)
    $proximo = $decl_pagamento[$index + 1]['aluno']['id'];

  $ultimoregistro = $index == count($decl_pagamento) - 1;
  if (($proximo != $atual) || ($ultimoregistro)) {

  $rowData = new Row('summary');
  $rowData
    ->addColumn('Total:', 'col-15')
    ->addColumn($this->Number->currency($valor, 'BRL'), 'currency col-10')       
    ->addColumn($this->Number->currency($desco, 'BRL'), 'currency col-10')
    ->addColumn($this->Number->currency($liqui, 'BRL'), 'currency col-10')
    ->close();
  $table->addRow($rowData);

    $table->close();
    $pdf->writeHTML($table, true, false, true, false, 'L');

    $texto = '    E, por ser verdade firmamos a presente.';
    $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

    $pdf->Ln(10);
    $cidade = $decl_pagamento[$index]['cidade']['cidade'];
    $uf = $decl_pagamento[$index]['estado']['sigla'];
    $data = $this->Time->i18nFormat(date('m/d/Y'), '%d de %B de %Y');
    $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
    $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

    $pdf->Ln(10);

    $assinatura = $decl_pagamento[$index]['user']['assinatura'];
    if ($assinatura != '') {
      $imgdata = base64_decode($assinatura);
      if ($imgdata != '')
        $pdf->Image('@'.$imgdata, 90);
    }

    $pdf->Ln(10);

    $secretario = $decl_pagamento[$index]['secretario']['razaosocial'];
    $texto = $secretario . ' 
    ' . 'Departamento da Pós-Graduação'; 
    $pdf->MultiCell(170, 15, $texto, 0, 'C', 0, 0, '', '', true);

    $ultimoregistro = $index == count($decl_pagamento) - 1;

    if (! $ultimoregistro)
      $pdf->AddPage();
  }
}

$pdf->Output('relatorio.pdf', 'I'); 