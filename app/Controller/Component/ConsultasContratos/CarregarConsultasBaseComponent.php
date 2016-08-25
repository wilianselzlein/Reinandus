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
            //$valor = iconv('UTF-8', 'ISO-8859-1', $valor);
            //$valor = mb_convert_encoding($valor, 'ISO-8859-1', 'UTF-8');
            //$valor = utf8_encode($valor);
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
}

?>


