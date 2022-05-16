<?php
App::uses('AppModel', 'Model');
/**
 * Disciplina Model
 *
 * @property Aluno $Aluno
 * @property Curso $Curso
 * @property Professor $Professor
 */
class Disciplina extends AppModel {
   var $actsAs = array('NumberFormat');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'disciplina';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Aluno' => array(
			'className' => 'Aluno',
			'joinTable' => 'aluno_disciplinas',
			'foreignKey' => 'disciplina_id',
			'associationForeignKey' => 'aluno_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Curso' => array(
			'className' => 'Curso',
			'joinTable' => 'curso_disciplinas',
			'foreignKey' => 'disciplina_id',
			'associationForeignKey' => 'curso_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Professor' => array(
			'className' => 'Professor',
			'joinTable' => 'disciplina_professor',
			'foreignKey' => 'disciplina_id',
			'associationForeignKey' => 'professor_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Calendario' => array(
			'className' => 'Calendario',
			'foreignKey' => 'disciplina_id',
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
