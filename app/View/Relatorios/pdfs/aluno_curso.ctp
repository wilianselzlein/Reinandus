<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Listagem de Alunos');

$relatorio_pdf->html .= 
        '<table cellspacing="0" cellpadding="1" border="0">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header">Cidade</th>
                            <th class="table-header">Curso</th>
                            <th class="table-header">Código</th>
                            <th class="table-header">Aluno</th>        
                            <th class="table-header">Situação</th>        
	    		</tr>
                        <tr>
                            <td colspan="5" class="line"></td>
                        </tr>
	        </thead>';
  
//debug($aluno_curso); die;
for ($index = 0; $index < count($aluno_curso); $index++) {
    $relatorio_pdf->html .= '<tr>'
            .   '<td>'.$aluno_curso[$index]['cidade']['cidade'].'</td>'
            .   '<td>'.$aluno_curso[$index]['curso']['curso'].'</td>'
            .   '<td>'.$aluno_curso[$index]['aluno']['codigo'].'</td>'
            .   '<td>'.$aluno_curso[$index]['aluno']['aluno'].'</td>'            
            .   '<td>'.$aluno_curso[$index]['enumerado']['situacao'].'</td>'
            . '</tr>';
    
}
$total_periodo= count($aluno_curso);

$relatorio_pdf->html .= '<tr><td colspan="5"></td></tr>'
        .'<tr>'
        .'<td colspan="5"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">Total de alunos listados:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        .'</table>';

echo $relatorio_pdf->Imprimir(); 