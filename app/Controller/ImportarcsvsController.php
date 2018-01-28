<?php
App::uses('AppController', 'Controller');

/**
 * ImportarCsv Controller
 *
 * @property Importador $Importador
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ImportarcsvsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/** 
 * index method
 *
 * @return void
 */  
	 public function index() {}

/* *
 * importar method
 *
 * @return void
 */
	public function importar() {
        $file = fopen("arqs/Alunos.csv","r");
        
        $Detalhe = ClassRegistry::init('Detalhe');
        $Aluno = ClassRegistry::init('Aluno');
        $ids = '';
        
        while(! feof($file)) {
            $linha = fgetcsv($file, 0, ';');
            
            $nome = $linha[1];
            if ($nome == 'Nome:')
            	continue;

			$existe = $Aluno->findByNome($nome);
			if ($existe != null)
				continue;

            $dados = [];
    		//$dados['id'] = $parametro['ALUCOD'];
    		$dados['nome'] = $nome;
    		$dados['data_nascimento'] = $linha[2];
    		$dados['estado_civil_id'] =  $this->TratarEstadoCivil($linha[3]);
    		$dados['sexo'] = $linha[4][0];
    		$dados['nome_mae'] = $linha[5]; //curso
    		$dados['endereco'] = $linha[6];
    		$dados['numero'] = '';
    		$dados['bairro'] = $linha[7];
    		$dados['nome_pai'] = $linha[8]; //curso
    		$dados['cidade_id'] = 1; //
    		$dados['cep'] = $linha[10];
    		$dados['residencial'] = $linha[11];
            $dados['comercial'] = $linha[12];
    		$dados['celular'] = $linha[13];
    		$dados['email'] = $linha[14];
    		$dados['email_alt'] = $linha[15];
    		
    		$dados['nacionalidade'] = 'Brasileira';;
    		$dados['emitir_carteirinha'] = 1;
    		$dados['curso_id'] = 1;
    		$dados['entregou_cpf'] = 0;
    		$dados['entregou_diploma'] = 0;
    		$dados['entregou_rg'] = 0;
    		$dados['senha'] = $linha[2];
    		$dados['bloqueado'] = 0;
    		$dados['situacao_id'] = 15;
			
			$empresa = $linha[16];
    		$cargo = $linha[17];
    		$curso = $linha[18];
    		$nivel = $linha[19];
    		$ano = $linha[20];
    		$instituicao = $linha[21];
    		$sabendo = $linha[22];
    		$promocional = $linha[23];
    		
    		//debug($dados);
    		//die;

			try{
				$Aluno->create();
	    	    $Aluno->save($dados);
			} catch(Exception $e) {
				echo 'Erro na Importação: ' . $e->getMessage() . ' ' . var_dump($dados);
			}
			$id = $Aluno->getLastInsertID();
			$ids .= $id . ', ';
			
    		$dados = [];
			$dados['aluno_id'] = $id;
			$dados['ocorrencias'] = $empresa . ' ' . $cargo;
			$dados['hist_escolar'] = $curso . ' ' . $nivel . ' ' . $ano . ' ' . $instituicao;
			$dados['neg_financeira'] = $sabendo . ' ' . $promocional;

			try{
				$Detalhe->create();
	    	    $Detalhe->save($dados);
			} catch(Exception $e) {
				echo 'Erro na Importação: ' . $e->getMessage() . ' ' . var_dump($dados);
			}
			
        }
        
        fclose($file);
		
		debug($ids);
		die;
		//$this->redirect(array('action' => 'index'));
	}

	private function TratarEstadoCivil($parametro) {
		switch ($parametro) {
			case 'Amasiado (a)': return 6; break;
			case 'Amigo (a)': return 3; break;
			case 'Casado (a)': return 1; break;
			case 'Divorciado (a)': return 2; break;
			case 'Separado (a)': return 4; break;
			case 'Solteiro (a)': return 3; break;
			case 'Viuvo (a)': return 5; break;
			case 'Viúvo (a)': return 5; break;
			default: return 3;
		}
	}
}
