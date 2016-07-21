<?php
	foreach ($cursos as $curso) {
		echo $this->element('emails', 
			array("emails" => $curso['Curso']['emails'], "titulo" => $curso['Curso']['nome'], "id" => 'sit' . $curso['Curso']['id']));
	}
?>