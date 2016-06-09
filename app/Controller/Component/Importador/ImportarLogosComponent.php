<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarLogosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$cod =  $parametro['NETCOD'];
		$dados['id'] = $cod;
		$dados['pessoa_id'] = $cod;
		$dados['logo'] = 'logo' . $cod . '.jpg';
		//debug($dados); die;
		//update logo set logo = concat('logo', pessoa_id, '.jpg');
		
		/*$file = '/var/tmp/logo' . $parametro["NETCOD"] . '.jpg';
        $url = 'http://intranet.iepg.edu.br:8081/logo.php?c=' . $parametro['NETCOD'];
        $url = 'http://192.168.2.251:8081/logo.php?c=' . $parametro['NETCOD'];
		$url = 'http://localhost:8081/logo.php?c=' . $parametro['NETCOD'];*/
		//$url = 'http://localhost:8081/teste.php';

		/*$data = file_get_contents($url);
        $imagem = mysql_real_escape_string($data);*/

		/*$con = ibase_connect('192.168.2.250:/BANCO/BANCO.FDB', 'SYSDBA', 'masterkey');
   		$qry = "select NETLOGO from TNETWORKING WHERE NETCOD = " . $parametro['NETCOD'];
   		$res = ibase_query($con, $qry);
   		$reg = ibase_fetch_assoc($res, IBASE_TEXT);

   		$conteudo_blob = $reg["NETLOGO"];
   		echo $conteudo_blob; die;

   		$img_blob = imagecreatefromstring($conteudo_blob);
   		echo $img_blob; die;*/

		//$imagem = file_get_contents($url,FALSE,NULL,0,20);
		//file_put_contents($file, $imagem);

		/*$imagem = $this->url_get_contents($url);
	    $fp = fopen($file, 'w');
    	fwrite($fp, $imagem);
    	fclose($fp);*/

		/*$ch = curl_init($url);
		$imagem = '';
		$fp = fopen($file, 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);*/

		/*$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$data = curl_exec($curl);
		$imagem = $data;
		curl_close($curl);
		debug($data); die;*/

		/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$out = curl_exec($ch);
		debug($out); die;
		curl_close($ch);
		$imagem = imagecreatefromstring($out);
		imagejpeg($imagem, $file, 70);*/

		//$dados['imagem'] = $imagem;
		//$dados['imagem'] = $parametro['NETLOGO'];

		$this->SalvarDados($dados);
	}

	/*function url_get_contents ($Url) { 
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!'); 
		} 
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $Url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$output = curl_exec($ch); 
		curl_close($ch); 
		return $output; 
	}*/

	public function Configurar() {
		$this->setModel('Logo');
		$this->setSqlConsulta(
			'Select TNetworking.NetCod, TNetworking.NetLogo
			from TNetworking
			where NetLogo is not null');
		$this->setCheckBox('Logo');
	}

}

?>


