<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF();
$pdf->Sessao = $this->Session->read('Auth');

for ($index = 0; $index < count($decl_frequencia); $index++) {
  $pdf->Ln(30);
  $titulo = 'D E C L A R A Ç Ã O &nbsp; D E &nbsp; F R E Q U Ê N C I A';;
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $aluno = $decl_frequencia[$index]['aluno']['aluno'];
  $curso = $decl_frequencia[$index]['curso']['curso'];
  $dia = '[CLIQUE PARA DIGITAR O DIA]';
  $periodo = '[CLIQUE PARA DIGITAR O PERÍODO]';

  $texto = '    Declaramos para os devidos fins que ' . $aluno . ' é aluno(a) matriculado(a) no Curso de Pós-Graduação em ' . $curso . ' desta instituição de ensino e que frequentou as aulas no ' . $dia . ' no período das ' . $periodo . '.';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_frequencia[$index]['cidade']['cidade'];
  $uf = $decl_frequencia[$index]['estado']['sigla'];
  $data = $this->Time->i18nFormat(date('m/d/Y'), '%d de %B de %Y');
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->AssinaturaUsuarioLogado();
  $pdf->AssinaturaNomePessoaRelacionadaAoUsuario();

  $ultimoregistro = $index == count($decl_frequencia) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();