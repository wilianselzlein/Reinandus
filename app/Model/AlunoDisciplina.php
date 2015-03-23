<?php
App::uses('AppModel', 'Model');
/**
 * Aviso Model
 *
 * @property Curso $Curso
 */
class AlunoDisciplina extends AppModel {
var $actsAs = array('DateFormat');
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
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'frequencia' => array(
			'numeric' => array(
				'rule' => array('ValorEntre', 'frequencia', 100),
				'message' => 'VALIDATE_BETWEEN_0_100',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nota' => array(
			'numeric' => array(
				'rule' => array('ValorEntre', 'nota', 10),
				'message' => 'VALIDATE_BETWEEN_0_10',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'horas_aula' => array(
			'numeric' => array(
				'rule' => array('ValorEntre', 'horas_aula', 100),
				'message' => 'VALIDATE_BETWEEN_0_100',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
		),
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
