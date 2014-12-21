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
		'is_ativo' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
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
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Disciplina' => array(
			'className' => 'Disciplina',
			'joinTable' => 'aluno_disciplinas',
			'foreignKey' => 'aluno_id',
			'associationForeignKey' => 'disciplina_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
