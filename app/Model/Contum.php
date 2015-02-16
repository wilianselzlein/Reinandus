<?php
App::uses('AppModel', 'Model');
/**
 * Contum Model
 *
 * @property Formapgto $Formapgto
 */
class Contum extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'conta';


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'banco' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'agencia' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'conta' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Formapgto' => array(
			'className' => 'Formapgto',
			'foreignKey' => 'formapgto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
