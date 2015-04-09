<?php

App::uses('Component', 'Controller/Component');
App::import('Controller/Component/Importador', 'ImportadorBaseComponent');

class ImportarAlunosComponent extends ImportadorBaseComponent {

	var $Cursos;

	public function PassaValores($parametro) {

		$dados = [];
		$dados['id'] = $parametro['ALUCOD'];
		$dados['nome'] = $this->FormatarValorEncode($parametro['ALUNOME']);
		$dados['endereco'] = $this->FormatarValorEncode($parametro['ALUENDERECO']);
		$dados['numero'] = '';
		$dados['bairro'] = $this->FormatarValorEncode($parametro['ALUBAIRRO']);
		$dados['cidade_id'] = $this->VerificarCidadeExiste($parametro['ALUCIDADE']);
		$dados['cep'] = $this->FormatarValorEncode($parametro['ALUCEP']);
		$dados['residencial'] = $this->FormatarValorEncode($parametro['ALUFONE']);
		$dados['comercial'] = $this->FormatarValorEncode($parametro['ALUFAX']);
		$dados['celular'] = $this->FormatarValorEncode($parametro['ALUCELULAR']);
		$dados['email'] = $this->FormatarValorEncode($parametro['ALUEMAIL']);
		$dados['email_alt'] = $this->FormatarValorEncode($parametro['ALUEMAILALT']);
		$dados['cpf'] = $this->FormatarValorEncode($parametro['ALUCPF']);
		$dados['rg'] = $this->FormatarValorEncode($parametro['ALUIDENTIDADE']);
		$dados['emitir_carteirinha'] = $this->FormatarValorEncode($parametro['ALUCARTEIRA']);
		$dados['nacionalidade'] = $this->FormatarValorEncode($parametro['ALUNACIONALIDADE']);
		$dados['data_nascimento'] = $parametro['ALUNASCIMENTO'];
		$dados['naturalidade_id'] = $this->VerificarCidadeExiste($parametro['ALUNATURALIDADE']);
		$dados['orgao_expedidor'] = $this->FormatarValorEncode($parametro['ALUORGAOEXPEDIDOR']);
		$dados['data_expedicao'] = $this->FormatarValorEncode($parametro['ALUDATAEXPEDICAO']);
		$dados['sexo'] = $this->FormatarValorEncode($parametro['ALUSEXO']);
		$dados['nome_mae'] = $this->FormatarValorEncode($parametro['ALUNOMEMAE']);
		$dados['nome_pai'] = $this->FormatarValorEncode($parametro['ALUNOMEPAI']);
		$dados['curso_id'] =  is_null($parametro['ALUCURSO']) ? 0 : $parametro['ALUCURSO']; //$this->FormatarValorEncode($parametro['ALUCURSO']);
		$dados['professor_id'] = $this->FormatarValorEncode($parametro['ALUORIENTADOR']);
		$dados['entregou_cpf'] = $parametro['ALUENTREGOUCPF'];
		$dados['entregou_diploma'] = $parametro['ALUENTREGOUDIPLOMA'];
		$dados['entregou_rg'] = $parametro['ALUENTREGOURG'];
		$dados['bolsa'] = $parametro['ALUBOLSA'];
		$dados['cpf'] = $parametro['ALUCPF'];
		$dados['indicacao_nome'] = ''; //$this->FormatarValorEncode($parametro['']);
		$dados['mono_titulo'] = $this->FormatarValorEncode($parametro['ALUMONOTITULO']);
		$dados['senha'] = $this->FormatarValorEncode($parametro['ALUSENHA']);
		$dados['curso_inicio'] = $parametro['ALUCURSOINICIO'];
		$dados['curso_fim'] = $parametro['ALUCURSOFIM'];
		$dados['indicacao_valor'] = $parametro['ALUINDICACAOVALOR'];
		$dados['mono_data'] = $parametro['ALUMONODATA'];
		$dados['mono_nota'] = $parametro['ALUMONONOTA'];
		$dados['indicacao_pago'] = $parametro['ALUINDICACAOPAGO'];
		$dados['bloqueado'] = $parametro['ALUBLOQ'];
		$dados['bloqueado_data'] = $parametro['ALUBLOQDATA'];
		$dados['desconto'] = $parametro['ALUDESCONTO'];
		$dados['mono_prazo'] = $parametro['ALUDATAPENDMONO'];
		$dados['pesquisa'] = $parametro['ALUPESQUISA'];
		$dados['cert_solicitado'] = $parametro['ALUCERTSOLICITADO'];
		$dados['cert_entrega'] = $parametro['ALUCERTENTREGA'];
		$dados['situacao_id'] =  $this->TratarSituacao($this->FormatarValorEncode($parametro['ALUSITUACAO']));
		$dados['estado_civil_id'] =  $this->TratarEstadoCivil($this->FormatarValorEncode($parametro['ALUESTADOCIVIL']));
		//$dados['indicacao_id'] = '';
		$responsavel_cpf = $this->FormatarValorEncode($parametro['ALURESPONSAVELCPF']);
		if (! $responsavel_cpf == '') {
			if ($this->FormatarValorEncode($parametro['ALURESPONSAVEL'] == 'Pai'))
				$responsavel = $dados['nome_pai'];
			else
				$responsavel = $dados['nome_mae'];
			$dados['responsavel_id'] = $this->CadastrarResponsavel($responsavel_cpf, $responsavel, $dados);
		}
		$this->SalvarDados($dados);
	}

