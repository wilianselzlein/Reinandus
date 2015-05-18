<?php 
App::uses('AppHelper', 'View/Helper'); 

class ContratosHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 
    var $pasta = 'contratos';

	private function CriarPastaSeNaoExistir() {
		if(! is_dir($this->pasta))
			mkdir($this->pasta, 0777);
	}

	public function PegarArquivosDeModelos($tipo) { 
		$modelos = [];
		$this->CriarPastaSeNaoExistir();
		if(is_dir($this->pasta)) {
			$diretorio = dir($this->pasta);
			while(($arquivo = $diretorio->read()) !== false) {
				if (($arquivo != '.') && ($arquivo != '..'))
					$modelos[$arquivo] = $arquivo;
			}
			$diretorio->close();
		} else {
			$modelos[] = 'A pasta ' . $this->pasta . ' dos contratos não existe.';
		}
		return $modelos;
	}
} 

?>