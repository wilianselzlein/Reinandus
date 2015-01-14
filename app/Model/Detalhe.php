<?php
App::uses('AppModel', 'Model');
/**
 * Detalhe Model
 *
 * @property Aluno $Aluno
 * @property Pessoa $Pessoa
 */
class Detalhe extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'detalhe';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'aluno_id';

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
		)/*,
		'Pessoa' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'pessoa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
}
