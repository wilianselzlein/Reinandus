<?php
App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Razão');

$relatorio_pdf->html .= '
	<table cellspacing="0" cellpadding="1" border="0">
		<thead>
			<tr class="teste">
						<th class="table-header">Conta</th>
						<th class="table-header">Analítico</th>
						<th class="table-header">Data</th>
						<th class="table-header">Histórico</th>
						<th class="table-header">CP</th>
						<th class="table-header">Documento</th>
						<th class="table-header">Débito</th>
						<th class="table-header">Crédito</th>
			</tr>
					<tr>
						<td colspan="8" class="line"></td>
					</tr>
		</thead>';

$deb = 0;
$cre = 0;

//debug($razao); die;
for ($index = 0; $index < count($razao); $index++) {
	$deb += $razao[$index]['razao']['debito'];
	$cre += $razao[$index]['razao']['credito'];
	
$relatorio_pdf->html .= '<tr>'
            .   '<td>'.$razao[$index]['razao']['descricao'].'</td>'
            .   '<td>'.$razao[$index]['razao']['analitico'].'</td>'
            .   '<td>'.$razao[$index]['razao']['data'].'</td>'
            .   '<td>'.$razao[$index]['razao']['nome'].'</td>'
            .   '<td>'.$razao[$index]['razao']['contrapartida'].'</td>'
            .   '<td>'.$razao[$index]['razao']['documento'].'</td>'
            .   '<td>'.$razao[$index]['razao']['debito'].'</td>'
            .   '<td>'.$razao[$index]['razao']['credito'].'</td>'
            . '</tr>';
    
}

$relatorio_pdf->html .= 
        '<tr>'
        .'  <td colspan="8" class="line"></td>'
        .'</tr>'
		.'<tr>'
        .   '<td colspan="6">Total:</td>'
        .   '<td>'.$deb.'</td>'
        .   '<td>'.$cre	.'</td>'
        . '</tr>';

$total_periodo= count($razao);

$relatorio_pdf->html .= 
        '<tr>'
        .'  <td colspan="8" class="line"></td>'
        .'</tr>'
		.'<tr><td colspan="8"></td></tr>'
        .'<tr>'
        .'<td colspan="8"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="4" class="totais-label">Total de lançamentos listados</td>'
        .   '<td colspan="4" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>';

$relatorio_pdf->html .= '</table>';

echo $relatorio_pdf->Imprimir();
