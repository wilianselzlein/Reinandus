<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Pessoa $Pessoa
 * @property Role $Role
 * @property Aviso $Aviso
 * @property Mensalidade $Mensalidade
 * @property Permissao $Permissao
 */
class Role extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'role';

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
		'Usuario' => array(
			'className' => 'User',
			'foreignKey' => 'role_id',
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
	);

}
