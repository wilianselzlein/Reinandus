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
    public $headerlogo = "pos_graduacao_facet.png";
    private $titulo;
    
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
        $this->setHeaderData($this->headerlogo, PDF_HEADER_LOGO_WIDTH, $this->headertitle, $this->headertext);
        parent::Header();
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    { 
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
        $this->Cell(0,8, $footertext,'T',1,'C'); 
        
    } 
    
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getTitulo(){
        return $this->titulo;
    }
} 