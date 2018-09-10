<?php
App::uses('AppModel', 'Model');
/**
 * Aviso Model
 *
 * @property User $User
 * @property Tipo $Tipo
 * @property Curso $Curso
 */
class Aviso extends AppModel {

var $actsAs = array('DateFormat');

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'aviso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mensagem';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mensagem' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipo' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */

	public $hasAndBelongsToMany = array(
		'Curso' => array(
			'className' => 'Curso',
			'joinTable' => 'aviso_cursos',
			'foreignKey' => 'aviso_id',
			'associationForeignKey' => 'curso_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Grupo' => array(
			'className' => 'Grupo',
			'joinTable' => 'aviso_grupos',
			'foreignKey' => 'aviso_id',
			'associationForeignKey' => 'grupo_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

public function beforeSave($options = array())
    {

        if(!empty($this->data['Aviso']['arq']['name'])) {       
            $this->data['Aviso']['caminho'] = WWW_ROOT.'arqs'.DS . $this->upload($this->data['Aviso']['arq']);
            $this->data['Aviso']['arquivo'] = $this->data['Aviso']['arq']['name'];
            $this->data['Aviso']['tipo'] = $this->data['Aviso']['arq']['type'];
            $this->data['Aviso']['tamanho'] = $this->data['Aviso']['arq']['size'];
        } else {
            unset($this->data['Aviso']['caminho']);
        }
    }

    public function afterSave($created,$options = array()){
		if ($created){;

			$alunos = $this->query('SELECT aluno_id from valuno WHERE curso_grupo_id in (select grupo_id from vavisos where aviso_id = '. $this->data['Aviso']['id'] .' and aviso_tipo_id = 21)');
			if (count($alunos) > 0){
				$alunos = join(',', $ids = array_map(function ($ar) {return $ar['valuno']['aluno_id'];}, $alunos));
				$mobilePushTokens = $this->query('SELECT token from push_notification_token WHERE user IN ('.$alunos.')');

				$pushNotifications = Array();
				foreach($mobilePushTokens as $pushToken){
					$pushNotifications[] = array("to" => $pushToken['push_notification_token']['token'], 'body'=> "Novo Aviso Cadastrado", 'sound' => 'default', 'data' => array('navigateTo' => 'WarningScreen'));
				}

				if (count($pushNotifications) > 0){
					$jsonData = json_encode($pushNotifications);
					$ch = curl_init("https://exp.host/--/api/v2/push/send");
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
					curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);                                                                  
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
					    'Content-Type: application/json',                                                                                
					    'Content-Length: ' . strlen($jsonData))                                                                       
					);                                                                                                                                                                                               
					$result = curl_exec($ch);

					$grupos = $this->query('select grupo_id from vavisos where aviso_id = '. $this->data['Aviso']['id'] .' and aviso_tipo_id = 21');
					
					$grupos = join(',', $ids = array_map(function ($ar) {return $ar['vavisos']['grupo_id'];}, $grupos));
					error_log("Push notification para o(s) grupos(s) ".$grupos.": ".$result);
				}
				
			}
		}

	}

    /**
     * Organiza o upload.
     * @access public
     * @param Array $imagem
     * @param String $data
    */ 
    public function upload($imagem = array(), $dir = 'arqs')  {

		/*
		ini_set('upload_max_filesize', '200M');
		ini_set('post_max_size', '200M');
		ini_set('max_input_time', 300);
		ini_set('max_execution_time', 300);
		*/

        $dir = WWW_ROOT.$dir.DS;
 
        if(($imagem['error']!=0) and ($imagem['size']==0)) {
                throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
        }

        $this->checa_dir($dir);

        $imagem = $this->checa_nome($imagem, $dir);
    	
        $this->move_arquivos($imagem, $dir);
        
        return $imagem['name'];
    }

	/**
	 * Verifica se o diretório existe, se não ele cria.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function checa_dir($dir)
	{
		App::uses('Folder', 'Utility');
		$folder = new Folder();
		if (!is_dir($dir)){
			$folder->create($dir);
		}
	}

	/**
	 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	 * @return nome da imagem
	*/ 
	public function checa_nome($imagem, $dir)
	{
		$imagem_info = pathinfo($dir.$imagem['name']);
		$imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
		$conta = 2;
		while (file_exists($dir.$imagem_nome)) {
			$imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
			$imagem_nome .= '.'.$imagem_info['extension'];
			$conta++;
		}
		$imagem['name'] = $imagem_nome;
		return $imagem;
	}

	/**
	 * Trata o nome removendo espaços, acentos e caracteres em maiúsculo.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function trata_nome($imagem_nome)
	{
		$imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
		return $imagem_nome;
	}

	/**
	 * Move o arquivo para a pasta de destino.
	 * @access public
	 * @param Array $imagem
	 * @param String $data
	*/ 
	public function move_arquivos($imagem, $dir)
	{
		App::uses('File', 'Utility');
		$arquivo = new File($imagem['tmp_name']);
        $arquivo->copy($dir.$imagem['name']);
        //debug($dir.$imagem['name']); die;
		$arquivo->close();
	}

}
