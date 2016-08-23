<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF();
$pdf->Sessao = $this->Session->read('Auth');

for ($index = 0; $index < count($decl_orientacao_monografia); $index++) {
  $pdf->Ln(30);
  $titulo = 'O R I E N T A Ç Ã O &nbsp; D E &nbsp; T C C';
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $curso = $decl_orientacao_monografia[$index]['curso']['curso'];
  $aluno = $decl_orientacao_monografia[$index]['aluno']['aluno'];
  $titulo = $decl_orientacao_monografia[$index]['aluno']['titulo'];
  $nota = $decl_orientacao_monografia[$index]['aluno']['nota'];
  
  $representante = '';
  $professor = $decl_orientacao_monografia[$index]['professor']['orientador'];

  $texto = '    A FACET Faculdade, estabelecida na Rua Mal. Floriano Peixoto, 470, Curitiba, através do seu representante '.$representante.', declara que o(a) Prof(a) '.$professor.' orientou os Trabalhos de Conclusão de Curso dos alunos:';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);

   $pdf->MultiCell(150, 5, 'Curso: '.$curso, 0, 'L', 0, 1, '', '', true);
   $pdf->MultiCell(150, 5, 'Aluno: '.$aluno, 0, 'L', 0, 1, '', '', true);
   $pdf->MultiCell(150, 5, 'Título: '.$titulo, 0, 'L', 0, 1, '', '', true);
   $pdf->MultiCell(150, 5, 'Nota: '.$nota, 0, 'L', 0, 1, '', '', true);
   $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_orientacao_monografia[$index]['cidade']['cidade'];
  $uf = $decl_orientacao_monografia[$index]['estado']['sigla'];
  $data = $pdf->DataPorExtenso();
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->AssinaturaUsuarioLogado();
  $pdf->AssinaturaNomePessoaRelacionadaAoUsuario();

  $ultimoregistro = $index == count($decl_orientacao_monografia) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();