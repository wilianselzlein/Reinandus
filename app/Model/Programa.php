<?php
App::uses('AppModel', 'Model');
/**
 * Programa Model
 *
 * @property Permissao $Permissao
 */
class Programa extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'programa';

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
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Permissao' => array(
			'className' => 'Permissao',
			'foreignKey' => 'programa_id',
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
