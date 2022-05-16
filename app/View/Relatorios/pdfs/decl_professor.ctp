<?php
App::import('Vendor', 'PeDF/Table');
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$pdf = new RelatorioPDF();
$pdf->Sessao = $this->Session->read('Auth');

for ($index = 0; $index < count($decl_professor); $index++) {
  $pdf->Ln(30);
  $titulo = 'D E C L A R A Ç Ã O &nbsp; D E &nbsp; A U L A S &nbsp; M I N I S T R A D A S';
  $pdf->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
  $pdf->Ln(30);

  $disciplina = $decl_professor[$index]['disciplina']['disciplina'];
  $professor = $decl_professor[$index]['professor']['professor'];
  $dia = '[CLIQUE PARA DIGITAR O DIA]';
  $horas = '[CLIQUE PARA DIGITAR A CARGA HORÁRIA]';
  $representante = 'Roberto Ari Guindani';
  

  $texto = '    A Faculdade FaCiência, estabelecida na Rua Mal. Floriano Peixoto, 470, Curitiba, declara que o(a) ' . $professor . ' ministrou a disciplina de '.$disciplina.', com carga horária de ' . $horas . ' horas/aula nos dias '.$dia.' a '.$dia.'.';

  $pdf->TextField('Texto' . $index, 170, 30, array('multiline'=>true, 'lineWidth'=>0, 'borderStyle'=>'none'), array('v'=>$texto));
  $pdf->Ln(30);
  //$pdf->MultiCell(170, 30, $texto, 0, 'J', 0, 1, '', '', true);

  $texto = '    E, por ser verdade firmamos a presente.';
  $pdf->MultiCell(90, 5, $texto, 0, 'J', 0, 1, '', '', true);

  $pdf->Ln(20);
  $cidade = $decl_professor[$index]['cidade']['cidade'];
  $uf = $decl_professor[$index]['estado']['sigla'];
  $data = $pdf->DataPorExtenso();
  $texto = $cidade . '/' . $uf . ', ' . $data . '.'; 
  $pdf->MultiCell(170, 5, $texto, 0, 'C', 0, 0, '', '', true);

  $pdf->AssinaturaUsuarioLogado();
  $pdf->AssinaturaNomePessoaRelacionadaAoUsuario();

  $ultimoregistro = $index == count($decl_professor) - 1;
  if (! $ultimoregistro)
      $pdf->AddPage();
}
$pdf->Imprimir();