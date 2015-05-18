<?php

App::uses('Component', 'Controller');

class GeraContratoComponent extends Component {

	private static $pasta = 'contratos/';
	private static $modo_leitura = 'r';
	var $data;
    
	public function setData($parametro) {
		$this->data = $parametro['Contrato'];
		//"aluno_id":"1","formapgto_id":"1","conta_id":"1","obs":"","valor":"","desconto":""
		//"bolsa":"","liquido":"","quantidade":"","vencimento":"","modelo":"0"
    }

	public function Gerar() {
        $filename = self::$pasta . $this->data['modelo'];
        $fp = fopen($filename, self::$modo_leitura);
        $s = fread($fp,filesize($filename));
        fclose($fp);

        $s = str_replace(':nome', $this->data['aluno_id'] , $s);
        return $s;
	}

}

?>
