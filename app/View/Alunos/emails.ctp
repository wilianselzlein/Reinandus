<?php
	foreach ($situacoes as $situacao) {
		echo $this->element('emails', 
			array("emails" => $situacao['Situacao']['emails'], "titulo" => $situacao['Situacao']['valor']));
	}
?>