<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF();
$pdf->Sessao = $this->Session->read('Auth');

for ($index = 0; $index < count($decl_reativacao); $index++) {
  $pdf->Ln(30);
  $titulo = 'Declaração de Reativação de Matrícula de TCC';
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $aluno = $decl_reativacao[$index]['aluno']['aluno'];
  $curso = $decl_reativacao[$index]['curso']['curso'];
  $periodo = '[CLIQUE PARA DIGITAR O DIA]';

  $texto = '    Declaramos para os devidos fins que o(a) aluno(a) ' . $aluno . ' reativou sua matricula no dia ' . $periodo . ', tendo um prazo de seis(06) meses, a partir do dia de rematricula, para entrega de sua monografia.';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_reativacao[$index]['cidade']['cidade'];
  $uf = $decl_reativacao[$index]['estado']['sigla'];
  $data = $pdf->DataPorExtenso();
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->AssinaturaUsuarioLogado();
  $pdf->AssinaturaNomePessoaRelacionadaAoUsuario();

  $ultimoregistro = $index == count($decl_reativacao) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();