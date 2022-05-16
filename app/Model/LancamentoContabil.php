<?php
App::uses('AppModel', 'Model');
/**
 * LancamentoContabil Model
 *
 * @property Debito $PlanoConta
 * @property Credito $PlanoConta
 * @property HistPadrao $HistoricoPadrao
 */
class LancamentoContabil extends AppModel {

	var $actsAs = array('NumberFormat', 'DateFormat');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'lancamento_contabil';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'numero';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'credito_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'debito_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'historico_padrao_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'documento' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor' => array(
			'notEmpty' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
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
			'foreignKey' => 'debito_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Credito' => array(
			'className' => 'PlanoConta',
			'foreignKey' => 'credito_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'HistoricoPadrao' => array(
			'className' => 'HistoricoPadrao',
			'foreignKey' => 'historico_padrao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
