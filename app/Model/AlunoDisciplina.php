<?php
App::uses('AppModel', 'Model');
/**
 * Aviso Model
 *
 * @property Curso $Curso
 */
class AlunoDisciplina extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'aluno_disciplinas';

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
		'Disciplina' => array(
			'className' => 'Disciplina',
			'foreignKey' => 'disciplina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Professor' => array(
			'className' => 'Professor',
			'foreignKey' => 'professor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
