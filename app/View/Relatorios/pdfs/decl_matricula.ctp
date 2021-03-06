<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF();
$pdf->Sessao = $this->Session->read('Auth');

for ($index = 0; $index < count($decl_matricula); $index++) {
  $pdf->Ln(30);
  $titulo = 'D E C L A R A Ç Ã O &nbsp; D E &nbsp; M A T R Í C U L A';;
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $aluno = $decl_matricula[$index]['aluno']['aluno'];
  $curso = $decl_matricula[$index]['curso']['curso'];
  $periodo = $this->Time->i18nFormat(strtotime($decl_matricula[$index]['aluno']['curso_inicio']), '%d/%m/%Y') . ' a ' .
   $this->Time->i18nFormat(strtotime($decl_matricula[$index]['aluno']['curso_fim']), '%d/%m/%Y');

  $texto = '    Declaramos para os devidos fins que ' . $aluno . ' é aluno(a) matriculado(a) no Curso de Pós-Graduação em ' . $curso . ' desta instituição de ensino, no período de ' . $periodo . '.';
  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_matricula[$index]['cidade']['cidade'];
  $uf = $decl_matricula[$index]['estado']['sigla'];
  $data = $pdf->DataPorExtenso();
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->AssinaturaUsuarioLogado();
  $pdf->AssinaturaNomePessoaRelacionadaAoUsuario();

  $ultimoregistro = $index == count($decl_matricula) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();