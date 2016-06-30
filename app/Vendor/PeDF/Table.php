<?php
/**
 * Document   : app/Vendor/mpdf/Table.php
 * Created on : 2015-04-21 03:08 AM
 *
 * @author Pedro Escobar
 */
class Table{
   private $html;
   private $html_count = '';

   public function __construct($class='') {
      $this->html = '<table class="'.$class.'" cellpadding="2" cellspacing="0">';
   }
   public function __toString(){
      return $this->html . $this->html_count;
   }
   public function close(){
      $this->html .= '</table>';
   }

   public function addRow($content=''){
      $this->html .= $content;
      return $this;
   }

   public function addCount($count) {
      $total = new Table();
      $rowTotal = new Row('');
      $rowTotal
        ->addColumn('Total de registros listados:', 'col-30 totais-label')
        ->addColumn($count, 'col-20 totais-label')
        ->close();
      $total->addRow($rowTotal);
      $total->close();
      $this->html_count = '<br><hr>' . $total;
   }

   public function array_column(array $array, $columnKey, $indexKey = null)
   {
     $result = array();
     foreach ($array as $subArray) {
         if (!is_array($subArray)) {
             continue;
         } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
             $result[] = $subArray[$columnKey];
         } elseif (array_key_exists($indexKey, $subArray)) {
             if (is_null($columnKey)) {
                 $result[$subArray[$indexKey]] = $subArray;
             } elseif (array_key_exists($columnKey, $subArray)) {
                 $result[$subArray[$indexKey]] = $subArray[$columnKey];
             }
         }
     }
     return $result;
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