<?php
App::uses('AppModel', 'Model');
/**
 * Mensalidade Model
 *
 * @property Conta $Conta
 * @property Formapgto $Formapgto
 * @property User $User
 */
class Mensalidade extends AppModel {

var $actsAs = array('NumberFormat', 'DateFormat');


/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'mensalidade';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'numero';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'numero' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vencimento' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor' => array(
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
		'LancamentoContabilValor' => array(
			'className' => 'LancamentoContabil',
			'foreignKey' => 'lancamento_valor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LancamentoContabilDesconto' => array(
			'className' => 'LancamentoContabil',
			'foreignKey' => 'lancamento_desconto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LancamentoContabilJuro' => array(
			'className' => 'LancamentoContabil',
			'foreignKey' => 'lancamento_juro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
