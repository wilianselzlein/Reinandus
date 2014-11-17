<?php
App::uses('AppModel', 'Model');
/**
 * Formapgto Model
 *
 * @property Contum $Contum
 * @property Mensalidade $Mensalidade
 */
class Formapgto extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'formapgto';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contum' => array(
			'className' => 'Contum',
			'foreignKey' => 'formapgto_id',
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
			'foreignKey' => 'formapgto_id',
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
