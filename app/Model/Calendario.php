<?php
App::uses('AppModel', 'Model');
/**
 * Aviso Model
 *
 * @property Curso $Curso
 */
class Calendario extends AppModel {
	
var $actsAs = array('DateFormat');

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'calendario';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Disciplina' => array(
			'className' => 'Disciplina',
			'foreignKey' => 'disciplina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'Curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
