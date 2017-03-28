<?php
App::uses('AppModel', 'Model');
/**
 * Orcamento Model
 *
 * @property PlanoConta $PlanoConta
 * @property HistoricoPadrao $HistoricoPadrao
 */
class Orcamento extends AppModel {

	var $actsAs = array('NumberFormat', 'DateFormat');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'orcamento';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'complemento';


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
		'plano_conta_id' => array(
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
		'PlanoConta' => array(
			'className' => 'PlanoConta',
			'foreignKey' => 'plano_conta_id',
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
