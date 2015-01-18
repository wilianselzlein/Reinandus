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
		)
	);

}
