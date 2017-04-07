<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versao Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo esta disponivel sob a Licenca GPL disponivel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voce deve ter recebido uma copiada GNU Public License junto com      |
// | esse pacote; se nao, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaboracoes de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Joao Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenacao Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Itau: Glauber Portella		                  |
// +----------------------------------------------------------------------+


$codigobanco = "341";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//agencia  4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta  5 digitos + 1 do dv
$conta = formata_numero($dadosboleto["conta"],5,0);
$conta_dv = formata_numero($dadosboleto["conta_dv"],1,0);

$carteira = $dadosboleto["carteira"];
//$carteira = 157;

//nosso_numero no maximo 8 digitos
$nnum = formata_numero($dadosboleto["nosso_numero"],8,0);
//$nnum = 48115957000;
//$fator_vencimento = 7020;
//$valor = '0000000222';
$dac1 = modulo_10($agencia.$conta.$carteira.substr($nnum,0,8));
//debug(substr($nnum,0,8));
//$dac1 = modulo_10($carteira.substr($nnum,0,8));
//debug($dac1);
$dac2 = modulo_10($agencia.$conta);
//debug($dac2); //die;
$codigo_barras = $codigobanco.$nummoeda.$fator_vencimento.$valor.$carteira.substr($nnum,0,8).$dac1.$agencia.$conta.$dac2.'000';
// 43 numeros para o calculo do digito verificador
//$codigo_barras = '3419166700000123451101234567880057123457000';
//$codigo_barras = '3419702000000002221574811595718616271717000';


$dv = digitoVerificador_barra($codigo_barras);

$codigo_barras = $codigobanco.$nummoeda.$fator_vencimento.$valor.$carteira.$nnum.$dac1.$agencia.$conta.$dac2.'000';
$codigo_barras1 = $codigobanco.$nummoeda.$dv.$fator_vencimento.$valor.$carteira.substr($nnum,0,8).$dac1.$agencia.$conta.$dac2.'000';
// Numero para o codigo de barras com 44 digitos
$linha = substr($codigo_barras,0,4).$dv.substr($codigo_barras,4,43);

//debug($codigo_barras1); 

/*3419X[7184]0000043750|109|00061720|1|8616|271717|000
34194718400000437501090006172018616271717000
34194718400000437501090006172000018616271717000

34191.09008 06172.018613 62717.170005 4 71840000043750

-01 a 03 03 9(03) Código do Banco na Câmara de Compensação = '341'
-04 a 04 01 9(01) Código da Moeda = '9'
05 a 05 01 9(01) DAC código de Barras (Anexo 2)
--06 a 09 04 9(04) Fator de Vencimento (Anexo 6)
--10 a 19 10 9(08)V(2) Valor
--20 a 22 03 9(03) Carteira
--23 a 30 08 9(08) Nosso Número
31 a 31 01 9(01) DAC [Agência /Conta/Carteira/Nosso Número] (Anexo 4)
32 a 35 04 9(04) N.º da Agência BENEFICIÁRIO
36 a 40 05 9(05) N.º da Conta Corrente
41 a 41 01 9(01) DAC [Agência/Conta Corrente] (Anexo 3)
42 a 44 03 9(03) Zeros
*/
$nossonumero = $carteira.'/'.$nnum.'-'.modulo_10($agencia.$conta.$carteira.substr($nnum,0,8));
$agencia_codigo = $agencia." / ". $conta."-".modulo_10($agencia.$conta);

$dadosboleto["codigo_barras"] = $codigo_barras1;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha); // verificar
$dadosboleto["agencia_codigo"] = $agencia_codigo ;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;


// FUNCOES
// Algumas foram retiradas do Projeto PhpBoleto e modificadas para atender as particularidades de cada banco

function digitoVerificador_barra($numero) {
	$resto2 = modulo_11($numero);
	$digito = 11 - $resto2;
     if ($digito == 0 || $digito == 1 || $digito == 10  || $digito == 11) {
        $dv = 1;
     } else {
        $dv = $digito;
     }
	 return $dv;
}

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "valor") {
		/*
		retira as virgulas
		formata o numero
		preenche com zeros
		*/
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "convenio") {
		while(strlen($numero)<$loop){
			$numero = $numero . $insert;
		}
	}
	return $numero;
}


