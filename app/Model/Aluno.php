<?php
App::uses('AppModel', 'Model');
/**
 * Aluno Model
 *
 * @property Naturalidade $Naturalidade
 * @property Situacao $Situacao
 * @property EstadoCivil $EstadoCivil
 * @property Indicacao $Indicacao
 * @property Curso $Curso
 * @property Professor $Professor
 * @property Cidade $Cidade
 * @property Responsavel $Responsavel
 * @property Acesso $Acesso
 * @property Detalhe $Detalhe
 * @property Disciplina $Disciplina
 */
class Aluno extends AppModel {

var $actsAs = array('NumberFormat', 'DateFormat');

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'aluno';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sexo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'curso_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Naturalidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'naturalidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Situacao' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'situacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EstadoCivil' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'estado_civil_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Indicacao' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'indicacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Professor' => array(
			'className' => 'Professor',
			'foreignKey' => 'professor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Responsavel' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'responsavel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Formapgto' => array(
			'className' => 'Formapgto',
			'foreignKey' => 'formapgto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Acesso' => array(
			'className' => 'Acesso',
			'foreignKey' => 'aluno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Detalhe' => array(
			'className' => 'Detalhe',
			'foreignKey' => 'aluno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'AlunoDisciplina' => array(
			'className' => 'AlunoDisciplina',
			'foreignKey' => 'aluno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Mensalidade' => array(
			'className' => 'Mensalidade',
			'foreignKey' => 'aluno_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
   
   public function beforeSave($options = array()) {
      if ((isset($this->data[$this->alias]['senha'])) && (strlen($this->data[$this->alias]['senha']) <= 20)) {
         $this->data[$this->alias]['senha'] = AuthComponent::password($this->data[$this->alias]['senha']);
      }
      return true;
   }

   public function RetornarDadosCursoFormContrato($aluno_id){
   		$curso = [];
		if ($aluno_id != null) {
			$this->recursive = false;
			$this->unbindModel(array('belongsTo' => 
					array('Naturalidade', 'Situacao', 'EstadoCivil', 'Indicacao', 'Professor', 'Cidade', 'Responsavel')));
			$curso = $this->findById($aluno_id, array('Curso.valor', 'Curso.desconto', 'Curso.liquido'));
			if (isset($curso['Curso']))
				$curso = $curso['Curso'];
		}
		return $curso;
	}
}