<?php
App::uses('AppModel', 'Model');
/**
 * HistPadrao Model
 *
 * @property AvisoCurso $AvisoCurso
 * @property Curso $Curso
 */
class HistoricoPadrao extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'historico_padrao';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/* *
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'LancamentoContabil' => array(
			'className' => 'LancamentoContabil',
			'foreignKey' => 'historico_padrao_id',
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
