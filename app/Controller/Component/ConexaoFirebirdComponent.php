<?php

App::uses('Component', 'Controller');

class ConexaoFirebirdComponent extends Component {

	var $CaminhoBanco;
	var $Usuario = 'SYSDBA';
	var $Senha = 'masterkey';
    
	public function setCaminhoBanco($par) {
		$this->CaminhoBanco = $par;
    }

	public function getCaminhoBanco() {
		return $this->CaminhoBanco;
	}

	public function Conectar() {
		if (!($dbh=ibase_connect($CaminhoBanco, $Usuario, $Senha)))
			die('Erro ao conectar: ' . ibase_errmsg());
	}


}

/*
App::uses('PaginatorHelper', 'View/Helper');

Fazer uma consulta no banco:
//Instruções SQL$sql = ‘SELECT COLUNA1, COLUNA2 FROM TABELA’;
//Executa a instrução
SQL$query= ibase_query ($dbh, $sql); 
//gera um loop com as linhas encontradas
while ($row = ibase_fetch_object ($query)) { 
//imprimi as linhas na tela 
echo $row->COLUNA1 . “n”; } 
//Libera a memoria usada
ibase_free_result($query); 
//fecha conexão com o Firebird
ibase_close($dbh);
Um erro muito comum ao tentar fazer a conexão com o Firebird é a seguinte mensagem de erro;
Warning: ibase_connect() [function.ibase-connect]: Unable to
complete network request to host 127.0.0.1″. Failed to locate host
machine. The specified name was not found in the hosts file or Domain
Name Services.
Para resolver é bem simples: basta inserir 2 linhas no arquivo de configuração de serviços.
Vá ate o diretorio C:WindowsSystem32driversetc e abra o arquivo services, insira no final do arquivo as seguintes linhas:
gds_db 3050/tcp #firebird Databasegds_db 3050/udp #firebird Database


$res = ibase_connect($db,$user,$password) or die("<br>" . ibase_errmsg());
// Query
$sql = "SELECT * FROM Tabela";

$result = ibase_query($res,$sql) or die(ibase_errmsg()); 
while($row=ibase_fetch_object($result)){
// use $row->FIELDNAME not $row->fieldname
echo $row->FIELDNAME;
}

ibase_free_result($result);
// Closing
ibase_close($res) or die("<br>" . ibase_errmsg());


*/

?>


