<?php

App::uses('Component', 'Controller');
//App::import('Controller/Component/DecoratorFormatador', 
//	array('FormatarEncode', 'FormatarMinusculo', 'FormatarHumanize', 'FormatarRetirar', 'FormatarMaiusculo'));

class CarregarConsultasBaseComponent extends Component {

    var $Id;
	var $Texto;
	var $Contrato;
	var $Data;
	var $Recursive = -1;

	public function __construct(&$contrato, $id, $model) {
		$this->Contrato = $contrato;
		$this->Id = $id;
		$this->Texto = $model;
		//$this->Data = [];
		//if ($this->VerificarConsultaNecessaria()) {
			$this->Data = $this->Consultar();
			if (isset($this->Data[$this->Model()]))
			    $this->Data = $this->Data[$this->Model()];
		//}
		$this->SubstituirTags();
		$contrato = $this->Contrato;
		//return $this->Data;
	}

	private function VerificarConsultaNecessaria() {
		return true; //(boolean) strpos($this->Contrato, ':' . $this->Texto);
	}

	protected function SubstituirTags() {
		//debug($this->Data); die;

		foreach ($this->Data as $campo => $valor) {
			$tag = ':' . $this->Texto . '_' . $campo;
			//debug($tag . '=' . $valor . ' - ' . $campo);
			if ($campo == 'senha')
			    $valor = str_replace('/', '', $this->Data['data_nascimento']);

            //ini_set('default_charset', 'UTF-8');
            //$valor = iconv('UTF-8', 'ISO-8859-1', $valor);
            //$valor = mb_convert_encoding($valor, 'ISO-8859-1', 'UTF-8');
            //$valor = utf8_encode($valor);
            $valor = utf8_decode($valor);
            $valor = $this->TirarAcento($valor);
            //$valor = $this->my_ucwords($valor);
            //$valor = mb_convert_encoding($valor, 'UTF-8');
            //$valor = mb_convert_encoding($valor, 'HTML-ENTITIES', 'UTF-8');
            //$valor = html_entity_decode($valor, ENT_COMPAT, 'UTF-8');
            //debug($valor);
            
            $this->Contrato = str_replace($tag, $valor, $this->Contrato);
		}
	}

	protected function Model() {
		return Inflector::camelize($this->Texto);
	}

	public function PegarValorCampo($campo) {
		if (isset($this->Data[$campo]))
			return $this->Data[$campo];
		else
			return 0;
	}

	protected function Consultar() {
		$Consulta = ClassRegistry::init($this->Model());
		$options = array('recursive' => $this->Recursive, 'conditions' => array($this->Model() . '.' . $Consulta->primaryKey => $this->Id));
		//debug($options);
        $consulta = $Consulta->find('first', $options);
        //array_shift($consulta);
		return $consulta;
	}

    private static function removerFormatacaoNumero( $strNumero )
    {
 
        $strNumero = trim( str_replace( "R$", null, $strNumero ) );
 
        $vetVirgula = explode( ",", $strNumero );
        if ( count( $vetVirgula ) == 1 )
        {
            $acentos = array(".");
            $resultado = str_replace( $acentos, "", $strNumero );
            return $resultado;
        }
        else if ( count( $vetVirgula ) != 2 )
        {
            return $strNumero;
        }
 
        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr( $vetVirgula[1], 0, 2 );
 
        $acentos = array(".");
        $resultado = str_replace( $acentos, "", $strNumero );
        $resultado = $resultado . "." . $strDecimal;
 
        return $resultado;
 
    }

	public static function ValorPorExtenso($valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false)
    {
 
        $valor = self::removerFormatacaoNumero( $valor );
 
        $singular = null;
        $plural = null;
 
        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
 
        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
 
 
        if ( $bolPalavraFeminina )
        {
 
            if ($valor == 1) 
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else 
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
 
 
            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
 
 
        }
 
 
        $z = 0;
 
        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );
 
        for ( $i = 0; $i < count( $inteiro ); $i++ ) 
        {
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ ) 
            {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }
 
        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
 
            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;
 
            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
 
            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }
 
        $rt = mb_substr( $rt, 1 );
 
        return($rt ? trim( $rt ) : "zero");
 
    }
    
    function my_ucwords($str) {
        mb_internal_encoding('UTF-8');
        $string = $str;
        return $this->ucwords_specific( mb_strtolower($string, 'UTF-8'), "-'");
    }

    function ucwords_specific ($string, $delimiters = '', $encoding = NULL) {
        if ($encoding === NULL) { 
            $encoding = mb_internal_encoding();
        }
        
        if (is_string($delimiters)) {
            $delimiters = str_split( str_replace(' ', '', $delimiters));
        }
        
        $delimiters_pattern1 = array();
        $delimiters_replace1 = array();
        $delimiters_pattern2 = array();
        $delimiters_replace2 = array();
        foreach ($delimiters as $delimiter) {
            $uniqid = uniqid();
            $delimiters_pattern1[] = '/'. preg_quote($delimiter) .'/';
            $delimiters_replace1[] = $delimiter.$uniqid.' ';
            $delimiters_pattern2[] = '/'. preg_quote($delimiter.$uniqid.' ') .'/';
            $delimiters_replace2[] = $delimiter;
        }
        
        // $return_string = mb_strtolower($string, $encoding);
        $return_string = $string;
        $return_string = preg_replace($delimiters_pattern1, $delimiters_replace1, $return_string);
        
        $words = explode(' ', $return_string);
        
        foreach ($words as $index => $word) {
            $words[$index] = mb_strtoupper(mb_substr($word, 0, 1, $encoding), $encoding).mb_substr($word, 1, mb_strlen($word, $encoding), $encoding);
        }
        
        $return_string = implode(' ', $words);
        
        $return_string = preg_replace($delimiters_pattern2, $delimiters_replace2, $return_string);
        
        return $return_string;
    }

    public function TirarAcento($texto) {
        //return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $texto ) );

        $map = array('á' => 'a','à' => 'a','ã' => 'a','â' => 'a','é' => 'e','ê' => 'e','í' => 'i','ó' => 'o','ô' => 'o','õ' => 'o','ú' => 'u','ü' => 'u','ç' => 'c','Á' => 'A','À' => 'A','Ã' => 'A','Â' => 'A','É' => 'E','Ê' => 'E','Í' => 'I','Ó' => 'O','Ô' => 'O','Õ' => 'O','Ú' => 'U','Ü' => 'U','Ç' => 'C');

        return strtr($texto, $map);
        //return preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($texto));
    }

}

?>
