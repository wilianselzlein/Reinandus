<?php
App::uses('AppModel', 'Model');
/**
 * Enumerado Model
 *
 */
class Enumerado extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'enumerado';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'valor';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'referencia' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AlunoSituacao' => array(
			'className' => 'Aluno',
			'foreignKey' => 'situacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AlunoCivil' => array(
			'className' => 'Aluno',
			'foreignKey' => 'estado_civil_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AlunoIndicacao' => array(
			'className' => 'Aluno',
			'foreignKey' => 'indicacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CursoTipo' => array(
			'className' => 'Curso',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CursoPeriodo' => array(
			'className' => 'Curso',
			'foreignKey' => 'periodo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aviso' => array(
			'className' => 'Aviso',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
