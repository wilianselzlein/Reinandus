<?php
App::uses('AppModel', 'Model');
/**
 * Pessoa Model
 *
 * @property Cidade $Cidade
 * @property Curso $Curso
 * @property Detalhe $Detalhe
 * @property User $User
 */
class Pessoa extends AppModel {
	var $actsAs = array('DateFormat');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pessoa';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'razaosocial';


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'razaosocial' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'pessoa_id',
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
			'foreignKey' => 'pessoa_id',
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
		'Usuario' => array(
			'className' => 'User',
			'foreignKey' => 'pessoa_id',
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

}
