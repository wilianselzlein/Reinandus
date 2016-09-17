<?php
/*$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Wilian Ivo Selzlein")
                             //->setLastModifiedBy("Carlos Hernan Aguilar")
                             ->setTitle("Reinandus Sistema")
                             ->setSubject("Exportação Reinandus")
                             ->setDescription("Exportação sistema Reinandus.")
                             ->setKeywords("office reinandus openxml php cakephp")
                             ->setCategory("Exportação Reinandus");

$i=2;
foreach ($posts as $post){
 
  $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('A'.$i, $post['Enumerado']['id'])
              ->setCellValue('B'.$i, $post['Enumerado']['nome'])
              ->setCellValue('C'.$i, $post['Enumerado']['referencia'])
              ->setCellValue('D'.$i, $post['Enumerado']['valor']);
   $i++;
}

$objPHPExcel->getActiveSheet()->setTitle('Reinandus');
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ejemplo.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;*/

$this->PhpExcel->createWorksheet()->setDefaultFont('Arial', 12);
$this->PhpExcel->setActiveSheetIndex(0);

$this->PhpExcel->getProperties()->setCreator("Wilian Ivo Selzlein")
                             ->setLastModifiedBy("Reinandus")
                             ->setTitle("Reinandus Sistema")
                             ->setSubject("Exportação Reinandus")
                             ->setDescription("Exportação sistema Reinandus.")
                             ->setKeywords("office reinandus openxml php cakephp")
                             ->setCategory("Exportação Reinandus");

$this->PhpExcel->getActiveSheet()->setTitle('Reinandus');

$table = array(
    array('label' => __('id'), 'filter' => true),
    array('label' => __('nome'), 'filter' => true),
    array('label' => __('referencia'),'filter' => true),
    array('label' => __('valor'), 'width' => 50, 'wrap' => true, 'filter' => true),
    array('label' => __('Modified'), 'filter' => true)
);

$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

foreach ($posts as $d) {
    $this->PhpExcel->addTableRow(array(
        $d['Enumerado']['id'],
        $d['Enumerado']['nome'],
        $d['Enumerado']['referencia'],
        $d['Enumerado']['valor'],
        $d['Enumerado']['modified']
    ));
}

$this->PhpExcel->addTableFooter()
    ->output();

?>