	public function Configurar() {
		$this->setModel('Aluno');
		$UltimoCodigoDeLancamentoImportador = 0; //$this->PegarUltimoCodigoDeLancamentoImportado();
		$this->setSqlConsulta('Select * from TAluno where AluCod >= ' . $UltimoCodigoDeLancamentoImportador . ' order by AluCod');
		$this->setCheckBox('Alunos');
		$this->CarregarArrayDeCidades();
		$this->CarregarArrayDeCursos();
	}

	private function CarregarArrayDeCursos() {
		$Curso = ClassRegistry::init('Curso');
		$this->Cursos = $Curso->find('list', array('fields' => 'id', 'order' => 'id'));
	}

	private function VerificarCursoExiste($parametro) {
		if (in_array($parametro, $this->Cursos) || (! is_null($parametro))) 
			return $parametro;
		else {
			return $this->Cursos[1];
		}
	}

	private function TratarSituacao($parametro) {
		switch ($parametro) {
			case 'Ativo': return 7; break;
			case 'Desistente': return 9; break;
			case 'Outro': return 12; break;
			case 'Pendente Matrícula': return 15; break;
			case 'Pendente Monografia': return 8; break;
			case 'Suspenso Temporariamente': return 10; break;
			case 'Transferido': return 11; break;
			case 'Término de Curso Extensão': return 15; break;
			case 'Término do Curso': return 14; break;
			default: return 12;
		}
	}

	private function TratarEstadoCivil($parametro) {
		switch ($parametro) {
			case 'Amasiado(a)': return 6; break;
			case 'Amigo(a)': return 3; break;
			case 'Casado(a)': return 1; break;
			case 'Divorciado(a)': return 2; break;
			case 'Separado(a)': return 4; break;
			case 'Solteiro(a)': return 3; break;
			case 'Viuvo(a)': return 5; break;
			case 'Viúvo(a)': return 5; break;
			default: return 3;
		}
	}

	private function CadastrarResponsavel($responsavel_cpf, $responsavel, $dados) {

		$cadastro = [];
		$cadastro['pessoa'] = 'F';
		$cadastro['fantasia'] = $responsavel;
		$cadastro['razaosocial'] = $responsavel;
		$cadastro['endereco'] = $dados['endereco'];
		$cadastro['bairro'] = $dados['bairro'];
		$cadastro['cidade_id'] = $dados['cidade_id'];
		$cadastro['cep'] = $dados['cep'];
		$cadastro['fone'] = $dados['residencial'];
		$cadastro['celular'] = $dados['celular'];
		$cadastro['email'] = $dados['email'];
		$cadastro['cnpjcpf'] = $responsavel_cpf;

		$Pessoa = ClassRegistry::init('Pessoa');
		$Pessoa->create();
		$Pessoa->save($cadastro);
		return $Pessoa->getLastInsertID();
	}
}

?>
