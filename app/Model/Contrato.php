<?php
App::uses('AppModel', 'Model');
/**
 * Contrato Model
 *
 * @property Conta $Conta
 * @property Formapgto $Formapgto
 * @property User $User
 */
class Contrato extends AppModel {

var $actsAs = array('NumberFormat', 'DateFormat');

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = false;

/**
 * Display field
 *
 * @var string
 */
//	public $displayField = 'numero';

/**
 * Schema getColumnsName();
 *
 * $_schema
 * /
	public $_schema = array(
        'horas_aula' => array(
            'type' => 'integer',
            'null' => false,
        ),
        'valor_aula' => array(
            'type' => 'double',
            'null' => false,
        ),
    );
*/

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'horas_aula' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor_aula' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDADE_NUMERIC',
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
		'Conta' => array(
			'className' => 'Contum',
			'foreignKey' => 'conta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Formapgto' => array(
			'className' => 'Formapgto',
			'foreignKey' => 'formapgto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
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
		),
		'Disciplina' => array(
			'className' => 'Disciplina',
			'foreignKey' => 'disciplina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
