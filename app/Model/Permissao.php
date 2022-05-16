<?php
App::uses('AppModel', 'Model');
/**
 * Permissao Model
 *
 * @property User $User
 * @property Programa $Programa
 */
class Permissao extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'permissao';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'programa_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Programa' => array(
			'className' => 'Programa',
			'foreignKey' => 'programa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
