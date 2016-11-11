<?php

App::uses('Component', 'Controller');

abstract class IntegracaoBaseComponent extends Component {

	var $Data;
	var $Empresa;
	var $Seq;

	abstract public function Cabecalho();
	abstract public function Mensalidades();
	abstract public function Totalizadores();
	abstract public function NomeDoArquivo();

	public function __construct($data) {
		$this->setData($data);
		set_time_limit(0);
		$this->Seq = 0;
		$this->CarregarDadosDaEmpresa();
	}

	public function setData($parametro) {
		$this->Data = $parametro;
	}

	public function FormatarNumero($numero, $tamanho){
		$numero = str_replace('.', '', $numero);
		$numero = str_replace(',', '', $numero);
		$numero = $this->VerificarTamanhoMaiorQueOCampo($numero, $tamanho);
		$numero = str_pad($numero, $tamanho, '0', STR_PAD_LEFT);
		return $numero;
	}

	public function FormatarTexto($texto, $tamanho){
		$texto = utf8_decode($texto);
		$texto = $this->TirarAcento($texto);
		$texto = $this->VerificarTamanhoMaiorQueOCampo($texto, $tamanho);
		$texto = str_pad($texto, $tamanho, ' ', STR_PAD_RIGHT);
		$texto = strtoupper($texto);
		//$texto = iconv('UTF-8', 'ISO-8859-1', $texto);
		//$texto = mb_convert_encoding($texto, 'ISO-8859-1', 'UTF-8');
		//$texto = utf8_encode($texto);
		//$texto = utf8_decode($texto);
		//$texto = $this->my_ucwords($texto);
		//$texto = mb_convert_encoding($texto, 'UTF-8');
		//$texto = mb_convert_encoding($texto, 'HTML-ENTITIES', 'UTF-8');
		//$texto = html_entity_decode($texto, ENT_COMPAT, 'UTF-8');
		//debug($texto); die;
		return $texto;
	}

	public function GerarArquivo() {
		$s = $this->Cabecalho() . $this->Mensalidades() . $this->Totalizadores();
		$s = utf8_encode($s);
		return $s;
	}

	protected function SequencialDoRegistro() {
		$this->Seq++;
		return $this->FormatarNumero($this->Seq, 6);
	}

	protected function CarregarDadosDaEmpresa() {
		$Consulta = ClassRegistry::init('instituto');
		$options = array('recursive' => $this->Recursive, 'conditions' => 
			array('instituto' . '.' . $Consulta->primaryKey => 1));
		//debug($options);
        $consulta = $Consulta->find('first', $options);

        $this->Empresa = $consulta['Empresa'];
        /*
		$Empresa = ClassRegistry::init('Pessoa');
		$options = array('recursive' => 1, 'conditions' => 
			array('Pessoa.' . $Empresa->primaryKey => $consulta['Empresa']['id']));
		$this->Empresa = $Empresa->find('first', $options);
		debug($this->Empresa); die;
		//$cidade = $consulta['Cidade']['nome'];*/
	}
	
	private function VerificarTamanhoMaiorQueOCampo($texto, $tamanho) {
		if (strlen($texto) > $tamanho)
			return substr($texto, 0, $tamanho);
		else
			return $texto;
	}

	protected function modulo_11($num, $base=7, $r=0) {
		$soma = 0;
		$fator = 2; 
		for ($i = strlen($num); $i > 0; $i--) {
			$numeros[$i] = substr($num,$i-1,1);
			$parcial[$i] = $numeros[$i] * $fator;
			$soma += $parcial[$i];
			if ($fator == $base) {
				$fator = 1;
			}
			$fator++;
		}
		if ($r == 0) {
			$soma *= 10;
			$digito = $soma % 11;
			
			if ($digito == 10) {
				$digito = "X";
			}
			
			if (strlen($num) == "43") {
				if ($digito == "0" or $digito == "X" or $digito > 9) {
						$digito = 1;
				}
			}
			return $digito;
		} 
		elseif ($r == 1){
			$resto = $soma % 11;
			return $resto;
		}
	}

	protected function FormatarCNPJ($cnpj) {
		$cnpj = str_replace('/', '', $cnpj);
		$cnpj = str_replace('.', '', $cnpj);
		return $this->FormatarNumero($cnpj,14);
	}

	protected function FormatarCPF($cpf) {
		$cpf = str_replace('.', '', $cpf);
		$cpf = str_replace('-', '', $cpf);
		return $this->FormatarNumero($cpf,14);
	}

	private function TirarAcento($texto) {
		//return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $texto ) );

		$map = array('á' => 'a','à' => 'a','ã' => 'a','â' => 'a','é' => 'e','ê' => 'e','í' => 'i','ó' => 'o','ô' => 'o','õ' => 'o','ú' => 'u','ü' => 'u','ç' => 'c','Á' => 'A','À' => 'A','Ã' => 'A','Â' => 'A','É' => 'E','Ê' => 'E','Í' => 'I','Ó' => 'O','Ô' => 'O','Õ' => 'O','Ú' => 'U','Ü' => 'U','Ç' => 'C');

		return  strtr($texto, $map);
		//return preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($texto));
	}

}

?>
