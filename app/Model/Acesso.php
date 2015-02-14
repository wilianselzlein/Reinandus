<?php
App::uses('AppModel', 'Model');
/**
 * Acesso Model
 *
 * @property Aluno $Aluno
 */
class Acesso extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'acesso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'aluno_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'aluno_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'datahora' => array(
			'boolean' => array(
				'rule' => array('datetime'),
				'message' => 'VALIDATE_DATE',
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
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
