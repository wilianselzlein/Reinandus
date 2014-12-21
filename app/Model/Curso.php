<?php
App::uses('AppModel', 'Model');
/**
 * Curso Model
 *
 * @property Professor $Professor
 * @property Pessoa $Pessoa
 * @property Grupo $Grupo
 * @property Tipo $Tipo
 * @property Periodo $Periodo
 * @property Aluno $Aluno
 * @property Aviso $Aviso
 * @property Disciplina $Disciplina
 */
class Curso extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'curso';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Professor' => array(
			'className' => 'Professor',
			'foreignKey' => 'professor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pessoa' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'pessoa_id',
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
		'Tipo' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Periodo' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'periodo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'curso_id',
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
		'CursoDisciplina' => array(
			'className' => 'CursoDisciplina',
			'foreignKey' => 'curso_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Aviso' => array(
			'className' => 'Aviso',
			'joinTable' => 'aviso_cursos',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'aviso_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)/*,
		'Disciplina' => array(
			'className' => 'CursoDisciplina',
			'joinTable' => 'curso_disciplinas',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'disciplina_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)*/
	);

}
