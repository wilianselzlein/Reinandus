<?php
/**
 * Document   : app/Vendor/mpdf/Table.php
 * Created on : 2015-04-21 03:08 AM
 *
 * @author Pedro Escobar
 */
class Table{
   private $html;

   public function __construct($class='') {
      $this->html = '<table class="'.$class.'" cellpadding="0" cellspacing="0">';
   }
   public function __toString(){
      return $this->html;
   }
   public function close(){
      $this->html .= '</table>';
   }

   public function addRow($content=''){
      $this->html .= $content;
      return $this;
   }


}

class Row{
   private $html;

   public function __construct($class='') {
      $this->html = '<tr class="'.$class.'">';
   }
   public function __toString(){
      return $this->html;
   }
   public function close(){
      $this->html .= '</tr>';
   }   

   public function addColumn($content='', $class='',$colspan='', $rowspan=''){
      $addColspan = $colspan ? ' colspan="'.$colspan.'" ' : '';
      $addRowspan = $rowspan ? ' rowspan="'.$rowspan.'" ' : '';

      $this->html .= '<td class="'.$class.'"'.$addColspan.$addRowspan.'>'.$content.'</td>';
      return $this;
   }
}

?>