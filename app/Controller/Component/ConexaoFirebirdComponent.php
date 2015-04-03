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
		if (!($this->Conexao = ibase_connect($this->CaminhoBanco, self::$Usuario, self::$Senha, 'PT_BR', 512, 3)))
			die('Erro ao conectar: ' . ibase_errmsg());
	}

	public function ConsultarSQL($sql) {
		$this->Consulta = ibase_query($this->Conexao,$sql) or die(ibase_errmsg());
		return $this->Consulta;

	}

	public function getConexao() {
		return $this->Conexao;
	}

	public function __destruct()
	{
		if (! is_null($this->Consulta))
			ibase_free_result($this->Consulta);
		ibase_close($this->Conexao) or die("<br>" . __CLASS__ . " " . ibase_errmsg());
	}

}

?>


