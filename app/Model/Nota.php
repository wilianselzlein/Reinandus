<?php
App::uses('AppModel', 'Model');
/**
 * Mensalidade Model
 *
 * @property Conta $Conta
 * @property Formapgto $Formapgto
 * @property User $User
 */
class Nota extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = false;

/**
 * Display field
 *
 * @var string
 */
//	public $displayField = 'numero';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'curso_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'disciplina_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'professor_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AlunoDisciplina' => array(
			'className' => 'AlunoDisciplina',
			'foreignKey' => '',
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
		'Disciplina' => array(
			'className' => 'Disciplina',
			'foreignKey' => 'disciplina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
