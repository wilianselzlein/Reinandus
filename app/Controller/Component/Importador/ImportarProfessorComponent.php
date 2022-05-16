<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarProfessorComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['PROCOD'];
		$dados['nome'] = $this->FormatarValorEncode($parametro['PRONOME']);
		$dados['nome'] = $this->TratarCampoEmBranco($dados, 'nome');
		$dados['endereco'] = $this->FormatarValorEncode($parametro['PROENDERECO']);
		$dados['numero'] = '';
		$dados['bairro'] = $this->FormatarValorEncode($parametro['PROBAIRRO']);
		$dados['cidade_id'] = $this->VerificarCidadeExiste($parametro['PROCIDADE']);
		$dados['cep'] = $this->FormatarValorEncode($parametro['PROCEP']);
		$dados['fone'] = $this->FormatarValorEncode($parametro['PROFONE']);
		$dados['fax'] = $this->FormatarValorEncode($parametro['PROFAX']);
		$dados['celular'] = $this->FormatarValorEncode($parametro['PROCELULAR']);
		$dados['email'] = $this->FormatarValorEncode($parametro['PROEMAIL']);
		$dados['email_alt'] = $this->FormatarValorEncode($parametro['PROEMAIL2']);
		$dados['cpf'] = $this->FormatarValorEncode($parametro['PROCPF']);
		$dados['notafiscal'] = $this->FormatarValorEncode($parametro['PRONOTAFISCAL']);
		$dados['obs'] = $this->FormatarValorEncode($parametro['PROOBS']);
		$dados['curriculum'] = $this->FormatarValorEncode($parametro['PROCURRICULUM']);
		$dados['titulacao'] = $this->FormatarValorEncode($parametro['PROTITULACAO']);
		$dados['formacao'] = $this->FormatarValorEncode($parametro['PROFORMACAO']);
		$dados['dadosfin'] = $this->FormatarValorEncode($parametro['PRODADOSFIN']);
		$dados['resumo_titulacao_id'] = $this->TratarTitulacao($this->FormatarValorEncode($parametro['PRORESUMOTITULACAO']));
		$dados['lattes'] = $this->FormatarValorEncode($parametro['PROCURRICULUMLATTES']);
		$dados['vinculo'] = $parametro['PROVINCULO'];
		$dados['rg'] = $this->FormatarValorEncode($parametro['PROIDENTIDADE']);
		$dados['senha'] = $dados['cpf'];
		
		$this->SalvarDados($dados);
	}

	private function TratarTitulacao($parametro) {
		switch ($parametro) {
			case 'Graduado(a)': return 77; break;
			case 'Mestre(a)': return 78; break;
			case 'Doutor(a)': return 79; break;
			case 'Pós-Doutor(a)': return 80; break;
			case 'Especialista': return 81; break;
			default: return 78;
		}
	}

	public function Configurar() {
		$this->setModel('Professor');
		$UltimoCodigoDeLancamentoImportador = 0; //$this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select ' .
			'PROCOD, PRONOME, PROENDERECO, PROBAIRRO, PROCIDADE, PROCEP, PROFONE, PROFAX, PROCELULAR, PROEMAIL, ' . 
			'PROEMAIL2, PROCPF, PRONOTAFISCAL, PRORESUMOTITULACAO, PROCURRICULUMLATTES, PROVINCULO, PROIDENTIDADE, ' .
			'CAST(PROOBS AS VARCHAR(200)) AS PROOBS, CAST(PROCURRICULUM AS VARCHAR(4000)) AS PROCURRICULUM, ' . 
			'CAST(PRODADOSFIN AS VARCHAR(400)) AS PRODADOSFIN, CAST(PROFORMACAO AS VARCHAR(250)) AS PROFORMACAO, ' .
			'CAST(PROTITULACAO AS VARCHAR(400)) AS PROTITULACAO ' . 
			'from TProfessor where ProCod >= ' . $UltimoCodigoDeLancamentoImportador . ' order by ProCod');
		$this->setCheckBox('Professor');
		$this->CarregarArrayDeCidades();
	}

}

?>


