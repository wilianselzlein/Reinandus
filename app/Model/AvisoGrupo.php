<?php
App::uses('AppModel', 'Model');
/**
 * Aviso Model
 *
 * @property Grupo $Grupo
 */
class AvisoGrupo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'aviso_grupos';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Grupo' => array(
			'className' => 'Grupo',
			'foreignKey' => 'grupo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aviso' => array(
			'className' => 'Aviso',
			'foreignKey' => 'aviso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
