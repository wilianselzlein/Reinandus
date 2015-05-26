<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

for ($index = 0; $index < count($declaracao_conclusao_curso); $index++) {
  $pdf->Ln(30);
  $titulo = 'C E R T I F I C A D O &nbsp; D E &nbsp; C O N C L U S Ã O &nbsp; D E &nbsp; C U R S O';;
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $aluno = $declaracao_conclusao_curso[$index]['aluno']['aluno'];
  $curso = $declaracao_conclusao_curso[$index]['curso']['curso'];
  $horas = $declaracao_conclusao_curso[$index]['curso']['carga'];;

  $texto = '    Certificamos para os devidos fins que ' . $aluno . ' , concluiu as disciplinas do curso de Pós-Graduação em ' .$curso . ' com carga horária de ' . $horas . ' horas nesta instituição de ensino.';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por expressão da verdade, firmamos a presente Certidão.';
  $pdf->MultiCell(150, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $declaracao_conclusao_curso[$index]['cidade']['cidade'];
  $uf = $declaracao_conclusao_curso[$index]['estado']['sigla'];
  $data = $this->Time->i18nFormat(date('m/d/Y'), '%d de %B de %Y');
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->Ln(10);

$imgdata = base64_decode($declaracao_conclusao_curso[$index]['user']['assinatura']);

$pdf->Image('@'.$imgdata, 90);

  $pdf->Ln(20);

  $secretario = $declaracao_conclusao_curso[$index]['secretario']['razaosocial'];
  $texto = $secretario . ' 
  ' . 'Departamento da Pós-Graduação'; 
  $pdf->MultiCell(170, 15, $texto, 0, 'C', 0, 0, '', '', true);

  $ultimoregistro = $index == count($declaracao_conclusao_curso) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();