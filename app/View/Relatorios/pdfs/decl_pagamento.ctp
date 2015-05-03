<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

for ($index = 0; $index < count($decl_pagamento); $index++) {
  $pdf->Ln(30);
  $titulo = 'C O M P R O V A N T E &nbsp; D E &nbsp; P A G A M E N T O';;
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->writeHTML('<h2>SEGUNDA VIA</h2>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $aluno = $decl_pagamento[$index]['aluno']['aluno'];
  $curso = $decl_pagamento[$index]['curso']['curso'];
  $periodo = '[CLIQUE PARA DIGITAR O PERÍODO]';

  $texto = '    Declaramos para os devidos fins que ' . $aluno . ' é aluno(a) matriculado(a) no Curso de Pós-Graduação em ' . $curso . ' desta instituição de ensino, no período de ' . $periodo . '.
  ';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_pagamento[$index]['cidade']['cidade'];
  $uf = $decl_pagamento[$index]['estado']['sigla'];
  $data = $this->Time->i18nFormat(date('m/d/Y'), '%d de %B de %Y');
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->Ln(10);

  $assinatura = $decl_pagamento[$index]['user']['assinatura'];
  if ($assinatura != '') {
    $imgdata = base64_decode($assinatura);
    $pdf->Image('@'.$imgdata, 90);
  }

  $pdf->Ln(20);

  $secretario = $decl_pagamento[$index]['secretario']['razaosocial'];
  $texto = $secretario . ' 
  ' . 'Departamento da Pós-Graduação'; 
  $pdf->MultiCell(170, 15, $texto, 0, 'C', 0, 0, '', '', true);

  $ultimoregistro = $index == count($decl_pagamento) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();