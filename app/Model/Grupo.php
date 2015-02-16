<?php
App::uses('AppModel', 'Model');
/**
 * Grupo Model
 *
 * @property AvisoCurso $AvisoCurso
 * @property Curso $Curso
 */
class Grupo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'grupo';

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
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AvisoCurso' => array(
			'className' => 'AvisoCurso',
			'foreignKey' => 'grupo_id',
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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'grupo_id',
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
