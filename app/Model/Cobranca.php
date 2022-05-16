<?php
App::uses('AppModel', 'Model');
/**
 * Cobranca Model
 *
 */
class Cobranca extends AppModel {

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
 * /
	public $validate = array(
		'vencimento_inicial' => array(
			'numeric' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vencimento_final' => array(
			'numeric' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
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
		'Mensalidade' => array(
			'className' => 'Mensalidade',
			'foreignKey' => '',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => '',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
