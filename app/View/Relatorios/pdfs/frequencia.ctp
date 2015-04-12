<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->SetTitulo('Relatório de Frequência');

$curso = $frequencia[0]['curso']['curso'];

$relatorio_pdf->html .= 
        '<table cellspacing="0" cellpadding="1" border="0">
            <tr>
                <td width="15%">Curso:</td>
                <td colspan="3">&nbsp; '.$curso.'</td>
            </tr>
            <tr>
                <td width="15%">Professor:</td>
                <td width="65%">&nbsp;</td>
                <td width="10%">Turno:</td>
                <td width="10%">&nbsp;</td>
            </tr>
            <tr>
                <td width="15%">Disciplina:</td>
                <td>&nbsp;</td>
                <td width="10%">Horário:</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
		<table cellspacing="0" cellpadding="1" border="1">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header" colspan="2" width="50%">Aluno</th>
                            <th class="table-header" width="10%">Curso</th>
                            <th class="table-header" width="10%">Turma</th>        
                            <th class="table-header" width="30%">Assinatura</th>        
	    		</tr>
	        </thead>';
  
//debug($frequencia); die;
for ($index = 0; $index < count($frequencia); $index++) {
    $relatorio_pdf->html .= '<tr>'
            .   '<td width="10%">'.$frequencia[$index]['aluno']['id'].'</td>'
            .   '<td width="40%">'.$frequencia[$index]['aluno']['aluno'].'</td>'
            .   '<td width="10%">'.$frequencia[$index]['curso']['sigla'].'</td>'
            .   '<td width="10%">'.$frequencia[$index]['curso']['turma'].'</td>'            
            .   '<td width="30%">&nbsp;</td>'
            . '</tr>';
    
}
for ($index = 0; $index < 4; $index++) {
    $relatorio_pdf->html .= '<tr>'
            .   '<td width="10%">&nbsp;</td>'
            .   '<td width="40%">&nbsp;</td>'
            .   '<td width="10%">&nbsp;</td>'
            .   '<td width="10%">&nbsp;</td>'
            .   '<td width="30%">&nbsp;</td>'
            . '</tr>';
    
}
$total_periodo= count($frequencia);

$relatorio_pdf->html .= '<tr>'
        .   '<td colspan="3" class="totais-label" width="20%">Total de alunos:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        .'</table>';

echo $relatorio_pdf->Imprimir(); 