<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Alunos por Curso e Ano');
$ano1 = $aluno_ano[0]['0']['maximo'];
$ano2 = $ano1 - 1;
$ano3 = $ano1 - 2;
$ano4 = $ano1 - 3;

$relatorio_pdf->html .= 
        '<table cellspacing="0" cellpadding="1" border="0">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header">Sigla</th>
                            <th class="table-header">'.$ano1.'</th>
                            <th class="table-header">'.$ano2.'</th>
                            <th class="table-header">'.$ano3.'</th>
                            <th class="table-header">'.$ano4.'</th>
                            <th class="table-header">Total</th>
	    		</tr>
                        <tr>
                            <td colspan="6" class="line"></td>
                        </tr>
	        </thead>';
$ano1 = 0;
$ano2 = 0;
$ano3 = 0;
$ano4 = 0;

//debug($aluno_ano); die;
for ($index = 0; $index < count($aluno_ano); $index++) {
	$ano1 += $aluno_ano[$index]['0']['ano1'];
	$ano2 += $aluno_ano[$index]['0']['ano2'];
	$ano3 += $aluno_ano[$index]['0']['ano3'];
	$ano4 += $aluno_ano[$index]['0']['ano4'];

	$somalinha = 
	  $aluno_ano[$index]['0']['ano1'] +
	  $aluno_ano[$index]['0']['ano2'] +
	  $aluno_ano[$index]['0']['ano3'] +
	  $aluno_ano[$index]['0']['ano4'];

    $relatorio_pdf->html .= '<tr>'
            .   '<td>'.$aluno_ano[$index]['c']['sigla'].'</td>'
            .   '<td>'.$aluno_ano[$index]['0']['ano1'].'</td>'
            .   '<td>'.$aluno_ano[$index]['0']['ano2'].'</td>'
            .   '<td>'.$aluno_ano[$index]['0']['ano3'].'</td>'            
            .   '<td>'.$aluno_ano[$index]['0']['ano4'].'</td>'
            .   '<td>'.$somalinha.'</td>'
            . '</tr>';
    
}

$total_periodo= count($aluno_ano);

$relatorio_pdf->html .= 
        '<tr>'
        .'  <td colspan="6" class="line"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td>Total:</td>'
        .   '<td>'.$ano1.'</td>'
        .   '<td>'.$ano2.'</td>'
        .   '<td>'.$ano3.'</td>'
        .   '<td>'.$ano4.'</td>'
        .   '<td>'. ($ano1 + $ano2 + $ano3 + $ano4) .'</td>'
        . '</tr>'
        .'<tr>'
        .'  <td colspan="6" class="line"></td>'
        .'</tr>'
		.'<tr><td colspan="5"></td></tr>'
        .'<tr>'
        .'<td colspan="5"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">Total de cursos listados:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        .'</table>';

echo $relatorio_pdf->Imprimir(); 