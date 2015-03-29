<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarDetalhesComponent extends ImportadorBaseComponent {

	public function PassaValores($parametro) {

		$dados = [];
		$dados['aluno_id'] = $this->VerificarAlunoExiste($parametro['ALUCOD']);
		$dados['foto1'] = $parametro['FOTO'];
		$dados['ocorrencias'] = $this->FormatarValorEncode($parametro['OCORRENCIAS']);
		$dados['hist_escolar'] = $this->FormatarValorEncode($parametro['HISTESCOLAR']);
		$dados['neg_financeira'] = $this->FormatarValorEncode($parametro['NEGFINANCEIRA']);
		$dados['egresso'] = $this->FormatarValorEncode($parametro['EGRESSO']);

		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Detalhe');
		$this->setSqlConsulta(
			'Select TAluno.AluCod, coalesce(TAlunoFoto.AluFoto, TAluno.AluFoto) as Foto,
			CAST(ALUOCORRENCIAS AS VARCHAR(4000)) AS OCORRENCIAS,
			CAST(ALUHISTESCOLAR AS VARCHAR(4000)) AS HISTESCOLAR,
			CAST(ALUNEGFINANCEIRA AS VARCHAR(4000)) AS NEGFINANCEIRA,
			CAST(ALUEGRESSO AS VARCHAR(4000)) AS EGRESSO
			from TAluno
			left join TAlunoFoto on TAlunoFoto.AluCod = Taluno.AluCod');
		$this->setCheckBox('AlunoFoto');
		$this->CarregarArrayDeAlunos();
	}

}

?>


