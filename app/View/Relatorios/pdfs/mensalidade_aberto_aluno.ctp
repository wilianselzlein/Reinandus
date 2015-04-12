<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Mensalidade em Aberto por Aluno');

$relatorio_pdf->html .= 
    '<table cellspacing="0" cellpadding="1" border="0">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header">Aluno</th>
                            <th class="table-header">Curso</th>
                            <th class="table-header">Telefone</th>
                            <th class="table-header">Vencimento</th>
                            <th class="table-header">Valor</th>
                            <th class="table-header">Acréscimo</th>
                            <th class="table-header">Deconto</th>
                            <th class="table-header">Bolsa</th>
                            <th class="table-header">Líquido</th>
	    		</tr>
                        <tr>
                            <td colspan="9" class="line"></td>
                        </tr>
	        </thead>';
$valor = 0;
$acres = 0;
$desco = 0;
$bolsa = 0;
$liqui = 0;

//debug($mensalidade_aberto_aluno); die;
for ($index = 0; $index < count($mensalidade_aberto_aluno); $index++) {
	$valor += $mensalidade_aberto_aluno[$index]['mens']['valor'];
	$acres += $mensalidade_aberto_aluno[$index]['mens']['acrescimo'];
	$desco += $mensalidade_aberto_aluno[$index]['mens']['desconto'];
	$bolsa += $mensalidade_aberto_aluno[$index]['mens']['bolsa'];
	$liqui += $mensalidade_aberto_aluno[$index]['mens']['liquido'];

    $relatorio_pdf->html .= '<tr>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['aluno']['aluno'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['curso']['curso'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['aluno']['celular'].'<br>'.$mensalidade_aberto_aluno[$index]['aluno']['residencial'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['mens']['vencimento'].'</td>'            
            .   '<td>'.$mensalidade_aberto_aluno[$index]['mens']['valor'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['mens']['acrescimo'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['mens']['desconto'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['mens']['bolsa'].'</td>'
            .   '<td>'.$mensalidade_aberto_aluno[$index]['mens']['liquido'].'</td>'
            . '</tr>';
    
}

$total_periodo = count($mensalidade_aberto_aluno);
$relatorio_pdf->html .= 
        '<tr>'
        .'  <td colspan="9" class="line"></td>'
        .'</tr>'
		.'<tr>'
        .   '<td colspan="4">Total:</td>'
        .   '<td>'.$valor.'</td>'
        .   '<td>'.$acres.'</td>'
        .   '<td>'.$desco.'</td>'
        .   '<td>'.$bolsa.'</td>'
        .   '<td>'.$liqui.'</td>'
        . '</tr>'
        .'<tr>'
        .'  <td colspan="9" class="line"></td>'
        .'</tr>'
		.'<tr><td colspan="9"></td></tr>'
        .'<tr>'
        .'<td colspan="9"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="5" class="totais-label">Total de mensalidades listadas:</td>'
        .   '<td colspan="4" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        .'</table>';

echo $relatorio_pdf->Imprimir(); 