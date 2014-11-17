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
