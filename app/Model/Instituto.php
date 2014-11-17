<?php
App::uses('AppModel', 'Model');
/**
 * Instituto Model
 *
 * @property Empresa $Empresa
 * @property Diretor $Diretor
 * @property Tipo $Tipo
 */
class Instituto extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'instituto';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'empresa_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Diretor' => array(
			'className' => 'Diretor',
			'foreignKey' => 'diretor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipo' => array(
			'className' => 'Tipo',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
