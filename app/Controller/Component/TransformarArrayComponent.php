<?php

App::uses('Component', 'Controller');

class TransformarArrayComponent extends Component {

	public function FindInContainable($principal, $array) {
		$resultado = [];
        $indice = 0;
		foreach ($array as $parte) {
			$resultado[$principal][] = $parte[$principal];
			foreach ($parte as $chave => $elemento) {
				if ($chave != $principal)
					$resultado[$principal][$indice][$chave] = $parte[$chave];
			}
			$indice++;
		}
		return $resultado;
    }

}

?>
