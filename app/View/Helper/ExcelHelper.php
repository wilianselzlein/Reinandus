<?php 
App::uses('AppHelper', 'View/Helper'); 

class ExcelHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	public function Exportar($PhpExcel, $posts) { 

		$PhpExcel->createWorksheet()->setDefaultFont('Arial', 12);
		$PhpExcel->setActiveSheetIndex(0);

		$PhpExcel->getProperties()->setCreator("Wilian Ivo Selzlein")
		                             ->setLastModifiedBy("Reinandus")
		                             ->setTitle("Reinandus Sistema")
		                             ->setSubject("Exportação Reinandus")
		                             ->setDescription("Exportação sistema Reinandus.")
		                             ->setKeywords("office reinandus openxml php cakephp")
		                             ->setCategory("Exportação Reinandus");

		$PhpExcel->getActiveSheet()->setTitle('Reinandus');
		$model = array_values(array_keys($posts[0]))[0];
		$columns = array_keys($posts[0][$model]);

		$table = [];
		foreach ($columns as $column) 
			$table[] = array('label' => __($column), 'filter' => true);

		/* $table = array(
		    array('label' => __('id'), 'filter' => true),
		    array('label' => __('nome'), 'filter' => true),
		    array('label' => __('referencia'),'filter' => true),
		    array('label' => __('valor'), 'width' => 50, 'wrap' => true, 'filter' => true),
		    array('label' => __('Modified'), 'filter' => true)
		); */

		$PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true));

		foreach ($posts as $d) {

			$table = [];
			foreach ($columns as $column) 
				$table[] = $d[$model][$column];

			$PhpExcel->addTableRow($table);

		    /*$PhpExcel->addTableRow(array(
		        $d['Enumerado']['id'],
		        $d['Enumerado']['nome'],
		        $d['Enumerado']['referencia'],
		        $d['Enumerado']['valor'],
		        $d['Enumerado']['modified']
		    ));*/
		}

		$PhpExcel->addTableFooter()
		    ->output();
	}
} 

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

?>