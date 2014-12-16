<?php
App::uses('AppModel', 'Model');
/**
 * Aviso Model
 *
 * @property Curso $Curso
 */
class AvisoCurso extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'aviso_cursos';

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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
