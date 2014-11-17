<?php
App::uses('AppModel', 'Model');
/**
 * Acesso Model
 *
 * @property Aluno $Aluno
 */
class Acesso extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'acesso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'aluno_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
