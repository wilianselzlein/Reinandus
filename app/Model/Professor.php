<?php
App::uses('AppModel', 'Model');
/**
 * Professor Model
 *
 * @property Cidade $Cidade
 * @property Aluno $Aluno
 * @property AlunoDisciplina $AlunoDisciplina
 * @property Curso $Curso
 * @property CursoDisciplina $CursoDisciplina
 * @property Disciplina $Disciplina
 */
class Professor extends AppModel {
	var $actsAs = array('DateFormat');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'professor';

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
		/*'numero' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDATE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Titulacao' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'resumo_titulacao_id',
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
			'foreignKey' => 'professor_id',
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
		'AlunoDisciplina' => array(
			'className' => 'AlunoDisciplina',
			'foreignKey' => 'professor_id',
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
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'professor_id',
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
			'foreignKey' => 'professor_id',
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
		'ProfessorDisciplina' => array(
			'className' => 'DisciplinaProfessor',
			'foreignKey' => 'professor_id',
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
		'Disciplina' => array(
			'className' => 'Disciplina',
			'joinTable' => 'disciplina_professor',
			'foreignKey' => 'professor_id',
			'associationForeignKey' => 'disciplina_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

   public function beforeSave($options = array()) {
      if ((isset($this->data[$this->alias]['senha'])) && (strlen($this->data[$this->alias]['senha']) <= 20)) {
         $this->data[$this->alias]['senha'] = AuthComponent::password($this->data[$this->alias]['senha']);
      }
      return true;
   }
}
