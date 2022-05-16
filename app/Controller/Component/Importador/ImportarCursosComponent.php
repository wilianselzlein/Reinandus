<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarCursosComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['CURCOD'];
		$dados['nome'] = $this->FormatarValorEncode($parametro['CURNOME']);
		$dados['nome'] = $this->TratarCampoEmBranco($dados, 'nome');
		$dados['professor_id'] = $parametro['CURCOORDENADOR'];
		$dados['turma'] = $parametro['CURTURMA'];
		$dados['carga'] = $parametro['CURCARGA'];
		$dados['valor'] = $this->FormatarValorNumerico($parametro['CURVALOR']);
		$dados['percentual'] = $this->FormatarValorNumerico($parametro['CURPERCDESCONTO']);
		$dados['desconto'] = $this->FormatarValorNumerico($parametro['CURDESCONTO']);
		$dados['liquido'] = $this->FormatarValorNumerico($parametro['CURLIQUIDO']);
		$dados['dia_vencimento'] = $parametro['CURVENCIMENTO'];
		$dados['inicio'] = $parametro['CURINICIO'];
		$dados['fim'] = $parametro['CURFIM'];
		$dados['sistema_aval'] = $this->FormatarValorEncode($parametro['CURSISTEMAAVALIACAO']);
		$dados['criterios_aval'] = $this->FormatarValorEncode($parametro['CURCRITERIOSAVALIACAO']);
		//$dados['pessoa_id'] =  1;
		$dados['sigla'] = $this->FormatarValorEncode($parametro['CURSIGLA']);
		$dados['site'] = $this->FormatarValorEncode($parametro['CURSITE']);
		$dados['monografia'] = $this->FormatarValorEncode($parametro['CURSITEMONOGRAFIA']);
		$dados['aviso'] = $this->FormatarValorEncode($parametro['CURSITEAVISO']);
		$dados['calendario'] = $this->FormatarValorEncode($parametro['CURSITECALENDARIO']);
		$dados['horario'] = $this->FormatarValorEncode($parametro['CURHORARIO']);
		$dados['num_turma'] = $this->FormatarValorEncode($parametro['CURNUMTURMA']);
		$dados['grupo_id'] =  $parametro['CURGRUPO'];
		$dados['tipo_id'] = 26; //$parametro['CURTIPO'];

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Curso');
		$UltimoCodigoDeLancamentoImportador = -1; //$this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select * from TCurso where CurCod >= ' . $UltimoCodigoDeLancamentoImportador . ' order by CurCod');
		$this->setCheckBox('Cursos');
	}

}

?>


