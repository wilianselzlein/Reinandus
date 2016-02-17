<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

for ($index = 0; $index < count($decl_suspensao_matricula); $index++) {
  $pdf->Ln(30);
  $titulo = 'D E C L A R A Ç Ã O &nbsp; D E &nbsp; S U S P E N S Ã O <br>&nbsp; D E &nbsp; M A T R Í C U L A';;
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $aluno = $decl_suspensao_matricula[$index]['aluno']['aluno'];
  $curso = $decl_suspensao_matricula[$index]['curso']['curso'];
  $dia = '[CLIQUE PARA DIGITAR O DIA]';

  $texto = '    Declaramos para os devidos fins que o(a) aluno(a) ' . $aluno . ', trancou sua matricula no curso de ' . $curso . ' desta instituição de ensino, no dia '. $dia .'.';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_suspensao_matricula[$index]['cidade']['cidade'];
  $uf = $decl_suspensao_matricula[$index]['estado']['sigla'];
  $data = $this->Time->i18nFormat(date('m/d/Y'), '%d de %B de %Y');
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->Ln(10);

$imgdata = base64_decode($decl_suspensao_matricula[$index]['user']['assinatura']);
if ($imgdata != '')
$pdf->Image('@'.$imgdata, 90);

  $pdf->Ln(20);

  $secretario = $decl_suspensao_matricula[$index]['secretario']['razaosocial'];
  $texto = $secretario . ' 
  ' . 'Departamento da Pós-Graduação'; 
  $pdf->MultiCell(170, 15, $texto, 0, 'C', 0, 0, '', '', true);

  $ultimoregistro = $index == count($decl_suspensao_matricula) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();