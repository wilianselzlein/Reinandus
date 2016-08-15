<?php
App::import('Vendor','tcpdf/tcpdf'); 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of relatorio
 *
 * @author Pedro
 */


class RelatorioPDF extends TCPDF {

   private $xfootertext  ="Copyright © %d Wilian Selzlein. All rights reserved.";
   private $xfooterfont = PDF_FONT_NAME_MAIN;
   private $xfooterfontsize = 8;

   private $headertitle = "Wilian Selzlein";
   private $headertext = "Florianopolis / SC";
   //public $headerlogo = "pos_graduacao_facet.png";
   private $titulo;
   public $html;
   public $Sessao;

   /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    *
    */

   function Header() 
   { 
      $class = ClassRegistry::init('Cabecalho');
      $data = $class->find('first');
      //debug($data);
      /*
      $this->headerlogo = 'uploads/'.$data['Cabecalho']['logo'];
      $this->headertext = htmlentities($data['Cabecalho']['cabecalho'], ENT_QUOTES);

      $this->setHeaderData($this->headerlogo, PDF_HEADER_LOGO_WIDTH, $this->headertitle, $this->headertext);
      parent::Header();

      */
      // Logo
      $image_file = K_PATH_IMAGES. 'uploads/'.$data['Cabecalho']['logo'];//'pos_graduacao_facet.png';//
      if (file_exists($image_file))
         $this->Image($image_file, 10, 10, 30, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
      // Set font
      //$this->SetFont('helvetica', 'B', 20);
      // Title
      //$this->Cell(0, 15, $data['Cabecalho']['cabecalho'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
      //$this->writeHTML($data['Cabecalho']['cabecalho'], true, false, true, false, '');

      $this->writeHTMLCell(
         $w = 0, $h = 0, $x = '50', $y = '', $data['Cabecalho']['cabecalho'], $border = 0, $ln = 1, $fill = 0,
         $reseth = true, $align = 'top', $autopadding = true);
   } 

   /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
   function Footer() 
   { 
      $class = ClassRegistry::init('Cabecalho');
      $data = $class->find('first');
      //$year = date('Y'); 
      //$footertext = sprintf($this->xfootertext, $year); 
      //$this->SetY(-20); 
      //$this->SetTextColor(0, 0, 0); 
      //$this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
      //$this->Cell(0,8, $data['Cabecalho']['rodape'],'T',1,'C'); 
      //
      $position_y = $this->CurOrientation == 'L' ? 185 : 280;
      $image_file = K_PATH_IMAGES. 'uploads/'.$data['Cabecalho']['figura'];//'pos_graduacao_facet.png';//
      if (file_exists($image_file))
         $this->Image($image_file, 10, $position_y, 30, '', '', '', 'T', false, 300, '', false, false, 0, false, false, false);
      $this->writeHTMLCell(
         $w = 0, $h = 0, $x = '50', $position_y , $data['Cabecalho']['rodape'], $border = 0, $ln = 1, $fill = 0,
         $reseth = true, $align = 'L', $autopadding = true);

   } 

   public function setTitulo($titulo){
      $class = ClassRegistry::init('Cabecalho');
      $data = $class->find('first');

      $this->titulo = $titulo;
      $this->writeHTML('<h1>'.$titulo.'</h1>', true, false, true, false, 'C');
   }
   public function getTitulo(){
      return $this->titulo;
   }

   public function configuraCabecalho(){
      $class = ClassRegistry::init('Cabecalho');
      $data = $class->find('first');
      //debug($data);
      $this->headerlogo = $data['Cabecalho']['logo'];
      $this->headertext = $data['Cabecalho']['cabecalho'];

   }

   public function __construct($orientation='P') {
      parent::__construct($orientation);
      setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
      //date_default_timezone_set('America/Sao_Paulo');

      $this->SetCreator('Reinandus');
      $this->SetAuthor('Reinandus Sistema de Gestão de Pós-Graduação');
      $this->SetSubject('Reinandus Sistema de Gestão de Pós-Graduação');
      $this->SetKeywords('Relatório, Reinandus, Sistema');

      // set header and footer fonts
      $this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 13));

      // set margins
      $this->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $this->SetHeaderMargin(PDF_MARGIN_HEADER);
      $this->SetFooterMargin(PDF_MARGIN_FOOTER);
      // set auto page breaks
      $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
      // add a page (required with recent versions of tcpdf) 
      //debug($this->CurOrientation);
      $this->AddPage($this->CurOrientation); 
      $this->SetFont('helvetica', '', 11);

      $this->html = <<<EOD
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
            font-size: 10pt;           
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
        tr.first{
            background-color: red;
        }
        tr.second{
            background-color: #f4f4f4;
         }
         tr.highlighted, th.highlighted{
            background-color: #E0EBFF;
         }
        tr.header{
            font-weight:bold;
            text-align:left;     
            background-color: #f4f4f4;
            font-size: 10pt;  
        }
        tr.subheader{
            font-weight:bold;
            text-align:left;               
            font-style: italic;
            font-size: 11pt;
            font-family: 'Times New Roman';            
        }

