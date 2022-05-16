<?php 
//header("Content-type: application/pdf"); 
$this->response->type('application/pdf');
//$this->response->header(array('Content-type: application/pdf'));
echo $content_for_layout; 
