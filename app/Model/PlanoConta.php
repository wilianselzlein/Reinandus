<?php
App::uses('AppModel', 'Model');
/**
 * HistPadrao Model
 *
 * @property AvisoCurso $AvisoCurso
 * @property Curso $Curso
 */
class PlanoConta extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'plano_conta';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descricao';


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'reduzido' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'analitico' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descricao' => array(
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

/* *
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'LancamentoContabilCredito' => array(
			'className' => 'LancamentoContabil',
			'foreignKey' => 'credito_id',
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
		'LancamentoContabilDebito' => array(
			'className' => 'LancamentoContabil',
			'foreignKey' => 'debito_id',
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
		'Orcamento' => array(
			'className' => 'Orcamento',
			'foreignKey' => 'plano_conta_id',
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
