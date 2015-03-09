<?php

App::uses('Component', 'Controller');

class ConexaoFirebirdComponent extends Component {

	var $CaminhoBanco;
	private static $Usuario = 'SYSDBA';
	private static $Senha = 'masterkey';
	var $Conexao;
	var $Consulta;
    
	public function setCaminhoBanco($parametro) {
		$this->CaminhoBanco = $parametro;
    }

	public function getCaminhoBanco() {
		return $this->CaminhoBanco;
	}

	public function Conectar() {
		//if (!($this->Conexao = ibase_connect($this->CaminhoBanco, $this->Usuario, $this->Senha)))
		if (!($this->Conexao = ibase_connect($this->CaminhoBanco, self::$Usuario, self::$Senha)))
			die('Erro ao conectar: ' . ibase_errmsg());
	}

	public function ConsultarSQL($sql) {
		$this->Consulta = ibase_query($this->Conexao,$sql) or die(ibase_errmsg());
		return $this->Consulta;

	}

	public function getConexao() {
		return $this->Conexao;
	}

	/*public function __construct()
	{
		echo 'A classe "', __CLASS__, '" foi instanciada!<br />';
	}*/

	public function __destruct()
	{
		ibase_free_result();
		ibase_close($this->Conexao) or die("<br>" . ibase_errmsg());
	 	//echo 'A classe "', __CLASS__, '" foi destruida.<br />';
	}

}

?>


