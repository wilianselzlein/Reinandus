<?php
App::uses('AppModel', 'Model');
/**
 * Formapgto Model
 *
 * @property Contum $Contum
 * @property Mensalidade $Mensalidade
 */
class Formapgto extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'formapgto';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		),
		'tipo' => array(
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
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contum' => array(
			'className' => 'Contum',
			'foreignKey' => 'formapgto_id',
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
		'Mensalidade' => array(
			'className' => 'Mensalidade',
			'foreignKey' => 'formapgto_id',
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
		'ContaPagar' => array(
			'className' => 'ContaPagar',
			'foreignKey' => 'formapgto_id',
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Debito' => array(
			'className' => 'PlanoConta',
			'foreignKey' => 'MenValDeb',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Credito' => array(
			'className' => 'PlanoConta',
			'foreignKey' => 'MenValCre',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'HistoricoPadrao' => array(
			'className' => 'HistoricoPadrao',
			'foreignKey' => 'MenValHis',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