function fbarcode($valor){

$fino = 1 ;
$largo = 3 ;
$altura = 50 ;

  $barcodes[0] = "00110" ;
  $barcodes[1] = "10001" ;
  $barcodes[2] = "01001" ;
  $barcodes[3] = "11000" ;
  $barcodes[4] = "00101" ;
  $barcodes[5] = "10100" ;
  $barcodes[6] = "01100" ;
  $barcodes[7] = "00011" ;
  $barcodes[8] = "10010" ;
  $barcodes[9] = "01010" ;
  for($f1=9;$f1>=0;$f1--){ 
    for($f2=9;$f2>=0;$f2--){  
      $f = ($f1 * 10) + $f2 ;
      $texto = "" ;
      for($i=1;$i<6;$i++){ 
        $texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
      }
      $barcodes[$f] = $texto;
    }
  }


//Desenho da barra


//Guarda inicial
?><img src=img/p.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=img/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=img/p.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=img/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
<?php
$texto = $valor ;
if((strlen($texto) % 2) <> 0){
	$texto = "0" . $texto;
}

// Draw dos dados
while (strlen($texto) > 0) {
  $i = round(esquerda($texto,2));
  $texto = direita($texto,strlen($texto)-2);
  $f = $barcodes[$i];
  for($i=1;$i<11;$i+=2){
    if (substr($f,($i-1),1) == "0") {
      $f1 = $fino ;
    }else{
      $f1 = $largo ;
    }
?>
    src=img/p.png width=<?php echo $f1?> height=<?php echo $altura?> border=0><img 
<?php
    if (substr($f,$i,1) == "0") {
      $f2 = $fino ;
    }else{
      $f2 = $largo ;
    }
?>
    src=img/b.png width=<?php echo $f2?> height=<?php echo $altura?> border=0><img 
<?php
  }
}

// Draw guarda final
?>
src=img/p.png width=<?php echo $largo?> height=<?php echo $altura?> border=0><img 
src=img/b.png width=<?php echo $fino?> height=<?php echo $altura?> border=0><img 
src=img/p.png width=<?php echo 1?> height=<?php echo $altura?> border=0> 
  <?php
} //Fim da funcao

function esquerda($entra,$comp){
	return substr($entra,0,$comp);
}

function direita($entra,$comp){
	return substr($entra,strlen($entra)-$comp,$comp);
}

function fator_vencimento($data) {
	$data = explode("/",$data);
	$ano = $data[2];
	$mes = $data[1];
	$dia = $data[0];
    return(abs((_dateToDays("1997","10","07")) - (_dateToDays($ano, $mes, $dia))));
}

function _dateToDays($year,$month,$day) {
    $century = substr($year, 0, 2);
    $year = substr($year, 2, 2);
    if ($month > 2) {
        $month -= 3;
    } else {
        $month += 9;
        if ($year) {
            $year--;
        } else {
            $year = 99;
            $century --;
        }
    }
    return ( floor((  146097 * $century)    /  4 ) +
            floor(( 1461 * $year)        /  4 ) +
            floor(( 153 * $month +  2) /  5 ) +
                $day +  1721119);
}

function modulo_10($num) { 
		$numtotal10 = 0;
        $fator = 2;

        // Separacao dos numeros
        for ($i = strlen($num); $i > 0; $i--) {
            // pega cada numero isoladamente
            $numeros[$i] = substr($num,$i-1,1);
            // Efetua multiplicacao do numero pelo (falor 10)
            // 2002-07-07 01:33:34 Macete para adequar ao Mod10 do Itau
            $temp = $numeros[$i] * $fator; 
            $temp0=0;
            foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v){ $temp0+=$v; }
            $parcial10[$i] = $temp0; //$numeros[$i] * $fator;
            // monta sequencia para soma dos digitos no (modulo 10)
            $numtotal10 += $parcial10[$i];
            if ($fator == 2) {
                $fator = 1;
            } else {
                $fator = 2; // intercala fator de multiplicacao (modulo 10)
            }
        }
		
        // varias linhas removidas, vide funcao original
        // Calculo do modulo 10
        $resto = $numtotal10 % 10;
        $digito = 10 - $resto;
        if ($resto == 0) {
            $digito = 0;
        }
		
        return $digito;
		
}

