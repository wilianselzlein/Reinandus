<?php

App::import('Vendor','tcpdf/modelos/RelatorioPDF'); 
//App::import('Vendor', 'tcpdf_include');

$relatorio_pdf = new RelatorioPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
/*
 *  $relatorio->SetCreator(PDF_CREATOR);
 *  $relatorio->SetAuthor('Pedro Escobar');
 *  $relatorio->SetSubject('TCPDF Tutorial');
 *  $relatorio->SetKeywords('TCPDF, PDF, example, test, guide');
 */

// set header and footer fonts
$relatorio_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 13));

// set margins
$relatorio_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$relatorio_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$relatorio_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$relatorio_pdf->setTitulo($relatorio_pdf->getTitulo());
// set auto page breaks
$relatorio_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$relatorio_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// add a page (required with recent versions of tcpdf) 
$relatorio_pdf->AddPage(); 

$relatorio_pdf->SetTitulo('Relatório de Alunos');
$relatorio_pdf->writeHTML('<h1>'.$relatorio_pdf->getTitulo().'</h1>', true, false, true, false, 'C');

$relatorio_pdf->SetFont('helvetica', '', 11);

$html = <<<EOD
        <style>
        .titulo
        {
            font-size: 30;
            background-color: red;
        }
        .table-header
        {
            font-weight:bold;
            text-align:left;            
        }
        .group-band
        {
            text-align: left;
            font-weight:bold;
        }
        .totais-label
        {
            text-align: left;
            font-weight:bold;
        }
        .line
        {
            border-top-width: 1;
        }
        </style>        
        <br>
        <br>
		<table cellspacing="0" cellpadding="1" border="0">
EOD;

//debug($aluno); die;

for ($index = 0; $index < count($aluno); $index++) {
    $html .= '<tr>'
            .   '<td colspan="6" class="line"></td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Aluno</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['id']. ' ' . $aluno[$index]['aluno']['nome']. '</td>'
            .   '<td><b>Email</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['email'].'</td>'
            .   '<td><b>Pai</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['nome_pai'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Endereço</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['endereco']. ' ' . $aluno[$index]['aluno']['numero'].'</td>'
            .   '<td><b>Alternativo</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['emailalt'].'</td>'
            .   '<td><b>Mãe</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['nome_mae'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Bairro</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['bairro'].'</td>'
            .   '<td><b>CPF</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['cpf'].'</td>'
            .   '<td><b>Responsável</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['responsavel_id'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Cidade</b></td>'
            .   '<td>'.$aluno[$index]['cidade']['cidade'].'</td>'
            .   '<td><b>Identidade</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['identidade'].'</td>'
            .   '<td><b>Formação</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['formacao'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>CEP</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['cep'].'</td>'
            .   '<td><b>Orgão Exp.</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['orgao_expedidor'].'</td>'
            .   '<td><b>Curso</b></td>'
            .   '<td>'.$aluno[$index]['curso']['curso'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Situação</b></td>'
            .   '<td>'.$aluno[$index]['enumerado']['situacao'].'</td>'
            .   '<td><b>Data Exp.</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['data_expedicao'].'</td>'
            .   '<td><b>Início</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['curso_inicio']. '</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Celular</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['celular'].'</td>'
            .   '<td><b>Nacionalidade</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['nacionalidade'].'</td>'
            .   '<td><b>Fim</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['curso_fim'] . '</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Residencial</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['residencial'].'</td>'
            .   '<td><b>Naturalidade</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['naturalidade_id'].'</td>'
            .   '<td><b>Coordenador</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['professor_id'] . '</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Comercial</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['comercial'].'</td>'
            .   '<td><b>Nascimento</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['data_nascimento'].'</td>'
            .   '<td><b>Estado Civil</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['estado_civil_id'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Monografia</b></td>'
            .   '<td colspan="5">'.$aluno[$index]['aluno']['mono_titulo'].'</td>'
            . '</tr>'
            . '<tr>'
            .   '<td><b>Data</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['mono_data'].'</td>'
            .   '<td><b>Prazo</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['mono_prazo'].'</td>'
            .   '<td><b>Nota</b></td>'
            .   '<td>'.$aluno[$index]['aluno']['mono_nota'].'</td>'
            . '</tr>';
    
}
$total_periodo= count($aluno);

$html .= '<tr><td colspan="5"></td></tr>'
        .'<tr>'
        .'<td colspan="5"></td>'
        .'</tr>'
        .'<tr>'
        .   '<td colspan="2" class="totais-label">Total de alunos listados:</td>'
        .   '<td colspan="2" class="totais-label">'.$total_periodo.'</td>'
        .'</tr>'
        ;
$html .= '</table>';

$relatorio_pdf->writeHTML($html, true, false, true, false, 'L');
$relatorio_pdf->lastPage();

echo $relatorio_pdf->Output('relatorio.pdf', 'I'); 