        tr.child{
            font-size: 10pt;
        }
        tr.last td{
            border-bottom: 1px solid #000;            
        }
        tr.summary{
            font-weight:bold;
            text-align:left;               
            font-style: italic;
            font-size: 10pt;
            font-family: 'Times New Roman';
            background-color: #f4f4f4;
        }
        td {
          font-size: 8pt;
        }
        td.text-centered, th.text-centered{
            text-align: center;
        }
        .currency, .percentage, .date{
            font-family: 'Courier';
            font-size: 7pt;
         }
         .col-5{
           width:5%;
         }
         .col-10{
           width:10%;
         }
         .col-15{
           width:15%;
         }
         .col-20{
           width:20%
         }
         .col-25{
           width:25%
         }
         .col-30{
           width:30%
         }
         .col-35{
           width:35%
         }
         .col-40{
           width:40%
         }
         .col-45{
           width:45%
         }
         .col-50{
           width:50%
         }
         .col-55{
           width:55%
         }
         .col-60{
           width:60%
         }
         .col-65{
           width:65%
         }
         .col-70{
           width:70%
         }
         .col-75{
           width:75%
         }
         .col-80{
           width:80%
         }
         .col-85{
           width:85%
         }
         .col-90{
           width:90%
         }
         .col-95{
           width:95%
         }
         .borda {
            border: 1px solid #000;  
         }        
        </style>
EOD;

   }
   // Colored table
   public function ColoredTable($header,$data) {
      // Colors, line width and bold font
      $this->SetFillColor(255, 0, 0);
      $this->SetTextColor(255);
      $this->SetDrawColor(128, 0, 0);
      $this->SetLineWidth(0.3);
      $this->SetFont('', 'B');
      // Header
      $w = array(40, 35, 40, 45);
      $num_headers = count($header);
      for($i = 0; $i < $num_headers; ++$i) {
         $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
      }
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224, 235, 255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = 0;
      foreach($data as $row) {
         $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
         $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
         $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
         $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
         $this->Ln();
         $fill=!$fill;
      }
      $this->Cell(array_sum($w), 0, '', 'T');
   }
   public function Imprimir() {
      ini_set('memory_limit', '999M');
      set_time_limit(0);

      $this->writeHTML($this->html, true, false, true, false, 'L');
      $this->lastPage();

      return $this->Output('relatorio.pdf', 'I'); 
   }
   public function HtmlTable_TR($content, $class=''){
      return '<tr class="'.$class.'">'.$content.'</tr>';
   } 
   public function HtmlTable_TD($content, $class='', $colspan='', $rowspan=''){
      return  '<td class="'.$class.'" colspan="'.$colspan.'" rowspan="'.$rowspan.'">'.$content.'</td>';
   } 
   public function HtmlTable_TH($content, $class='', $colspan='', $rowspan=''){
      return  '<th class="'.$class.'" colspan="'.$colspan.'" rowspan="'.$rowspan.'">'.$content.'</th>';
   }

   public function HtmlTable_DIVIDER($colspan, $rowspan){
      return $this->HtmlTable_TR($this->HtmlTable_TD('', '',$colspan, $rowspan));  
   }

   public function HtmlTable_SUMMARY($content, $class='', $colspan='', $rowspan=''){
      $total = 'Total de registros listados: '.$content;
      $summary = ''
         .$this->HtmlTable_DIVIDER($colspan, $rowspan)
         .$this->HtmlTable_TR($this->HtmlTable_TD($total, '', $colspan),$class);

      return $summary;
   }
   public function Print_HeaderCell($width, $data){
      $this->Cell($width, 7, $data, 1, 0, 'C', 1);
   }
   public function Print_Cell($width, $data, $border = 'LR', $align, $fill){
      //$this->Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $stretch = 0, $ignore_min_height = false, $calign = 'T', $valign = 'M')	
         $this->Cell($width, 6, $data, $border, 0, $align, $fill, '', 1);
   }

   public function AssinaturaUsuarioLogado() {
      $this->Ln(20);
      $assinatura = $this->Sessao['User']['assinatura'];
      if ($assinatura != '') {
        $imgdata = base64_decode($assinatura);
        if ($imgdata != '')
          $this->Image('@'.$imgdata, 50);
      }
   }

   public function AssinaturaNomePessoaRelacionadaAoUsuario() {
      $this->Ln(25);
      $secretario = $this->Sessao['User']['Pessoa']['razaosocial'];
      $texto = $secretario . ' 
        ' . 'Departamento da Pós-Graduação'; 
      $this->MultiCell(170, 15, $texto, 0, 'C', 0, 0, '', '', true);
   }   
} 
