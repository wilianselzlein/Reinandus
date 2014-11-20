<?php
App::uses('AppModel', 'Model');
/**
 * Contum Model
 *
 * @property Formapgto $Formapgto
 */
class Contum extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'conta';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Formapgto' => array(
			'className' => 'Formapgto',
			'foreignKey' => 'formapgto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
