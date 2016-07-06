<?php
App::uses('AppModel', 'Model');
/**
 * ContaPagar Model
 *
 * @property Conta $Conta
 * @property Formapgto $Formapgto
 * @property User $User
 */
class ContaPagar extends AppModel {
	var $actsAs = array('DateFormat');
/**
 * Use table
 *
 * @var mixed False or table name
 */
public $useTable = 'conta_pagar';

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
	/*'documento' => array(
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
		),*/
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
	'Tipo' => array(
		'className' => 'Enumerado',
		'foreignKey' => 'tipo_id',
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
	'Pessoa' => array(
		'className' => 'Pessoa',
		'foreignKey' => 'pessoa_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		),
	'Situacao' => array(
		'className' => 'Enumerado',
		'foreignKey' => 'situacao_id',
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
