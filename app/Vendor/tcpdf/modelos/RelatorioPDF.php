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


class RelatorioPDF  extends TCPDF 
{ 

   private $xfootertext  ="Copyright © %d Facet Faculdades. All rights reserved.";//= 'Copyright Â© %d XXXXXXXXXXX. All rights reserved.'; 
   private $xfooterfont = PDF_FONT_NAME_MAIN ; 
   private $xfooterfontsize = 8 ; 

   private $headertitle = "Facet Faculdades";
   private $headertext = "Curitiba / PR";
   //public $headerlogo = "pos_graduacao_facet.png";
   private $titulo;
   public $html;

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
         $this->Image($image_file, 10, 10, 30, '', '*', '', 'T', false, 300, '', false, false, 0, false, false, false);
      // Set font
      //$this->SetFont('helvetica', 'B', 20);
      // Title
      //$this->Cell(0, 15, $data['Cabecalho']['cabecalho'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
      //$this->writeHTML($data['Cabecalho']['cabecalho'], true, false, true, false, '');


      $this->writeHTMLCell(
         $w = 0, $h = 0, $x = '', $y = '',          $data['Cabecalho']['cabecalho'], $border = 0, $ln = 1, $fill = 0,
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
      $image_file = K_PATH_IMAGES. 'uploads/'.$data['Cabecalho']['figura'];//'pos_graduacao_facet.png';//
      if (file_exists($image_file))
         $this->Image($image_file, 10, 280, 30, '', '*', '', 'B', false, 300, '', false, false, 0, false, false, false);
      $this->writeHTMLCell(
         $w = 0, $h = 0, $x = '', $y ='280',          $data['Cabecalho']['rodape'], $border = 0, $ln = 1, $fill = 0,
         $reseth = true, $align = 'C', $autopadding = true);

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

   	public function __construct() {
		parent::__construct();
		/*
		 *  $relatorio->SetCreator(PDF_CREATOR);
		 *  $relatorio->SetAuthor('Pedro Escobar');
		 *  $relatorio->SetTitle('TCPDF Example 048');
		 *  $relatorio->SetSubject('TCPDF Tutorial');
		 *  $relatorio->SetKeywords('TCPDF, PDF, example, test, guide');
		 */

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
		$this->AddPage(); 

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
EOD;

	}

	public function Imprimir() {
		$this->writeHTML($this->html, true, false, true, false, 'L');
		$this->lastPage();

		return $this->Output('relatorio.pdf', 'I'); 
	}

} 