function modulo_11($num, $base=9, $r=0)  {
    /**
     *   Autor:
     *           Pablo Costa <pablo@users.sourceforge.net>
     *
     *   Funcao:
     *    Calculo do Modulo 11 para geracao do digito verificador 
     *    de boletos bancarios conforme documentos obtidos 
     *    da Febraban - www.febraban.org.br 
     *
     *   Entrada:
     *     $num: string numerica para a qual se deseja calcularo digito verificador;
     *     $base: valor maximo de multiplicacao [2-$base]
     *     $r: quando especificado um devolve somente o resto
     *
     *   Saida:
     *     Retorna o Digito verificador.
     *
     *   Observacoes:
     *     - Script desenvolvido sem nenhum reaproveitamento de codigo persistente
     */                                        

    $soma = 0;
    $fator = 2;

    /* Separacao dos numeros */
    for ($i = strlen($num); $i > 0; $i--) {
        // pega cada numero isoladamente
        $numeros[$i] = substr($num,$i-1,1);
        // Efetua multiplicacao do numero pelo falor
        $parcial[$i] = $numeros[$i] * $fator;
        // Soma dos digitos
        $soma += $parcial[$i];
        if ($fator == $base) {
            // restaura fator de multiplicacao para 2 
            $fator = 1;
        }
        $fator++;
    }

    /* Calculo do modulo 11 */
    if ($r == 0) {
        //$soma *= 10;
        $digito = $soma % 11;
        if ($digito == 10) {
            $digito = 0;
        }
        return $digito;
    } elseif ($r == 1){
        $resto = $soma % 11;
        return $resto;
    }
}

// Alterada por Glauber Portella para especificacao do Itau
function monta_linha_digitavel($codigo) {
		// campo 1
        $banco    = substr($codigo,0,3);
        $moeda    = substr($codigo,3,1);
        $ccc      = substr($codigo,19,3);
		$ddnnum   = substr($codigo,22,2);
		$dv1      = modulo_10($banco.$moeda.$ccc.$ddnnum);
		// campo 2
		$resnnum  = substr($codigo,24,5);
		$resnnum2 = substr($codigo,29,1);
        $dac1     = substr($codigo,33,1);//modulo_10($agencia.$conta.$carteira.$nnum);
		$dddag    = substr($codigo,34,3);
        $dddag2   = substr($codigo,37,1);

		$dv2      = modulo_10($resnnum.$resnnum2.$dac1.$dddag);
    
		// campo 3
		$resag    = substr($codigo,37,1);
		$contadac = substr($codigo,38,6); //substr($codigo,35,5).modulo_10(substr($codigo,35,5));
		$zeros    = substr($codigo,44,3);
		$dv3      = modulo_10($resag.$contadac.$zeros);

		// campo 4
		$dv4      = substr($codigo,4,1);
		// campo 5
        $fator    = substr($codigo,5,4);
        $valor    = substr($codigo,9,10);
		
        $campo1 = substr($banco.$moeda.$ccc.$ddnnum.$dv1,0,5) . '.' . substr($banco.$moeda.$ccc.$ddnnum.$dv1,5,5);
        $campo2 = substr($resnnum.$dac1.$dddag.$dv2,0,5) . '.' . substr($resnnum2.$dac1.$dddag.$dv2,0,6);
        $campo3 = substr($resag.$contadac.$zeros.$dv3,0,5) . '.' . substr($resag.$contadac.$zeros.$dv3,5,6);
        $campo4 = $dv4;
        $campo5 = $fator.$valor;
		
        return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
}

function geraCodigoBanco($numero) {
    $parte1 = substr($numero, 0, 3);
    $parte2 = modulo_11($parte1);
    return $parte1 . "-" . $parte2;
}

?>