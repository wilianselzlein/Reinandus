<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$relatorio_pdf->setTitulo('Relatório de Professores');

$relatorio_pdf->html .= '
		<table cellspacing="0" cellpadding="1" border="0">
	        <thead>
	    		<tr class="teste">
                            <th class="table-header">Id</th>
                            <th class="table-header">Nome</th>
                            <th class="table-header">Endereço</th>
                            <th class="table-header">Cidade</th>
                            <th class="table-header">Telefone</th>
                            <th class="table-header">Celular</th>
                            <th class="table-header">Titulação</th>
                            <th class="table-header">Formação</th>
	    		</tr>
                        <tr>
                            <td colspan="8" class="line"></td>
                        </tr>
	        </thead>';
  
for ($index = 0; $index < count($professor); $index++) {
    $relatorio_pdf->html .= '<tr>'
            .   '<td>'.$professor[$index]['p']['id'].'</td>'
            .   '<td>'.$professor[$index]['p']['nome'].'</td>'
            .   '<td>'.$professor[$index]['p']['endereco']. ' ' . $professor[$index]['p']['numero'] . ' ' 
            . $professor[$index]['p']['bairro']. '</td>'
            .   '<td>'.$professor[$index]['c']['cidade_nome'].'</td>'            
            .   '<td>'.$professor[$index]['p']['fone'].'</td>'
            .   '<td>'.$professor[$index]['p']['celular'].'</td>'
            .   '<td>'.$professor[$index]['p']['resumotitulacao'].'</td>'
            .   '<td>'.$professor[$index]['p']['formacao'].'</td>'
            . '</tr>';
}

$total= count($professor);

$relatorio_pdf->html .= '<tr><td colspan="1"></td></tr>'
        .'<tr>'
        .'<td colspan="1"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="3" class="totais-label">Total de professor(es) listado(s):</td>'
        .   '<td colspan="2" class="totais-label">'.$total.'</td>'
        .'</tr>'
        .'</table>';

echo $relatorio_pdf->Imprimir(); 