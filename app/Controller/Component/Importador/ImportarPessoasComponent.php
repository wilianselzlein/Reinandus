<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarPessoasComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['NETCOD'];
		$dados['fantasia'] = $this->FormatarValorEncode($parametro['NETNOME']);
		$dados['razaosocial'] = $this->FormatarValorEncode($parametro['NETNOME']);
		$dados['endereco'] = $this->FormatarValorEncode($parametro['NETENDERECO']);
		$dados['numero'] = '';
		$dados['bairro'] = $this->FormatarValorEncode($parametro['NETBAIRRO']);
		$dados['cidade_id'] = $this->VerificarCidadeExiste($parametro['NETCIDADE']);
		$dados['cep'] = $this->FormatarValorEncode($parametro['NETCEP']);
		$dados['fone'] = $this->FormatarValorEncode($parametro['NETFONE']);
		$dados['fax'] = $this->FormatarValorEncode($parametro['NETFAX']);
		$dados['celular'] = $this->FormatarValorEncode($parametro['NETCELULAR']);
		$dados['email'] = $this->FormatarValorEncode($parametro['NETEMAIL']);
		$dados['emailalt'] = $this->FormatarValorEncode($parametro['NETEMAIL2']);
		$dados['site'] = $this->FormatarValorEncode($parametro['NETSITE']);
		$dados['cnpjcpf'] = $this->FormatarValorEncode($parametro['NETCPF']);
		$dados['resumo'] = $this->FormatarValorEncode($parametro['NETRESUMO']);
		$dados['obs'] = $this->FormatarValorEncode($parametro['NETOBS']);
		$dados['empresa'] = $this->FormatarValorEncode($parametro['NETEMPRESA']);
		$dados['contato'] = $this->FormatarValorEncode($parametro['NETCONTATO']);
		$dados['ie'] = $parametro['NETIE'];
		$dados['im'] = $parametro['NETIM'];
		$dados['orgao'] = $this->FormatarValorEncode($parametro['NETORGAONOME1']);
		$dados['orgaonum'] = $this->FormatarValorEncode($parametro['NETORGAONUMERO1']);
		$dados['pessoa'] = $parametro['NETPESSOA'];
		$dados['ramo'] = $this->FormatarValorEncode($parametro['NETRAMOPRI']);
		$dados['secundario'] = $this->FormatarValorEncode($parametro['NETRAMOSEC']);
		$dados['fundacao'] = $parametro['NETDATAFUND'];
		$dados['juntacomercial'] = $this->FormatarValorEncode($parametro['NETJUNTACOMERC']);
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Pessoa');
		$UltimoCodigoDeLancamentoImportador = $this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select * from TNetworking where NetCod >= ' . $UltimoCodigoDeLancamentoImportador . ' order by NetCod');
		$this->setCheckBox('EmpresasPessoas');
		$this->CarregarArrayDeCidades();
	}

}

?>


